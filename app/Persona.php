<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $guarded = [ 'id' ];    
    public $timestamps = false;

    public function referencia()
    {
    	return $this->belongsTo('App\Persona', 'referencia_id');
    }

    public function referenciado()
    {
        return $this->hasOne('App\Persona', 'referencia_id');
    }

    public function parentezco()
    {
    	return $this->belongsTo('App\Parentezco');
    }

    public function direccion()
    {
    	return $this->belongsTo('App\Direccion', 'direccion_id');
    }

    public function usuario()
    {
        return $this->hasOne('App\Usuario', 'datos_id');
    }
    
}
