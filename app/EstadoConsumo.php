<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoConsumo extends Model
{
    //
    protected $table = 'estados_consumo';
    protected $guarded = [ 'id' ];    
    public $timestamps = false;

    public function consumos()
    {
    	return $this->hasMany('App\Consumo', 'estado_id');
    }
}
