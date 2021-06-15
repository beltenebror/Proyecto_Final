@extends('layouts.base')

@section('content')
    <div class="container">

        <h1>Hoy:</h1>

        @if (isset($serviciosHoy[0]))

            @foreach ($serviciosHoy as $servicio)
                <div class="card my-1">
                    <div class="card-header">
                        @if ($servicio->tipo == 0) <strong>Tipo: </strong>Viaje por
                        kilometros @else <strong>Tipo: </strong>Alquiler por horas @endif ||
                        {{ $servicio->fecha_contratada }} || {{ date('H:i', strtotime($servicio->hora_contratada)) }}
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6">
                            <h3 class="col-md-12">Información:</h3>
                            <p><strong>Localidad: </strong>{{ $servicio->municipioInicio->municipio }}<br>
                                <strong>Dirección: </strong>{{ $servicio->direccion_inicio_exacta }}<br>
                                <strong>Fecha: </strong>{{ $servicio->fecha_contratada }}<br>
                                <strong>Hora: </strong>{{ date('H:i', strtotime($servicio->hora_contratada)) }}<br>
                                @if ($servicio->tipo == 0)

                                    <strong>Kilometros: </strong>{{ $servicio->kilometraje }} km
                            </p>

                            @else

                            <strong>Tiempo: </strong>{{ $servicio->horas_alquiler }} Horas</p>

                            @endif

                        </div>
                        <div class="col-md-6 row">

                            @if (auth()->user()->rol == 0)
                                <h3 class="col-md-12">Conductor</h3>
                                <div class="col-md-6">
                                    <img class="card-img-top" src="{{ asset('storage/' . $servicio->chofer->user->image) }}"
                                        alt="Card image cap" style="height:160px; object-fit: cover;">
                                </div>
                                <div class="col-md-6">
                                        <p><strong>Nombre:</strong> {{ $servicio->chofer->user->name }} </p>
                                        <p><strong>Teléfono:</strong> {{ $servicio->chofer->user->telefono }}</p>
                                        <p><strong>Municipio:</strong> {{ $servicio->chofer->user->municipio->municipio }} </p>
                                </div>
                            @else
                                <h3 class="col-md-12">Cliente</h3>
                                @if ($servicio->cliente->anonimo = 0)
                                    <div class="col-md-6">
                                        <img class="card-img-top" src="{{ asset('storage/' . $servicio->cliente->user->image) }}"
                                            alt="Card image cap" style="height:160px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-6">
                                    <p><strong>Nombre:</strong> {{ $servicio->cliente->user->name }} </p>
                                    <p><strong>Teléfono:</strong> {{ $servicio->cliente->user->telefono }}</p>
                                    <p><strong>Municipio:</strong> {{ $servicio->cliente->user->municipio->municipio }} </p>
                                    </div>

                                @else
                                    <p>El cliente quiere mantenerse anonimo</p>
                                @endif


                            @endif

                        </div>

                        @if(auth()->user()->rol == 0)

                            @if ($servicio->confirmado_cliente==0)
                                @if (date('H:i', strtotime($servicio->hora_contratada)) < date('H:i', strtotime('+2 hour')))
                                    <div class="offset-md-5 col-md-7 mt-2">
                                        <a href="{{route('confirmar-viaje', ['servicioId' => $servicio->id])}}" class="btn btn-primary">Confirmar viaje terminado</a>
                                    </div>
                                
                                @endif
                            @else
                                <div class="offset-md-5 col-md-7 mt-2">
                                <a class="btn btn-success">Viaje confirmado</a>
                                </div>
                            @endif
                            
                        @else

                            @if ($servicio->confirmado_chofer==0)
                                @if (date('H:i', strtotime($servicio->hora_contratada)) < date('H:i', strtotime('+2 hour')))
                                    <div class="offset-md-5 col-md-7 mt-2">
                                        <a href="{{route('confirmar-viaje', ['servicioId' => $servicio->id])}}" class="btn btn-primary">Confirmar viaje terminado</a>
                                    </div>
                                @endif
                            @else
                                <div class="offset-md-5 col-md-7 mt-2">
                                <a class="btn btn-success">Viaje confirmado</a>
                                </div>
                            @endif

                        @endif
                     </div>
                </div>
            @endforeach

        @else

            <p>No tienes servicios para hoy</p>

        @endif

    <hr>



    <h1>Próximos:</h1>
    @if (isset($serviciosPorHacer[0]))

        @foreach ($serviciosPorHacer as $servicio)
            <div class="card my-1">
                <div class="card-header">
                @if ($servicio->tipo == 0) <strong>Tipo: </strong>Viaje por
                kilometros @else <strong>Tipo: </strong>Alquiler por horas @endif ||
                {{ $servicio->fecha_contratada }} || {{ date('H:i', strtotime($servicio->hora_contratada)) }}
            </div>
            <div class="card-body row">
                <div class="col-md-6">
                    <h3 class="col-md-12">Información:</h3>
                    <p><strong>Localidad: </strong>{{ $servicio->municipioInicio->municipio }}<br>
                        <strong>Dirección: </strong>{{ $servicio->direccion_inicio_exacta }}<br>
                        <strong>Fecha: </strong>{{ $servicio->fecha_contratada }}<br>
                        <strong>Hora: </strong>{{ date('H:i', strtotime($servicio->hora_contratada)) }}<br>
                        @if ($servicio->tipo == 0)

                            <strong>Kilometros: </strong>{{ $servicio->kilometraje }} km
                    </p>

                    @else

                    <strong>Tiempo: </strong>{{ $servicio->horas_alquiler }} Horas</p>

                    @endif

                </div>
                <div class="col-md-6 row">

                    @if (auth()->user()->rol == 0)
                        <h3 class="col-md-12">Conductor</h3>
                        <div class="col-md-6">
                            <img class="card-img-top" src="{{ asset('storage/' . $servicio->chofer->user->image) }}"
                                alt="Card image cap" style="height:160px; object-fit: cover;">
                        </div>
                        <div class="col-md-6">
                                <p><strong>Nombre:</strong> {{ $servicio->chofer->user->name }} </p>
                                <p><strong>Teléfono:</strong> {{ $servicio->chofer->user->telefono }}</p>
                                <p><strong>Municipio:</strong> {{ $servicio->chofer->user->municipio->municipio }} </p>
                        </div>
                    @else
                        <h3 class="col-md-12">Cliente</h3>
                        @if ($servicio->cliente->anonimo = 0)
                            <div class="col-md-6">
                                <img class="card-img-top" src="{{ asset('storage/' . $servicio->cliente->user->image) }}"
                                    alt="Card image cap" style="height:160px; object-fit: cover;">
                            </div>
                            <div class="col-md-6">
                            <p><strong>Nombre:</strong> {{ $servicio->cliente->user->name }} </p>
                            <p><strong>Teléfono:</strong> {{ $servicio->cliente->user->telefono }}</p>
                            <p><strong>Municipio:</strong> {{ $servicio->cliente->user->municipio->municipio }} </p>
                            </div>

                        @else
                            <p>El cliente quiere mantenerse anonimo</p>
                        @endif


                    @endif

                </div>
            </div>
        </div>
        @endforeach

        @else

        <p>No tienes servicios para hoy</p>

    @endif





    @if (isset($serviciosPasados[0]))
        <hr>
        <h1>Pasados</h1>
        @foreach ($serviciosPasados as $servicio)
        <div class="card my-1">
            <div class="card-header">
            @if ($servicio->tipo == 0) <strong>Tipo: </strong>Viaje por
            kilometros @else <strong>Tipo: </strong>Alquiler por horas @endif ||
            {{ $servicio->fecha_contratada }} || {{ date('H:i', strtotime($servicio->hora_contratada)) }}
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                <h3 class="col-md-12">Información:</h3>
                <p><strong>Localidad: </strong>{{ $servicio->municipioInicio->municipio }}<br>
                    <strong>Dirección: </strong>{{ $servicio->direccion_inicio_exacta }}<br>
                    <strong>Fecha: </strong>{{ $servicio->fecha_contratada }}<br>
                    <strong>Hora: </strong>{{ date('H:i', strtotime($servicio->hora_contratada)) }}<br>
                    @if ($servicio->tipo == 0)

                        <strong>Kilometros: </strong>{{ $servicio->kilometraje }} km
                </p>

                @else

                <strong>Tiempo: </strong>{{ $servicio->horas_alquiler }} Horas</p>

                @endif

            </div>
            <div class="col-md-6 row">

                @if (auth()->user()->rol == 0)
                    <h3 class="col-md-12">Conductor</h3>
                    <div class="col-md-6">
                        <img class="card-img-top" src="{{ asset('storage/' . $servicio->chofer->user->image) }}"
                            alt="Card image cap" style="height:160px; object-fit: cover;">
                    </div>
                    <div class="col-md-6">
                            <p><strong>Nombre:</strong> {{ $servicio->chofer->user->name }} </p>
                            <p><strong>Teléfono:</strong> {{ $servicio->chofer->user->telefono }}</p>
                            <p><strong>Municipio:</strong> {{ $servicio->chofer->user->municipio->municipio }} </p>
                    </div>
                @else
                    <h3 class="col-md-12">Cliente</h3>
                    @if ($servicio->cliente->anonimo = 0)
                        <div class="col-md-6">
                            <img class="card-img-top" src="{{ asset('storage/' . $servicio->cliente->user->image) }}"
                                alt="Card image cap" style="height:160px; object-fit: cover;">
                        </div>
                        <div class="col-md-6">
                        <p><strong>Nombre:</strong> {{ $servicio->cliente->user->name }} </p>
                        <p><strong>Teléfono:</strong> {{ $servicio->cliente->user->telefono }}</p>
                        <p><strong>Municipio:</strong> {{ $servicio->cliente->user->municipio->municipio }} </p>
                        </div>

                    @else
                        <p>El cliente quiere mantenerse anonimo</p>
                    @endif


                @endif

            </div>
        </div>
        </div>
        @endforeach
    @endif



    </div>
@endsection
