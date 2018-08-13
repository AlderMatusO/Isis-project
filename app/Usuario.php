<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $primaryKey = 'nombre';
    protected $keyType = 'string';

    public function datos()
    {
        return $this->belongsTo('App\Persona', 'datos_id');
    }

    public function tipo()
    {
        return $this->belongsTo('App\TipoUsuario', 'tipo_id');
    }

    public function consumos_mesero()
    {
        return $this->hasMany('App\Consumo', 'mesero_id', 'nombre');
    }
}
