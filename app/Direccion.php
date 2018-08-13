<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    //
    protected $table = 'direcciones';
    protected $guarded = [ 'id' ];    
    public $timestamps = false;

    public function datos()
    {
    	return $this->hasOne('App\Persona', 'direccion_id');
    }
}
