<?php

namespace Iplane;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'cedula';
    protected $table='personal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido','cedula','direccion','telefono','cargo'
    ];
}
