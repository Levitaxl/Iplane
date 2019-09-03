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
        'id','ciudadSalida','ciudadLlegadas'
    ];

    public function ciudades(){
        return $this->hasMany('Iplane\ciudad','id');
    }
}
