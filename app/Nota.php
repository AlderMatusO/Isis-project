<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
    protected $guarded = [ 'id' ];
    public $timestamps = false;

    public function consumo()
    {
    	return $this->belongsTo('App\Consumo', 'consumo_id');
    }

    public function metodo_pago()
    {
    	return $this->belongsTo('App\MetodoPago', 'metodo_pago_id');
    }

    public function productos()
    {
        return $this->belongsToMany('App\PrecioProducto', 'notas_productos', 'nota_id', 'producto_id')->withPivot('cantidad');
    }
}