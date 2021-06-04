@extends('layouts.base')

@section('title')
    - Viajes
@endsection

@section('content')
    <div class="container">
        <div class="container col-md-8 mt-4">

            <h1 class="text-center my-4">Solicita viaje</h1>
            <p class="text-center">¿Cómo quieres contratar nuestro servicio?</p>

            <div class="form-group row">
                <button data-rol="0" class="col-sm-4 offset-sm-2 rol">Viaje definido</button>
                <button data-rol="1" class="col-sm-4  rol">Alquilar chofer con conductor</button>
            </div>
            <p class="text-center text-danger" id="mensajeRol">¡Selecciona el tipo de servicio que quieres!</p>


            <form action="{{ route("crear-viaje")}}" method="POST">
                @csrf
                <input id="rol" name="tipo" type="hidden">

                <div class=" row">
                    <p class="col-md-12 text-center font-italic font-weight-light">Fecha y hora a la que desea realizar el viaje:</p>

                    <div class="form-group row col-md-6">
                        <label for="fecha_contratada" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>
        
                        <div class="col-md-8">
                            <input id="fecha_contratada" type="date" class="form-control{{ $errors->has('fecha_contratada') ? ' is-invalid' : '' }}"
                                name="fecha_contratada" value="{{ old('fecha_contratada') }}" required autofocus>
        
                            @if ($errors->has('fecha_contratada'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fecha_contratada') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row col-md-6">
                        <label for="hora_contratada" class="col-md-4 col-form-label text-md-right">{{ __('Hora') }}</label>
        
                        <div class="col-md-8">
                            <input id="hora_contratada" type="time" class="form-control{{ $errors->has('hora_contratada') ? ' is-invalid' : '' }}"
                                name="hora_contratada" value="{{ old('hora_contratada') }}" required autofocus>
        
                            @if ($errors->has('hora_contratada'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('hora_contratada') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    
                </div>

                <div class=" row">
                    <p class="col-md-12 text-center font-italic font-weight-light">Zona de recogida:</p>

                    <div class="form-group row col-md-6">
                        <label for="loc_inicio" class="col-md-12 col-form-label">{{ __('Municipio') }}</label>
        
                        <div class="col-md-12">
                            <select name="loc_inicio" id="loc_inicio" class="form-control{{ $errors->has('loc_inicio') ? ' is-invalid' : '' }}">
                                @foreach ($municipios as $municipio)
                                <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                                @endforeach
                                
                            </select>
                            
                            @if ($errors->has('loc_inicio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('loc_inicio') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row col-md-6">
                        <label for="direccion_inicio_exacta" class="col-md-12 col-form-label">{{ __('Dirección de inicio') }}</label>
        
                        <div class="col-md-12">
                            <input id="direccion_inicio_exacta" type="text" class="form-control{{ $errors->has('direccion_inicio_exacta') ? ' is-invalid' : '' }}"
                                name="direccion_inicio_exacta" value="{{ old('direccion_inicio_exacta') }}" required autofocus>
        
                            @if ($errors->has('direccion_inicio_exacta'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('direccion_inicio_exacta') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    
                </div>

                



                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary aling center">
                            {{ __('Enviar') }}
                        </button>
                    </div>
                </div>

            </form>


        </div>

    </div>


    <script>
        $('.rol').click(function() {
            let input_rol = $('#rol');
            let input_rol_value = $(this).attr('data-rol');
            $(input_rol).val(input_rol_value);


            /*let soloConductor =
                '<div class="form-group row " id="selectzona"><label for="zona" class="col-md-4 col-form-label text-md-right">{{ __('Zona de trabajo') }}</label><select class="form-control col-md-5" name="zona" id="zona"><option value="0">Solo mi provincia</option><option value="1">Solo mi comunidad</option><option value="2">Toda españa</option></select></div>';
            */
            if (input_rol_value == 0) {
                $('#mensajeRol').replaceWith(
                    "<h3 class='text-center border-bottom mb-4' id='mensajeRol'>Viaje</h3>");

            } else {
                /*$(soloConductor).insertAfter('#selectlocal');*/
                $('#mensajeRol').replaceWith(
                    "<h3 class='text-center border-bottom mb-4' id='mensajeRol'>Alquiler por horas</h3>");
            }

        });

    </script>
@endsection
