<?php

namespace Iplane;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table='vuelos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','ruta_id','capacidad_pasajeros','fecha_hora','piloto_id','copiloto_id','sobrecargo1_id','sobrecargo2_id'
    ];
}
