@extends('layouts.base')

@section('title')
    - Registrarse
@endsection

@section('content')
    <div class="container col-md-8 mt-4">

        <h2 class="text-center my-4">{{ __('Register') }}</h2>
        <p class="text-center">¿Cómo quieres formar parte?</p>

        <div class="form-group row">
            <button data-rol="0" class="col-sm-4 offset-sm-2 rol">Cliente</button>
            <button data-rol="1" class="col-sm-4  rol">Conductor</button>
            @if ($errors->has('rol'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('rol') }}</strong>
                        </span>
                    @endif

        </div>
        <p class="text-center text-danger" id="mensajeRol">¡Elige tu tipo de registro!</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input id="rol" name="rol" type="hidden">

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                <div class="col-md-6">
                    <input id="telefono" type="telefono"
                        class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono"
                        value="{{ old('telefono') }}" required>

                    @if ($errors->has('telefono'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('telefono') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                <div class="col-md-6">
                    <input id="dni" type="dni" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}"
                        name="dni" value="{{ old('dni') }}" required>

                    @if ($errors->has('dni'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dni') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="comunidad" class="col-md-4 col-form-label text-md-right">{{ __('Comunidad') }}</label>

                <select class="form-control{{ $errors->has('comunidad') ? ' is-invalid' : '' }} col-md-5 " name="comunidad" id="comunidad">
                    <option value="Andalucía">Andalucía</option>
                    <option value="Aragón">Aragón</option>
                    <option value="Principado de Asturias">Principado de Asturias</option>
                    <option value="Islas Baleares">Islas Baleares</option>
                    <option value="País Vasco">País Vasco</option>
                    <option value="Canarias">Canarias</option>
                    <option value="Cantabria">Cantabria</option>
                    <option value="Castilla-La Mancha">Castilla-La Mancha</option>
                    <option value="Castilla y León">Castilla y LeÃ³n</option>
                    <option value="Cataluña">Cataluña</option>
                    <option value="Extremadura">Extremadura</option>
                    <option value="Galicia">Galicia</option>
                    <option value="Comunidad de Madrid">Comunidad de Madrid</option>
                    <option value="Región de Murcia">Región de Murcia</option>
                    <option value="Comunidad Foral de Navarra">Comunidad Foral de Navarra</option>
                    <option value="La Rioja">La Rioja</option>
                    <option value="Comunidad Valenciana">Comunidad Valenciana</option>
                    <option value="Ceuta">Ceuta</option>
                    <option value="Melilla">Melilla</option>
                </select>
                @if ($errors->has('comunidad'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('comunidad') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group row">
                <label for="provincia" class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>

                <select class="form-control{{ $errors->has('provincia') ? ' is-invalid' : '' }} col-md-5" name="provincia" id="provincia">
                    <option value='alava'>Álava</option>
                    <option value='albacete'>Albacete</option>
                    <option value='alicante'>Alicante/Alacant</option>
                    <option value='almeria'>Almería</option>
                    <option value='asturias'>Asturias</option>
                    <option value='avila'>Ávila</option>
                    <option value='badajoz'>Badajoz</option>
                    <option value='barcelona'>Barcelona</option>
                    <option value='burgos'>Burgos</option>
                    <option value='caceres'>Cáceres</option>
                    <option value='cadiz'>Cádiz</option>
                    <option value='cantabria'>Cantabria</option>
                    <option value='castellon'>Castellón/Castelló</option>
                    <option value='ceuta'>Ceuta</option>
                    <option value='ciudadreal'>Ciudad Real</option>
                    <option value='cordoba'>Córdoba</option>
                    <option value='cuenca'>Cuenca</option>
                    <option value='girona'>Girona</option>
                    <option value='laspalmas'>Las Palmas</option>
                    <option value='granada'>Granada</option>
                    <option value='guadalajara'>Guadalajara</option>
                    <option value='guipuzcoa'>Guipúzcoa</option>
                    <option value='huelva'>Huelva</option>
                    <option value='huesca'>Huesca</option>
                    <option value='illesbalears'>Illes Balears</option>
                    <option value='jaen'>Jaén</option>
                    <option value='acoruña'>A Coruña</option>
                    <option value='larioja'>La Rioja</option>
                    <option value='leon'>León</option>
                    <option value='lleida'>Lleida</option>
                    <option value='lugo'>Lugo</option>
                    <option value='madrid'>Madrid</option>
                    <option value='malaga'>Málaga</option>
                    <option value='melilla'>Melilla</option>
                    <option value='murcia'>Murcia</option>
                    <option value='navarra'>Navarra</option>
                    <option value='ourense'>Ourense</option>
                    <option value='palencia'>Palencia</option>
                    <option value='pontevedra'>Pontevedra</option>
                    <option value='salamanca'>Salamanca</option>
                    <option value='segovia'>Segovia</option>
                    <option value='sevilla'>Sevilla</option>
                    <option value='soria'>Soria</option>
                    <option value='tarragona'>Tarragona</option>
                    <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
                    <option value='teruel'>Teruel</option>
                    <option value='toledo'>Toledo</option>
                    <option value='valencia'>Valencia/Valéncia</option>
                    <option value='valladolid'>Valladolid</option>
                    <option value='vizcaya'>Vizcaya</option>
                    <option value='zamora'>Zamora</option>
                    <option value='zaragoza'>Zaragoza</option>
                </select>
                @if ($errors->has('provincia'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('provincia') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group row" id="selectlocal">
                <label for="localidad" class="col-md-4 col-form-label text-md-right">{{ __('Localidad') }}</label>

                <select class="form-control{{ $errors->has('localidad') ? ' is-invalid' : '' }} col-md-5" name="localidad" id="localidad">
                    <option value='porasd'>por hacer</option>
                    <option value='albacete'>por hacer</option>
                    <option value='alicante'>por hacer/Alacant</option>
                    <option value='almeria'>Almería</option>
                    <option value='asturias'>Asturias</option>
                    <option value='avila'>Ávila</option>
                    <option value='badajoz'>Badajoz</option>
                    <option value='barcelona'>Barcelona</option>
                    <option value='burgos'>Burgos</option>
                    <option value='caceres'>Cáceres</option>
                    <option value='cadiz'>Cádiz</option>
                    <option value='cantabria'>Cantabria</option>
                    <option value='castellon'>Castellón/Castelló</option>
                    <option value='ceuta'>Ceuta</option>
                    <option value='ciudadreal'>Ciudad Real</option>
                    <option value='cordoba'>Córdoba</option>
                    <option value='cuenca'>Cuenca</option>
                    <option value='girona'>Girona</option>
                    <option value='laspalmas'>Las Palmas</option>
                    <option value='granada'>Granada</option>
                    <option value='guadalajara'>Guadalajara</option>
                    <option value='guipuzcoa'>Guipúzcoa</option>
                    <option value='huelva'>Huelva</option>
                    <option value='huesca'>Huesca</option>
                    <option value='illesbalears'>Illes Balears</option>
                    <option value='jaen'>Jaén</option>
                    <option value='acoruña'>A Coruña</option>
                    <option value='larioja'>La Rioja</option>
                    <option value='leon'>León</option>
                    <option value='lleida'>Lleida</option>
                    <option value='lugo'>Lugo</option>
                    <option value='madrid'>Madrid</option>
                    <option value='malaga'>Málaga</option>
                    <option value='melilla'>Melilla</option>
                    <option value='murcia'>Murcia</option>
                    <option value='navarra'>Navarra</option>
                    <option value='ourense'>Ourense</option>
                    <option value='palencia'>Palencia</option>
                    <option value='pontevedra'>Pontevedra</option>
                    <option value='salamanca'>Salamanca</option>
                    <option value='segovia'>Segovia</option>
                    <option value='sevilla'>Sevilla</option>
                    <option value='soria'>Soria</option>
                    <option value='tarragona'>Tarragona</option>
                    <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
                    <option value='teruel'>Teruel</option>
                    <option value='toledo'>Toledo</option>
                    <option value='valencia'>Valencia/Valéncia</option>
                    <option value='valladolid'>Valladolid</option>
                    <option value='vizcaya'>Vizcaya</option>
                    <option value='zamora'>Zamora</option>
                    <option value='zaragoza'>Zaragoza</option>
                </select>
                @if ($errors->has('localidad'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('localidad') }}</strong>
                        </span>
                    @endif
            </div>


            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary aling center">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
    <script>
        $('.rol').click(function() {
            let input_rol = $('#rol');
            let input_rol_value = $(this).attr('data-rol');
            $(input_rol).val(input_rol_value);

            $("#selectzona").remove();
            let soloConductor =
                '<div class="form-group row " id="selectzona"><label for="zona" class="col-md-4 col-form-label text-md-right">{{ __('Zona de trabajo') }}</label><select class="form-control col-md-5" name="zona" id="zona"><option value="0">Solo mi provincia</option><option value="1">Solo mi comunidad</option><option value="2">Toda españa</option></select></div>';
            if (input_rol_value == 0) {
                $('#mensajeRol').replaceWith("<h3 class='text-center border-bottom mb-4' id='mensajeRol'>Registro como cliente</h3>");

            } else {
                $(soloConductor).insertAfter('#selectlocal');
                $('#mensajeRol').replaceWith("<h3 class='text-center border-bottom mb-4' id='mensajeRol'>Registro como conductor</h3>");
            }

        });

    </script>

@endsection
