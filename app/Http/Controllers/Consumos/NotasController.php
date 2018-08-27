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
        $cats = CategoriaProducto::all();
        $prods = Producto::where("categoria_id", 2)->get()->sortBy("tipo_id");
    	return view("consumos.notas",["categorias"=>$cats, "productos"=>$prods]);
    }
}