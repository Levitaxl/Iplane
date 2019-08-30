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

                    <a href="/Iplane/public/agencias/create" class="btn btn-link">Crear una agencia</a>
                    <h3>Agencias</h3>
                    @if(count($agencias)>0)
                        <table class='table table-striped'>

                            @foreach($agencias as $agencia)
                                <tr>
                                    <td>{{$agencia->nombreDeLaAgencia}}</td>
                                    <td><a href="/Iplane/public/agencias/{{$agencia->rif}}/edit" class="btn btn-primary">Edit</a></td>
                                    <td>
                                                   
                                            {!!Form::open(['action'=>['AgenciaController@destroy', $agencia->rif],'method'=>'POST','class'=>'float-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                         
            

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>No hay en el sistema Agencias</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
