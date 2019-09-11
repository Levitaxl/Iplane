@extends('administrador.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear un vuelo') }}</div>
       

                <div class="card-body">

                        @include('alerts.request')
                    {!! Form::open(['action' => 'VueloController@store', 'method' => 'POST']) !!}
                        @csrf

                        <div class="form-group">
                            {{Form::label('ruta_id','ID de la ruta')}}
                            <select name="ruta_id" class="browser-default custom-select">
                                @for ($i = 0; $i <	sizeof($rutas); $i++)
                                    <option> {{$rutas[$i]->id}}</option>
                               @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('capacidad_pasajeros','Capacidad de pasajeros')}}
                            <select name="capacidad_pasajeros" class="browser-default custom-select">
                                @for ($i = 15; $i <=30; $i++)
                                    <option>{{$i}}</option>
                               @endfor
                              </select>
                        </div>

                        
                        <div class="form-group">
                                {{Form::label('fecha_vuelo','Fecha de vuelo')}}
                                {{Form::text('fecha_vuelo','',['class'=>'form-control','placeholder'=>'dd/mm/aaaa '])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('hora_vuelo','Hora del vuelo')}}
                            {{Form::text('hora_vuelo','',['class'=>'form-control','placeholder'=>' hh:mm '])}}
                        </div>


                        <div class="form-group">
                            {{Form::label('piloto','Piloto')}}
                            <select name="piloto" class="browser-default custom-select">
                                @for ($i = 0; $i <	sizeof($personal); $i++)
                                        @if($personal[$i]->cargo=="piloto")
                                            <option>{{$personal[$i]->nombre}}  {{$personal[$i]->apellido}} - {{$personal[$i]->cedula}} </option>
                                        @endif
                               @endfor
                              </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('copiloto','Copiloto')}}
                            <select name="copiloto" class="browser-default custom-select">
                                @for ($i = 0; $i <	sizeof($personal); $i++)
                                        @if($personal[$i]->cargo=="copiloto")
                                            <option>{{$personal[$i]->nombre}}  {{$personal[$i]->apellido}} - {{$personal[$i]->cedula}}</option>
                                        @endif
                               @endfor
                              </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('sobrecargo1','Sobrecargo 1')}}
                            <select name="sobrecargo1" class="browser-default custom-select">
                                @for ($i = 0; $i <	sizeof($personal); $i++)
                                        @if($personal[$i]->cargo=="sobrecargo")
                                            <option>{{$personal[$i]->nombre}}  {{$personal[$i]->apellido}} - {{$personal[$i]->cedula}}</option>
                                        @endif
                               @endfor
                              </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('sobrecargo2','Sobrecargo 2')}}
                            <select name="sobrecargo2" class="browser-default custom-select">
                                @for ($i = 0; $i <	sizeof($personal); $i++)
                                        @if($personal[$i]->cargo=="sobrecargo")
                                            <option>{{$personal[$i]->nombre}}  {{$personal[$i]->apellido}} - {{$personal[$i]->cedula}}</option>
                                        @endif
                               @endfor
                              </select>
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