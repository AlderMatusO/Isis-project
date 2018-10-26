<?php

namespace App\Http\Controllers\Consumos;

use App\Usuario;
use App\Consumo;
use App\PrecioProducto;
use App\Nota;
use App\Producto;
use App\CategoriaProducto;
use App\Mesa;

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
            $obj = collect($item->only(
                ["id", "precio", "modo_servicio_id"]
            ));
            if( $item->modo_servicio->id == 8 )
            {
                if($item->producto->tipo_id == 19)
                {
                    $obj->put('modo_servicio','Taza');
                }
                else
                {
                    if($item->producto->categoria_id==4 && !in_array($item->producto->tipo_id, [15,17]))
                    {
                        $obj->put('modo_servicio', 'Copa');
                    }
                    else
                    {
                        $obj->put('modo_servicio','Vaso');
                    }
                }
            }
            else
            {
                $obj->put('modo_servicio',$item->modo_servicio->descripcion);
            }
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

    public function createConsumo(Request $request)
    {
        $data = [
            'mesa_id' => $request->input('mesa'),
            'mesero_id' => $request->input('mesero'),
            'fecha' => date('d-m-Y'),
            'hora' => date('h:i:s'),
            'estado_id' => $request->input('status')
        ];
        $consumo = Consumo::create( $data );

        if( $request->has('productos') && $request->filled('productos') )
        {

        }

        return var_dump( $consumo );
    }
}