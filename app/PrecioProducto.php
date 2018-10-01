<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrecioProducto extends Model
{
    //
    protected $table = 'precios_producto';
    protected $guarded = [ 'id' ];    
    public $timestamps = false;

    public function producto()
    {
    	return $this->belongsTo('App\Producto');
    }

    public function modo_servicio()
    {
    	return $this->belongsTo('App\ModoServicio', 'modo_servicio_id');
    }

    public function notas()
    {
        return $this->belongsToMany('App\Nota', 'notas_productos');
    }

    
}
