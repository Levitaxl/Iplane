@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>
                @include('alerts.request')


                <div class="card-body">
                        {!! Form::open(['action' => ['UserController@update', $user], 'method' => 'PUT']) !!}
                        @csrf

                        <div class="form-group">
                            {{Form::label('nombre','Nombre')}}
                            {{Form::text('nombre',$user->nombre,['class'=>'form-control','placeholder'=>'Nombre'])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('apellido','Apellido')}}
                                {{Form::text('apellido',$user->apellido,['class'=>'form-control','placeholder'=>'Apellido'])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('cedula','Cedula')}}
                                {{Form::text('cedula',$user->cedula,['class'=>'form-control','placeholder'=>'Cedula',"disabled"=>"disabled"])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('direccion','Direccion')}}
                                {{Form::text('direccion',$user->direccion,['class'=>'form-control','placeholder'=>'Direccion'])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('telefono','Telefono')}}
                                {{Form::text('telefono',$user->telefono,['class'=>'form-control','placeholder'=>'Telefono'])}}
                        </div>
                
                        <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::text('email',$user->email,['class'=>'form-control','placeholder'=>'Email',"disabled"=>"disabled"])}}
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
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
