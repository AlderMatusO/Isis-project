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

    public function getAbreviaturaAttribute()
    {
        if($this->id < 4)
            return "Kg";
        if($this->id == 5)
            return "Ord";
        if($this->id == 6)
            return "Pza";
        return $this->descripcion;
    }
}
