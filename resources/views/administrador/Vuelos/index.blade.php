@extends('administrador.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Lista de Vuelos</div>
           

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            

                    <a href="/Iplane/public/vuelo/create" class="btn btn-primary">Crear un vuelo</a>
                    <p>No existen vuelos en el sistema</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
