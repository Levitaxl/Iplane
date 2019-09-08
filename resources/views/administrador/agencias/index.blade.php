@extends('administrador.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Lista de Agencias</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/Iplane/public/agencias/create" class="btn btn-primary" role="button">Crear una agencia</a>
                    
                    @if(count($agencias)>0)
                        <table class='table table-striped'>

                                <thead>
                                        <tr>
                                          <th scope="col">Rif</th>
                                          <th scope="col">Agencia</th>
                                          <th scope="col">Direccion</th>
                                          <th scope="col">Persona de Contacto</th>
                                          <th scope="col">Telefono</th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                        </tr>
                                </thead>

                            @foreach($agencias as $agencia)
                                <tr>
                                    <td>{{$agencia->rif}}</td>
                                    <td>{{$agencia->nombreDeLaAgencia}}</td>
                                    <td>{{$agencia->direccion}}</td>
                                    <td>{{$agencia->personaContacto}}</td>
                                    <td>{{$agencia->telefono}}</td>
                                    <td><a href="/Iplane/public/agencias/{{$agencia->rif}}/edit" class="btn btn-primary">Editar</a></td>
                                    <td>       
                                        {!!Form::open(['action'=>['AgenciaController@destroy', $agencia->rif],'method'=>'POST','class'=>'float-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Eliminar',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$agencias->render()}}
                    @else
                        <p>No hay en el sistema Agencias</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
