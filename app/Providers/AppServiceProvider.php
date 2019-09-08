<?php

namespace Iplane\Providers;
use Validator;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('date_validation', function($attribute, $value, $parameters) {
            $fecha = explode('/', $value);
	        if(count($fecha) == 3){
                $dia=$fecha[0];
                $mes=$fecha[1];
                $ano=$fecha[2];
                //return $dia.'+'.$mes.'+'.$ano;
                if((is_numeric($dia)&&is_numeric($mes)&&is_numeric($ano)))
                    if(checkdate($mes, $dia, $ano))
                        return true;
            }
            return false;
        });

        Validator::extend('hour_validation', function($attribute, $value, $parameters) {
            $hora_vuelo = explode(':', $value);
            if(count($hora_vuelo) == 2){
                $hora=$hora_vuelo[0];
                $minuto=$hora_vuelo[1];
                if(is_numeric($hora)&&is_numeric($minuto))
                    if(($hora>=0)&&($hora<=23)&&($minuto>=0)&&($minuto<=59))
                        return true;
            }
            return false;
        });


    }
}
