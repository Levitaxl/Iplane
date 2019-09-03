@extends('administrador.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar una ruta') }}</div>
                @include('alerts.request')

                <div class="card-body">
                    {!! Form::open(['action' => 'RutaController@store', 'method' => 'POST']) !!}
                        @csrf
                        <div class="form-group">
                            {{Form::label('ciudadSalida','Ciudad de salida')}}
                            <select name="ciudadSalida"class="browser-default custom-select">
                                    @foreach($ciudades as $ciudadSalida)
                                        <option>{{$ciudadSalida->nombre}}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="form-group">
                                {{Form::label('ciudadLlegada','Ciudad de llegada')}}
                                <select name="ciudadLlegada"class="browser-default custom-select">
                                    @for ($i = 0; $i <	sizeof($ciudades); $i++)
                                            <option>{{$ciudades[$i]->nombre}}</option>
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