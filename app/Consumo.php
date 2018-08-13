<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    //
    protected $guarded = [ 'id' ];
    public $timestamps = false;

    public function mesa()
    {
    	return $this->belongsTo('App\Mesa', 'mesa_id', 'nombre');
    }

    public function mesero()
    {
    	return $this->belongsTo('App\Usuario', 'mesero_id', 'nombre');
    }

    public function estado()
    {
    	return $this->belongsTo('App\EstadoConsumo', 'estado_id');
    }

    public function notas()
    {
        return $this->hasMany('App\Nota', 'consumo_id');
    }
}
