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

                    <a href="/Iplane/public/personal/create" class="btn btn-link">Agregar una persona al sistema</a>
                    <h3>Personal</h3>
                    @if(count($personal)>0)
                        <table class='table table-striped'>

                            @foreach($personal as $trabajador)
                                <tr>
                                    <td>{{$trabajador->nombre}} {{$trabajador->apellido}} </td>
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
                    @else
                        <p>No existe personal en el sistema</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
