@extends('layouts.base')

@section('title')
    - Viajes
@endsection

@section('content')
    <div class="container">
        <div class="container col-md-8 mt-4">

            <h1 class="text-center my-4">{{__('general.Solicita tu viaje!')}}</h1>
            <p class="text-center">{{__('general.¿Cómo quieres contratar nuestro servicio?')}}</p>

            <div class="form-group row">
                <button data-rol="0" class="col-sm-4 offset-sm-2 rol">{{__('general.Viaje definido')}}</button>
                <button data-rol="1" class="col-sm-4  rol">{{__('general.Alquilar coche con conductor')}}</button>
            </div>
            <p class="text-center text-danger" id="mensajeRol">{{__('general.¡Selecciona el tipo de servicio que quieres!')}}</p>


            <form action="{{ route('crear-viaje') }}" method="POST">
                @csrf
                <input id="rol" name="tipo" type="hidden" value="0">

                <div class=" row">
                    <p class="col-md-12 text-center font-italic font-weight-light border-bottom border-dark">{{__('general.Fecha y hora a la que desea realizar el viaje:')}}</p>

                    <div class="form-group row col-md-6">
                        <label for="fecha_contratada"
                            class="col-md-4 col-form-label text-md-right">{{ __('general.Fecha') }}</label>

                        <div class="col-md-8">
                            @php
                                $fecha = date("Y-m-d", strtotime('tomorrow'))
                            @endphp

                            <input id="fecha_contratada" type="date"
                                class="form-control{{ $errors->has('fecha_contratada') ? ' is-invalid' : '' }}"
                                name="fecha_contratada" min="{{date("Y-m-d", strtotime($fecha))}}" value="{{ old('fecha_contratada') }}" required autofocus>

                            @if ($errors->has('fecha_contratada'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fecha_contratada') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row col-md-6">
                        <label for="hora_contratada"
                            class="col-md-4 col-form-label text-md-right">{{ __('general.Hora') }}</label>

                        <div class="col-md-8">
                            <input id="hora_contratada" type="time"
                                class="form-control{{ $errors->has('hora_contratada') ? ' is-invalid' : '' }}"
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
                    <p class="col-md-12 text-center font-italic font-weight-light border-bottom border-dark">{{__('general.Zona de recogida')}}:</p>



                    <div class="form-group row col-md-6">
                        <label for="direccion_inicio_exacta"
                            class="col-md-12 col-form-label">{{ __('general.Dirección de inicio') }}</label>

                        <div class="col-md-12">
                            <input id="direccion_inicio_exacta" type="text"
                                class="form-control{{ $errors->has('direccion_inicio_exacta') ? ' is-invalid' : '' }}"
                                name="direccion_inicio_exacta" value="{{ old('direccion_inicio_exacta') }}" required
                                autofocus>

                            @if ($errors->has('direccion_inicio_exacta'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('direccion_inicio_exacta') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row col-md-6">
                        <label for="municipios_id_inicio" class="col-md-12 col-form-label">{{ __('general.Municipio') }}</label>

                        <div class="col-md-12">
                            <select name="municipios_id_inicio" id="municipios_id_inicio"
                                class="form-control{{ $errors->has('municipios_id_inicio') ? ' is-invalid' : '' }}">
                                @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}">{{ $municipio->municipio }},
                                        {{ $municipio->provincia->provincia }}</option>
                                @endforeach

                            </select>

                            @if ($errors->has('municipios_id_inicio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('municipios_id_inicio') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div id="opcional"></div>






                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-5">
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


            let viajeHoras = '<div id="opcional" class="row"><p class="col-md-12 text-center font-italic font-weight-light border-bottom border-dark">Tiempo de servicio:</p> <div class="form-group row col-md-6"> <label for="horas" class="col-md-4 col-form-label text-md-right">{{ __("Horas") }}</label><div class="col-md-8"> <input id="horas" type="number" min="0" max="12"  class="form-control{{ $errors->has('horas') ? ' is-invalid' : '' }}"name="horas" value="0" required >  @if ($errors->has("horas")) <span class="invalid-feedback" role="alert">  <strong>{{ $errors->first("horas") }}</strong>  </span>  @endif  </div>  </div>  <div class="form-group row col-md-6"> <label for="minutos"class="col-md-4 col-form-label text-md-right">{{ __("Minutos") }}</label> <div class="col-md-8"> <input id="minutos" type="number" min="0" max="59" class="form-control{{ $errors->has('minutos') ? ' is-invalid' : '' }}" name="minutos" value="0" required >   @if ($errors->has("minutos"))<span class="invalid-feedback" role="alert"> <strong>{{ $errors->first("minutos") }}</strong>  </span>  @endif</div></div></div>';
            let viajeDefinido = '<div id="opcional" class=" row"><p class="col-md-12 text-center font-italic font-weight-light border-bottom border-dark">{{__("general.Zona final:")}}</p><div class="form-group row col-md-6"><label for="direccion_fin_exacta" class="col-md-12 col-form-label">{{ __("general.Dirección final") }}</label><div class="col-md-12"><input id="direccion_fin_exacta" type="text"class="form-control{{ $errors->has('direccion_fin_exacta') ? ' is-invalid' : '' }}"name="direccion_fin_exacta" value="{{ old('direccion_fin_exacta') }}" required autofocus> @if ($errors->has("direccion_fin_exacta"))<span class="invalid-feedback" role="alert"><strong>{{ $errors->first("direccion_fin_exacta") }}</strong></span>@endif</div></div><div class="form-group row col-md-6"><label for="municipios_id_fin" class="col-md-12 col-form-label">{{ __('general.Municipio') }}</label><div class="col-md-12"><select name="municipios_id_fin" id="municipios_id_fin" class="form-control{{ $errors->has('municipios_id_fin') ? ' is-invalid' : '' }}">@foreach ($municipios as $municipio)<option value="{{ $municipio->id }}">{{ $municipio->municipio }}, {{ $municipio->provincia->provincia }}</option>@endforeach</select> @if ($errors->has("municipios_id_fin"))<span class="invalid-feedback" role="alert"><strong>{{ $errors->first("municipios_id_fin") }}</strong> </span> @endif</div></div> <div class="form-group row col-md-6 offset-md-3"><label for="kilometraje" class="col-md-12 col-form-label">{{ __("general.Distancia en kilometros") }}</label><div class="col-md-12"><input id="kilometraje" type="number" min="1"class="form-control{{ $errors->has('kilometraje') ? ' is-invalid' : '' }}"name="kilometraje" value="{{ old('kilometraje') }}" required autofocus> @if ($errors->has("kilometraje"))<span class="invalid-feedback" role="alert"><strong>{{ $errors->first("kilometraje") }}</strong></span>@endif</div></div></div>';
            if (input_rol_value == 0) {
                $('#mensajeRol').replaceWith("<h3 class='text-center border-bottom mb-4' id='mensajeRol'>{{__('general.Viaje')}}</h3>");

                $('#opcional').replaceWith(viajeDefinido);

            } else {
                $('#mensajeRol').replaceWith( "<h3 class='text-center border-bottom mb-4' id='mensajeRol'>Alquiler por horas</h3>");
                $('#opcional').replaceWith(viajeHoras);
            }

        });

    </script>
@endsection
