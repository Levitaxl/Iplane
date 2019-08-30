@extends('administrador.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                @include('alerts.request')


                <div class="card-body">
                    {!! Form::open(['action' => 'AgenciaController@store', 'method' => 'POST']) !!}
                        @csrf

                        <div class="form-group">
                            {{Form::label('rif','RIF')}}
                            {{Form::text('rif','',['class'=>'form-control','placeholder'=>'RIF'])}}
                        </div>

                        <div class="form-group">
                                {{Form::label('nombreDeLaAgencia','Nombre De La agencia')}}
                                {{Form::text('nombreDeLaAgencia','',['class'=>'form-control','placeholder'=>'Nombre De La Agencia'])}}
                        </div>

                        <div class="form-group">
                                {{Form::label('direccion','Dirección')}}
                                {{Form::text('direccion','',['class'=>'form-control','placeholder'=>'Dirección'])}}
                            </div>

                        <div class="form-group">
                                {{Form::label('telefono','Teléfono')}}
                                {{Form::text('telefono','',['class'=>'form-control','placeholder'=>'Teléfono'])}}
                        </div>
    
                        <div class="form-group">
                                {{Form::label('personaContacto','')}}
                                {{Form::text('personaContacto','',['class'=>'form-control','placeholder'=>'personaContacto'])}}
                        </div>
        
            
            


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>



                    {!! Form::close() !!}
                </div>

            </div>
        
        </div>
    </div>
</div>
@endsection