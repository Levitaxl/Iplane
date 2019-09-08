@extends('administrador.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Lista de Ciudades</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/Iplane/public/ciudad/create" class="btn btn-primary">Crear una Ciudad</a>
                    @if(count($ciudades)>0)
                        <table class='table table-striped'>
                                <thead>
                                        <tr>
                                          <th scope="col">ID</th>
                                          <th scope="col">Nombre</th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                        </tr>
                                </thead>
                            @foreach($ciudades as $ciudad)
                                <tr>
                                    <td>{{$ciudad->id}}</td>
                                    <td>{{$ciudad->nombre}}</td>
                                    <td><a href="/Iplane/public/ciudad/{{$ciudad->id}}/edit" class="btn btn-primary">Edit</a></td>
                                    <td>
                                                   
                                            {!!Form::open(['action'=>['CiudadController@destroy', $ciudad->id],'method'=>'POST','class'=>'float-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$ciudades->render()}}
                    @else
                        <p>No hay en el sistema Ciudades</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
