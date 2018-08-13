<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoGeneral extends Model
{
    //
    protected $table = 'productos_generales';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function productos()
    {
    	return $this->hasMany('App\Producto', 'tipo_id');
    }
}
