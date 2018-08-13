<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    //
    protected $table = 'metodos_pago';
    protected $guarded = [ 'id' ];    
    public $timestamps = false;

    public function notas()
    {
    	return $this->hasMany('App\Nota', 'metodo_pago_id');
    }
}
