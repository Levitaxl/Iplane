<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(!(Auth::guest())){
        //return dd(Auth::user());
        if(Auth::user()->rol=='administrador')return   redirect('/homeAdministrador');
        if(Auth::user()->rol=='usuario') return redirect('/homeUsuario');
    }
    return view('welcome');
});

Auth::routes();
Route::resource('users','UserController');
Route::resource('agencias','AgenciaController');
Route::resource('personal','PersonalController');
Route::resource('ciudad','CiudadController');
Route::resource('ruta','RutaController');

Route::get('/homeUsuario', 'HomeController@indexUsuario')->name('home');
Route::get('/homeAdministrador', 'HomeController@indexAdministrador')->name('home');

