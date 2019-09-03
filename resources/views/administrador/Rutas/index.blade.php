@extends('administrador.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Agencias</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/Iplane/public/ruta/create" class="btn btn-link">Crear una ruta</a>
                    <h3>Rutas</h3>
                    @if(count($rutas)>0)
                        <table class='table table-striped'>

                            @foreach($rutas as $ruta)
                                <tr>
                                    <td>{{$ruta->id}}</td>
                                <td><a href="/Iplane/public/ruta/{{$ruta->id}}/edit" class="btn btn-primary">Edit</a></td>
                                    <td>
                                                   
                                            {!!Form::open(['action'=>['RutaController@destroy', $ruta->id],'method'=>'POST','class'=>'float-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                         
            

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>No existen rutas en el sistema</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
