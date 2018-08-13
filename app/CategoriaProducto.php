<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    //
    protected $table = 'categorias_producto';
    protected $guarded = [ 'id' ];    
    public $timestamps = false;

    public function productos()
    {
    	return $this->hasMany('App\Producto', 'categoria_id');
    }
}
