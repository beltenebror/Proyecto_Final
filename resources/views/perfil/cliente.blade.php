@extends('layouts.base')

@section('content')

    <div class="container ">

        <form class="form container  mt-4 pt-4" action="{{ route('actualizar-cliente') }}" method="post"
            id="updateProfile" enctype="multipart/form-data">
            @csrf
            <div class="row text-center">
                <div class="col-sm-12">
                    <div class="text-center pt-2">
                        <img class="" src="{{ asset('storage/' . $user->image) }}" alt="image"
                            style="height:200px; width:200px; object-fit: cover;">
                        <input class="d-block text-center offset-sm-3" type="file" name="image">
                    </div>
                </div>

                <div class="row mt-4 pt-4">


                    <div class="form-group col-sm-12 row">
                        <div class="col-sm-6 ">
                            <label for="name">
                                <h4>Nombre</h4>
                            </label>
                            <div>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" id="name" value="{{ $user->name }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>


                        <div class="col-sm-6 ">
                            <label for="email">
                                <h4>Email</h4>
                            </label>
                            <div>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" id="email" title="enter your email." value="{{ $user->email }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 row">
                        <div class="col-sm-6 ">
                            <label for="municipios_id">
                                <h4>Municipio de residencia</h4>
                            </label>
                            <select class="form-control" name="municipios_id" id="municipios_id">
                                @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}" @if ($municipio->id == $user->municipios_id) selected @endif>{{ $municipio->municipio }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="telefono">
                                <h4>Telefono</h4>
                            </label>
                           
                            <div>
                                <input type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" id="telefono"
                                value="{{ $user->telefono }}">
                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 offset-sm-3 row">
                        <div class="col-sm-6">
                            <label for="anonimo">¿Quieres mostrate anonimo ante los conductores?</label>
                            <input type="checkbox" @if($user->cliente->anonimo==1) checked @endif name="anonimo" id="anonimo">
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form_batton" style="margin-top: 3em; margin-bottom: 3em;">
                                <button type="submit" class="btn btn-primary" id="boton_actualizar_perfil">Actualizar
                                </button>
                                <a href="#" class="btn btn-light" id="boton_eliminar_cuenta" data-toggle="modal"
                                    data-target="#borrarCuentaModal">Eliminar</a>
                            </div>
                        </div>
                    </div>

                </div>
        </form>



        <!-- Delete Warning Modal -->
        <div class="modal modal-danger fade" id="borrarCuentaModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="float: left;">Borrar cuenta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('perfil-borrar') }}" method="post">
                        <div class="modal-body">

                            @csrf
                            <h5 class="text-center">
                                Estás a punto de eliminar tu cuenta
                            </h5>
                            <h5 class="text-center">
                                ¿Deseas continuar?
                            </h5>

                        </div>
                        <div class="modal-footer modal_button">
                            <button type="button" class="btn btn-light" id="modal_button_cancel" data-dismiss="modal"
                                style="float:left;">Cancelar
                            </button>
                            <button type="submit" class="btn btn-danger" id="modal_button_delete"
                                style="float: right;">Continuar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Delete Modal -->
    </div>
    </div>
@endsection
