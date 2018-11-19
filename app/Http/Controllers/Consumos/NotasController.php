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
                $consumo->notas()->save( $nota = new Nota() );
                if(array_key_exists("productos", $ticket) && count($ticket["productos"]) > 0)
                {
                    foreach($ticket["productos"] as $producto)
                    {
                        $nota->productos()->attach( $producto["id"], ['cantidad' => $producto["cantidad"] ] );
                    }
                }
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
                $productos = [];
                if(array_key_exists("productos", $ticket) && count($ticket["productos"]) > 0)
                {
                    foreach($ticket["productos"] as $producto)
                    {
                        $productos[ $producto["id"] ] = ['cantidad' => $producto["cantidad"] ];
                    }
                }
                $nota->productos()->sync($productos);
            }
        }
        return $n > 1 || $id == -1? "true" : $id;
    }
}