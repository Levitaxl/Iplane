@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                @include('alerts.request')


                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            {{Form::label('nombre','Nombre')}}
                            {{Form::text('nombre','',['class'=>'form-control','placeholder'=>'Nombre'])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('apellido','Apellido')}}
                                {{Form::text('apellido','',['class'=>'form-control','placeholder'=>'Apellido'])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('cedula','Cedula')}}
                                {{Form::text('cedula','',['class'=>'form-control','placeholder'=>'Cedula'])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('direccion','Direccion')}}
                                {{Form::text('direccion','',['class'=>'form-control','placeholder'=>'Direccion'])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('telefono','Telefono')}}
                                {{Form::text('telefono','',['class'=>'form-control','placeholder'=>'Telefono'])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::text('email','',['class'=>'form-control','placeholder'=>'Email'])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('password','Contraseña')}}
                                {{Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('password-confirm','Confirmar Contraseña')}}
                            {{Form::password('password-confirm',['class'=>'form-control','placeholder'=>'Confirmar Contraseña'])}}
                        </div>
            


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
