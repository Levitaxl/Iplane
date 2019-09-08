<?php

namespace Iplane;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table='ciudades';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','nombre'
    ];

    public function ruta(){
        return $this->belongsto('Iplane\ruta','id');
    }
}
