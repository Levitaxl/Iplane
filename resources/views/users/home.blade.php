@extends('layouts.app')
@include('alerts.request')
@section('content')
        <div class="jumbotron text-center">
                <h1>Bienvenido {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</h1>
            </div>
@endsection

