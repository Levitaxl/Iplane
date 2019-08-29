<?php

namespace Iplane;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'email';
    //protected $primaryKey = 'cedula';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido','cedula','direccion','telefono','email','password'
    ];


}
