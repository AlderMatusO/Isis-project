<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModoServicio extends Model
{
    //
    protected $table = 'modos_servicio';
    protected $guarded = [ 'id' ];    
    public $timestamps = false;

    public function precios_productos()
    {
    	return $this->hasMany('App\PrecioProducto', 'modo_servicio_id');
    }
}
