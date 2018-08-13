<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $guarded = [ 'id' ];    
    public $timestamps = false;

    public function tipo()
    {
    	return $this->belongsTo('App\ProductoGeneral', 'tipo_id');
    }

    public function categoria()
    {
    	return $this->belongsTo('App\CategoriaProducto', 'categoria_id');
    }

    public function precios()
    {
    	return $this->hasMany('App\PrecioProducto');
    }
}
