<?php

namespace App\Http\Controllers\Consumos;

use App\Usuario;
use App\Consumo;
use App\PrecioProducto;
use App\Nota;
use App\Producto;
use App\CategoriaProducto;

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

    public function productos( $parametro )
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

    public function categorias(){
        return CategoriaProducto::all()->toJson();
    }

    public function precios( $id_producto )
    {
        /*$precios = PrecioProducto::where('producto_id', $id_producto)
        ->get()
        ->keyBy('modo_servicio.descripcion')
        ->transform(function($item, $key){
            return $item->only(
                // Para minificar el response
                ["id", "precio"]
            );
        
        });*/

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
}