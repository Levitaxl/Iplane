@extends('administrador.layouts.app')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar el usuario:') }}</div>
                    @include('alerts.request')

                    <div class="card-body">

                            {!! Form::open(['action' => ['PersonalController@update', $trabajador->cedula], 'method' => 'PUT']) !!}
                            @csrf
    
    
                            <div class="form-group">
                                {{Form::label('nombre','Nombre')}}
                                {{Form::text('nombre',$trabajador->nombre,['class'=>'form-control','placeholder'=>'Nombre'])}}
                            </div>
    
                            <div class="form-group">
                                    {{Form::label('apellido','Apellido')}}
                                    {{Form::text('apellido',$trabajador->apellido,['class'=>'form-control','placeholder'=>'Apellido'])}}
                            </div>
    
                            <div class="form-group">
                                    {{Form::label('cedula','Cedula')}}
                                    {{Form::text('cedula',$trabajador->cedula,['class'=>'form-control','placeholder'=>'Cedula',"disabled"=>"disabled"])}}
                            </div>
    
                            <div class="form-group">
                                {{Form::label('direccion','Direccion')}}
                                {{Form::text('direccion',$trabajador->direccion,['class'=>'form-control','placeholder'=>'Direccion'])}}
                        </div>
    
                            <div class="form-group">
                                    {{Form::label('telefono','Teléfono')}}
                                    {{Form::text('telefono',$trabajador->telefono,['class'=>'form-control','placeholder'=>'Teléfono'])}}
                            </div>
    
                            <div class="form-group">
                                {{Form::label('cargo','Cargo')}}
                                {{Form::text('cargo',$trabajador->cargo,['class'=>'form-control',"disabled"=>"disabled"])}}
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