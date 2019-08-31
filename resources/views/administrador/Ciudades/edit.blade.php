@extends('administrador.layouts.app')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Ciudad') }}</div>
                    @include('alerts.request')

                    <div class="card-body">

                            {!! Form::open(['action' => ['CiudadController@update', $ciudad->id], 'method' => 'PUT']) !!}
                            @csrf

    
                            <div class="form-group">
                                    {{Form::label('nombre','Nombre')}}
                                    {{Form::text('nombre',$ciudad->nombre,['class'=>'form-control','placeholder'=>'Nombre'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('id','ID')}}
                                {{Form::text('id',$ciudad->id,['class'=>'form-control','placeholder'=>'ID',"disabled"=>"disabled"])}}
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