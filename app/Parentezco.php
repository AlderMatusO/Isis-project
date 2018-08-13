<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentezco extends Model
{
    //
    protected $guarded = [ 'id' ];
    public $timestamps = false;

    public function datos_personas()
    {
    	return $this->hasMany('App\DatosPersonales')
    }
}
