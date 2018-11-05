<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrecioProducto extends Model
{
    //
    protected $table = 'precios_producto';
    protected $guarded = [ 'id' ];    
    public $timestamps = false;

    public function producto()
    {
    	return $this->belongsTo('App\Producto');
    }

    public function modo_servicio()
    {
    	return $this->belongsTo('App\ModoServicio', 'modo_servicio_id');
    }

    public function notas()
    {
        return $this->belongsToMany('App\Nota', 'notas_productos', 'producto_id', 'nota_id')->withPivot('cantidad');
    }

    public function getModoServicioDescAttribute()
    {
        $str = $this->modo_servicio->descripcion;
        
        if( $this->modo_servicio->id == 8 )
        {
            if($this->producto->tipo_id == 19)
            {
                $str = 'Taza';
            }
            else
            {
                if($this->producto->categoria_id==4 && !in_array($this->producto->tipo_id, [15,17]))
                {
                    $str = 'Copa';
                }
                else
                {
                    $str = 'Vaso';
                }
            }
        }
        return $str;
    }
}
