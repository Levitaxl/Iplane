@extends('administrador.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Lista del Personal</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/Iplane/public/personal/create" class="btn btn-primary">Agregar a una persona al sistema</a>
                    @if(count($personal)>0)
                        <table class='table table-striped'>

                                <thead>
                                        <tr>
                                          <th scope="col">Nombre</th>
                                          <th scope="col">Apellido</th>
                                          <th scope="col">Cedula</th>
                                          <th scope="col">Direccion</th>
                                          <th scope="col">Telefono</th>
                                          <th scope="col">Cargo</th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                        </tr>
                                </thead>

                            @foreach($personal as $trabajador)

                            
                                <tr>
                                    <td>{{$trabajador->nombre}}</td>
                                    <td>{{$trabajador->apellido}}</td>
                                    <td>{{$trabajador->cedula}}</td>
                                    <td>{{$trabajador->direccion}}</td>
                                    <td>{{$trabajador->telefono}}</td>
                                    <td>{{$trabajador->cargo}}</td>
                                <td><a href="/Iplane/public/personal/{{$trabajador->cedula}}/edit" class="btn btn-primary">Edit</a></td>
                                    <td>
                                                   
                                            {!!Form::open(['action'=>['PersonalController@destroy', $trabajador->cedula],'method'=>'POST','class'=>'float-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                         
            

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$personal->render()}}
                    @else
                        <p>No existe personal en el sistema</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
