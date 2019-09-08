@extends('administrador.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Lista de Rutas</div>
           

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            

                    <a href="/Iplane/public/ruta/create" class="btn btn-primary">Crear una ruta</a>
                    <br>
                    @if(count($rutas)>0)
                        <table class='table table-striped'>

                                <thead>
                                        <tr>
                                          <th scope="col">ID</th>
                                          <th scope="col">Ciudad de Salida</th>
                                          <th scope="col">Ciudad de Llegada</th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                        </tr>
                                </thead>


                            @foreach($rutas as $ruta)
                                <tr>
                                    <td>{{$ruta->id}}</td>
                                    <td>{{$ruta->ciudadSalida->nombre}}</td>
                                    <td>{{$ruta->ciudadLlegada->nombre}}</td>                                   
                                <td>
                                    <a href="/Iplane/public/ruta/{{$ruta->id}}/edit" class="btn btn-primary">Editar</a></td>
                                    <td>                                                   
                                        {!!Form::open(['action'=>['RutaController@destroy', $ruta->id],'method'=>'POST','class'=>'float-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Eliminar',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {{$rutas->render()}}
                    @else
                        <p>No existen rutas en el sistema</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
