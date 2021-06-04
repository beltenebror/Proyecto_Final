@extends('layouts.base')

@section('title')
    - Registrarse
@endsection

@section('content')
    <div class="container col-md-8 mt-4">

        <h1 class="text-center my-4">{{ __('Register') }}</h1>
        <p class="text-center">¿Cómo quieres formar parte?</p>

        <div class="form-group row">
            <button data-rol="0" class="col-sm-4 offset-sm-2 rol">Cliente</button>
            <button data-rol="1" class="col-sm-4  rol">Conductor</button>
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
            
            <div class="form-group row" id="selectlocal" >
                <label for="municipios_id" class="col-md-4 col-form-label text-md-right">{{ __('Municipio') }}</label>
        
                        <div class="col-md-6">
                            <select name="municipios_id" id="municipios_id" class="form-control{{ $errors->has('municipios_id') ? ' is-invalid' : '' }}">
                                @foreach ($municipios as $municipio)
                                <option value="{{$municipio->id}}">{{$municipio->municipio}}</option>
                                @endforeach
                                
                            </select>
                            
                            @if ($errors->has('municipios_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('municipios_id') }}</strong>
                                </span>
                            @endif
                        </div>
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
            let soloConductor ='<div id="selectzona" class="form-group row"><label for="zona" class="col-md-4 col-form-label text-md-right">{{ __("Zona") }}</label> <div class="col-md-6"> <select name="zona" id="zona" class="form-control{{ $errors->has("zona") ? " is-invalid" : "" }}"> <option value="1">Solo mi provincia</option>    <option value="2">Solo mi comunidad</option> <option value="3">Toda españa</option></select> @if ($errors->has("zona")) <span class="invalid-feedback" role="alert"> <strong>{{ $errors->first("zona") }}</strong> </span> @endif</div> </div>'
            
            if (input_rol_value == 0) {
                $('#mensajeRol').replaceWith("<h3 class='text-center border-bottom mb-4' id='mensajeRol'>Registro como cliente</h3>");

            } else {
                $(soloConductor).insertAfter('#selectlocal');
                $('#mensajeRol').replaceWith("<h3 class='text-center border-bottom mb-4' id='mensajeRol'>Registro como conductor</h3>");
            }

        });

    </script>

@endsection
