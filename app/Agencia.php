<?php

namespace Iplane;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'rif';
    protected $table='agencias';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rif', 'nombreDeLaAgencia', 'direccion', 'telefono','personaContacto'
    ];
}
