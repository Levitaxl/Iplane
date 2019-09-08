<?php

namespace Iplane;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id'; 
    protected $table='rutas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','ciudadSalida_id','ciudadLlegada_id'
    ];

    public function ciudadSalida(){
        return $this->hasOne(ciudad::class,'id','ciudadSalida_id');
    }

    public function ciudadLlegada(){
        return $this->hasOne(ciudad::class,'id','ciudadLlegada_id');
    }
}
