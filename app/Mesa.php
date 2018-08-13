<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    //
    protected $primaryKey = 'nombre';
    protected $keyType = 'string';
    public $timestamps = false;

    public function consumos()
    {
    	return $this->hasMany('App\Consumo', 'mesa_id', 'nombre');
    }
}
