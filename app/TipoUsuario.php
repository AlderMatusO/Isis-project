<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    //
    protected $table = 'tipos_usuario';
    protected $guarded = [ 'id' ];    
    public $timestamps = false;

    public function usuarios()
    {
    	return $this->hasMany('App\Usuario', 'tipo_id');
    }
}
