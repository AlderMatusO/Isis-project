<?php

namespace App\Http\Controllers\Consumos;

use App\Usuario;
use App\Consumo;
use App\PrecioProducto;
use App\Nota;
use App\Producto;
use App\CategoriaProducto;
use App\Mesa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\Printer;


class NotasController extends Controller
{
	/*
	 * Controla los procesos de cada nota
	 *
	 *
	 */
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view("consumos.notas");
    }

    public function getProductos( $parametro )
    {
        // Si el parametro es numerico, busca los productos por categoria,
        // si es una cadena, busca por nombre con un LIKE % $parametro %
        $productos = (is_numeric( $parametro )?
            Producto::where("categoria_id", $parametro) : 
            Producto::where("nombre", "LIKE", "%".$parametro."%") )
            ->get()
            ->sortBy("tipo.nombre")
            ->groupBy("tipo.nombre")
            ->each(function($item, $key){
                $item->transform(function($o, $i){
                    return $o->only(
                        // Para minificar el response
                        ["id", "nombre", "nombre_imagen"]
                    );
                });
            });
        
        return $productos->toJson();
    }

    public function getCategorias(){
        return CategoriaProducto::all()->toJson();
    }

    public function getPrecios( $id_producto )
    {
        $precios = PrecioProducto::where('producto_id', $id_producto)
        ->get()
        ->transform(function($item, $key){
            $obj = collect($item->only(["id", "precio", "modo_servicio_id"]));
            $obj->put('modo_servicio',$item->modo_servicio_desc);
            return $obj;
        })->keyBy("id");
        
        return $precios->toJson();
    }

    public function getMesas()
    {
        return Mesa::all()
        ->transform(function($item)
        {
            return $item->nombre;
        })
        ->toJson();
    }

    public function getMeseros()
    {
        return Usuario::where([['tipo_id','=', 2],['activo', '=', 1]])->get()
        ->transform( function($item)
        {
            $obj = collect(['id'=>$item->nombre]);
            $obj->put('nombre', $item->datos->nombre_completo);
            return $obj;
        })
        ->toJson();
    }

    public function getConsumos()
    {
        return Consumo::where('estado_id', '<=', 2)->get()
        ->transform( function($item)
        {
            $obj = collect($item->only(['id']));
            $obj->put('mesa', $item->mesa_id);
            $obj->put('mesero', ['id' => $item->mesero->nombre, 'nombre' => $item->mesero->datos->nombreCompleto]);
            $obj->put('listaProductos', $item->notas->first()->productos
                ->transform( function($prod){
                    $cltn = collect($prod->only(['id', 'precio', 'modo_servicio_id']));
                    $cltn->put('cantidad', floatval($prod->pivot->cantidad));
                    $cltn->put('modo_servicio', $prod->modo_servicio_desc);
                    $cltn->put('nombre', $prod->producto->nombre);
                    $cltn->put('selected', false);
                    return $cltn;
                })
            );
            $obj->put('status', $item->estado_id);
            return $obj;
        })
        ->toJson();

    }

    public function saveConsumo(Request $request)
    {
        $tickets = $request->input("tickets");
        $n = count($tickets);
        $id = -1;
        foreach($tickets as $ticket)
        {
            //  Busca el ticket, si existe actualiza, si no crea uno nuevo
            if($ticket["id"] == -1) //Crea
            {
                $consumo = Consumo::create(
                    [
                        'mesa_id' => $ticket["mesa"],
                        'mesero_id' => $ticket["mesero"],
                        'fecha' => date('Y-n-d'),
                        'hora' => date('h:i:s'),
                        'estado_id' => $ticket["status"]
                    ]
                );
                $nota = new Nota();
                $total = 0.0;
                $productos = [];
                if(array_key_exists("productos", $ticket) && count($ticket["productos"]) > 0)
                {
                    foreach($ticket["productos"] as $producto)
                    {
                        $productos[ $producto["id"] ] = ['cantidad' => $producto["cantidad"] ];
                        //$nota->productos()->attach( $producto["id"], ['cantidad' => $producto["cantidad"] ] );
                        $multiplier = 1;
                        if(in_array(intval($producto["modo_servicio_id"]), array(2,3)))
                            $multiplier =  (intval($producto["modo_servicio_id"]) - 1) * 2;
                        $total += (floatval($producto["precio"]) * $multiplier) * floatval($producto["cantidad"]);
                    }
                }
                
                if( $ticket["status"] == 2 )
                {
                    $subtotal = $total / 1.16;
                    $iva = $subtotal * 0.16;
                    $nota->subtotal = number_format($subtotal, 2);
                    $nota->iva = number_format($iva, 2);
                    $nota->total = number_format($total, 2);
                }
                $consumo->notas()->save( $nota );
                $nota->productos()->sync($productos);
                $nota->save();
                $id = $consumo->id;
            }
            else    //Actualiza
            {
                $consumo = Consumo::find($ticket["id"]);
                $consumo->mesa_id = $ticket["mesa"];
                $consumo->mesero_id = $ticket["mesero"];
                $consumo->estado_id = $ticket["status"];
                $consumo->save();

                $nota = $consumo->notas->first();
                $total = 0.0;
                $productos = [];
                if(array_key_exists("productos", $ticket) && count($ticket["productos"]) > 0)
                {
                    foreach($ticket["productos"] as $producto)
                    {
                        $productos[ $producto["id"] ] = ['cantidad' => $producto["cantidad"] ];
                        $multiplier = 1;
                        if(in_array(intval($producto["modo_servicio_id"]), array(2,3)))
                            $multiplier = (intval($producto["modo_servicio_id"]) - 1) * 2;
                        $total += (floatval($producto["precio"]) * $multiplier) * floatval($producto["cantidad"]);
                    }
                }
                if( $ticket["status"] == 2 )
                {
                    $subtotal = $total / 1.16;
                    $iva = $subtotal * 0.16;
                    $nota->subtotal = number_format($subtotal, 2);
                    $nota->iva = number_format($iva, 2);
                    $nota->total = number_format($total, 2);
                }

                $nota->productos()->sync($productos);
                $nota->save();
            }
        }
        return $n > 1 || $id == -1? "true" : $id;
    }

    public function printTicket($id_consumo)
    {
        $consumo = Consumo::find($id_consumo);
        $date = date_create($consumo->fecha.' '.$consumo->hora);
        $formatter = new \NumberFormatter("es", \NumberFormatter::SPELLOUT);
        //$profile = CapabilityProfile::load("simple");
        $connector = new WindowsPrintConnector("COM4");
        //$connector = new FilePrintConnector("php://stdout");

        $printer = new Printer($connector/*, $profile*/);
        $printer->feed(2);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("TICKET DE VENTA\n");
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text($this->putLine());
        $printer->text("MESA MESERO FECHA       HORA\n");
        $printer->text($this->putLine());
        $printer->text($this->putSpacing(mb_strtoupper($consumo->mesa_id, 'UTF-8'), 5));
        $printer->text($this->putSpacing(substr(mb_strtoupper($consumo->mesero->datos->nombres, 'UTF-8'), 0, 6), 7));
        $printer->text($this->putSpacing(date_format($date, 'd/M/Y'), 12));
        $printer->text(date_format($date, 'H:iA')."\n");
        $printer->text($this->putLine());
        $printer->text("CANT PLATILLO      P.UNI IMPORTE\n");
        $printer->text($this->putLine());
        foreach($consumo->notas->first()->productos as $producto)
        {
            $desc = str_replace(" CON ", " C/", mb_strtoupper($producto->producto->nombre, 'UTF-8'));
            $desc = str_replace(" SIN ", " S/", $desc);
            $precioU = intval($producto->precio);
            $cantidad = strval(intval($producto->pivot->cantidad));
            if($producto->modo_servicio_id < 4)
            {
                $cantidad = strval(number_format(floatval($producto->pivot->cantidad), 2));
                $precioU *= intval($producto->modo_servicio_id==3? "4" : $producto->modo_servicio_id);
            }
            if($producto->modo_servicio_id < 7)
                $desc = strtoupper($producto->modo_servicio->abreviatura)." ".$desc;
            $arr_desc = explode("\n", wordwrap($desc, 13, "\n", true));
            $importe = strval(number_format(floatval($producto->pivot->cantidad) * $precioU, 2));
            $printer->text($this->putSpacing($cantidad, 5));
            $printer->text($this->putSpacing($arr_desc[0], 14));
            $printer->text($this->putSpacing(strval($precioU),5));
            $printer->text(str_repeat(" ", 8-strlen($importe)).$importe."\n");

            for($i=1; $i<count($arr_desc); $i++)
            {
                $printer->text(str_repeat(" ", 5).$arr_desc[$i]);
                $printer->feed();
            }
        }
        $total = number_format(floatval($consumo->notas->first()->total), 2);
        $cifra = "**( ".mb_strtoupper($formatter->format(intval($total)), 'UTF-8')." PESOS ".substr($total,-2)."/100 M.N )**";
        $printer->text($this->putLine());
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("TOTAL ".$total);
        $printer->feed(2);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text(wordwrap($cifra, 32,"\n"));
        $printer->feed(2);
        $printer->text("ESTE DOCUMENTO NO TIENE VALIDEZ FISCAL");
        $printer->feed(2);
        $printer->text("PRE-CUENTA");

        $printer->cut();
        $printer->close();
    }

    private function putLine()
    {
        return str_repeat("-", 32)."\n";
    }

    private function putSpacing( $str, $totalSpace)
    {
        return $str.str_repeat(" ", $totalSpace - mb_strlen($str, 'UTF-8'));
    }
}