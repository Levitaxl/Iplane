@extends('administrador.layouts.app')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar el usuario:') }}</div>
                    @include('alerts.request')

                    <div class="card-body">

                            {!! Form::open(['action' => ['RutaController@update', $ruta->id], 'method' => 'PUT']) !!}
                            @csrf

                             <div class="form-group">
                                {{Form::label('ciudadSalida','Ciudad de salida')}}
                                <select name="ciudadSalida"class="browser-default custom-select">
                                
                                    @for ($i = 0; $i <sizeof($ciudades); $i++)
                                            @if ($ruta->ciudadSalida==$ciudades[$i]->nombre) 
                                                <option selected="true">{{$ciudades[$i]->nombre}}</option>  
                                            @else
                                                <option>{{$ciudades[$i]->nombre}}</option>
                                            @endif
                                   @endfor
                                </select>
                            </div>

                            <div class="form-group">
                                {{Form::label('ciudadSalida','Ciudad de salida')}}
                                <select name="ciudadLlegada"class="browser-default custom-select">
                                    @for ($i = 0; $i <	sizeof($ciudades); $i++)
                                            @if ($ruta->ciudadLlegada==$ciudades[$i]->nombre) 
                                                <option selected>{{$ciudades[$i]->nombre}}</option>
                                                
                                            @else
                                            <option>{{$ciudades[$i]->nombre}}</option>

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