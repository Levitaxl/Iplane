@extends('layouts.app')
@include('alerts.request')
@section('content')
        <div class="jumbotron text-center">
                <h1>Bienvenido a Iplane!</h1>
                <p>Esta es una aplicacion en laravel para la materia Programacion III</p>
                <p><a class="btn btn-primary btn-lg" href="register" role="button">Registrar usuario</a> 
                <a class="btn btn-success btn-lg" href="login" role="button">Iniciar Sesion</a></p>
            </div>
@endsection

