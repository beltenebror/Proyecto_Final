@extends('layouts.base')

@section('content')
    <div class="container">

        <h1>{{__('general.Hoy')}}:</h1>

        @if (isset($serviciosHoy[0]))

            @foreach ($serviciosHoy as $servicio)
                <div class="card my-1">
                    <div class="card-header">
                        @if ($servicio->tipo == 0) <strong>{{__('general.Tipo')}}: </strong>{{__('general.Viaje por kilometros')}} @else <strong>{{__('general.Tipo')}}: </strong>{{__('general.Alquiler por horas')}} @endif ||
                        {{ $servicio->fecha_contratada }} || {{ date('H:i', strtotime($servicio->hora_contratada)) }}
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6">
                            <h3 class="col-md-12">{{__('general.Información')}}:</h3>
                            <p><strong>{{__('general.Municipio')}}: </strong>{{ $servicio->municipioInicio->municipio }}<br>
                                <strong>{{__('general.Dirección')}}: </strong>{{ $servicio->direccion_inicio_exacta }}<br>
                                <strong>{{__('general.Fecha')}}: </strong>{{ $servicio->fecha_contratada }}<br>
                                <strong>{{__('general.Hora')}}: </strong>{{ date('H:i', strtotime($servicio->hora_contratada)) }}<br>
                                @if ($servicio->tipo == 0)

                                    <strong>{{__('general.Kilometros')}}: </strong>{{ $servicio->kilometraje }} km
                            </p>

                            @else

                            <strong>{{__('general.Tiempo')}}: </strong>{{ $servicio->horas_alquiler }} Horas</p>

                            @endif

                        </div>
                        <div class="col-md-6 row">

                            @if (auth()->user()->rol == 0)
                                <h3 class="col-md-12">{{__('general.Conductor')}}</h3>
                                <div class="col-md-6">
                                    <img class="card-img-top" src="{{ asset('storage/' . $servicio->chofer->user->image ) }}"
                                        alt="Card image cap" style="height:160px; object-fit: cover;">
                                </div>
                                <div class="col-md-6">
                                        <p><strong>{{__('general.Nombre')}}:</strong> {{ $servicio->chofer->user->name }} </p>
                                        <p><strong>{{__('general.Teléfono')}}:</strong> {{ $servicio->chofer->user->telefono }}</p>
                                        <p><strong>{{__('general.Municipio')}}:</strong> {{ $servicio->chofer->user->municipio->municipio }} </p>
                                </div>
                            @else
                                <h3 class="col-md-12">{{__('general.Cliente')}}</h3>
                                @if ($servicio->cliente->anonimo = 0)
                                    <div class="col-md-6">
                                        <img class="card-img-top" src="{{ asset('storage/' . $servicio->cliente->user->image) }}"
                                            alt="Card image cap" style="height:160px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-6">
                                    <p><strong>{{__('general.Nombre')}}:</strong> {{ $servicio->cliente->user->name }} </p>
                                    <p><strong>{{__('general.Teléfono')}}:</strong> {{ $servicio->cliente->user->telefono }}</p>
                                    <p><strong>{{__('general.Municipio')}}:</strong> {{ $servicio->cliente->user->municipio->municipio }} </p>
                                    </div>

                                @else
                                    <p>{{__('general.El cliente quiere mantenerse anonimo')}}</p>
                                @endif


                            @endif

                        </div>

                        @if(auth()->user()->rol == 0)

                            @if ($servicio->confirmado_cliente==0)
                                @if (date('H:i', strtotime($servicio->hora_contratada)) < date('H:i', strtotime('+2 hour')))
                                    <div class="offset-md-5 col-md-7 mt-2">
                                        <a href="{{route('confirmar-viaje', ['servicioId' => $servicio->id])}}" class="btn btn-primary">{{__('general.Confirmar viaje terminado')}}</a>
                                    </div>
                                
                                @endif
                            @else
                                <div class="offset-md-5 col-md-7 mt-2">
                                <a class="btn btn-success">{{__('general.Viaje confirmado')}}</a>
                                </div>
                            @endif
                            
                        @else

                            @if ($servicio->confirmado_chofer==0)
                                @if (date('H:i', strtotime($servicio->hora_contratada)) < date('H:i', strtotime('+2 hour')))
                                    <div class="offset-md-5 col-md-7 mt-2">
                                        <a href="{{route('confirmar-viaje', ['servicioId' => $servicio->id])}}" class="btn btn-primary">{{__('general.Confirmar viaje terminado')}}</a>
                                    </div>
                                @endif
                            @else
                                <div class="offset-md-5 col-md-7 mt-2">
                                <a class="btn btn-success">{{__('general.Viaje confirmado')}}</a>
                                </div>
                            @endif

                        @endif
                     </div>
                </div>
            @endforeach

        @else

            <p>{{__('general.No tienes servicios para hoy')}}</p>

        @endif

    <hr>



    <h1>{{__('general.Próximos')}}:</h1>
    @if (isset($serviciosPorHacer[0]))

        @foreach ($serviciosPorHacer as $servicio)
            <div class="card my-1">
                <div class="card-header">
                @if ($servicio->tipo == 0) <strong>{{__('general.Tipo')}}: </strong>{{__('general.Viaje por kilometro')}} @else <strong>{{__('general.Tipo')}}: </strong>{{__('general.Alquiler por horas')}} @endif ||
                {{ $servicio->fecha_contratada }} || {{ date('H:i', strtotime($servicio->hora_contratada)) }}
            </div>
            <div class="card-body row">
                <div class="col-md-6">
                    <h3 class="col-md-12">{{__('general.Información')}}:</h3>
                    <p><strong>{{__('general.Municipio')}}: </strong>{{ $servicio->municipioInicio->municipio }}<br>
                        <strong>{{__('general.Dirección')}}: </strong>{{ $servicio->direccion_inicio_exacta }}<br>
                        <strong>{{__('general.Fecha')}}: </strong>{{ $servicio->fecha_contratada }}<br>
                        <strong>{{__('general.Hora')}}: </strong>{{ date('H:i', strtotime($servicio->hora_contratada)) }}<br>
                        @if ($servicio->tipo == 0)

                            <strong>{{__('general.Kilometros')}}: </strong>{{ $servicio->kilometraje }} km
                    </p>

                    @else

                    <strong>{{__('general.Tiempo')}}: </strong>{{ $servicio->horas_alquiler }} {{__('general.Horas')}}</p>

                    @endif

                </div>
                <div class="col-md-6 row">

                    @if (auth()->user()->rol == 0)
                        <h3 class="col-md-12">{{__('general.Conductor')}}</h3>
                        <div class="col-md-6">
                            <img class="card-img-top" src="{{ asset('storage/' . $servicio->chofer->user->image) }}"
                                alt="Card image cap" style="height:160px; object-fit: cover;">
                        </div>
                        <div class="col-md-6">
                                <p><strong>{{__('general.Nombre')}}:</strong> {{ $servicio->chofer->user->name }} </p>
                                <p><strong>{{__('general.Teléfono')}}:</strong> {{ $servicio->chofer->user->telefono }}</p>
                                <p><strong>{{__('general.Municipio')}}:</strong> {{ $servicio->chofer->user->municipio->municipio }} </p>
                        </div>
                    @else
                        <h3 class="col-md-12">{{__('general.Cliente')}}</h3>
                        @if ($servicio->cliente->anonimo = 0)
                            <div class="col-md-6">
                                <img class="card-img-top" src="{{ asset('storage/' . $servicio->cliente->user->image) }}"
                                    alt="Card image cap" style="height:160px; object-fit: cover;">
                            </div>
                            <div class="col-md-6">
                            <p><strong>{{__('general.Nombre')}}:</strong> {{ $servicio->cliente->user->name }} </p>
                            <p><strong>{{__('general.Teléfono')}}:</strong> {{ $servicio->cliente->user->telefono }}</p>
                            <p><strong>{{__('general.Municipio')}}:</strong> {{ $servicio->cliente->user->municipio->municipio }} </p>
                            </div>

                        @else
                            <p>{{__('general.El cliente quiere mantenerse anonimo')}}</p>
                        @endif


                    @endif

                </div>
            </div>
        </div>
        @endforeach

        @else

        <p>{{__('general.No tienes servicios próximos')}}</p>

    @endif





    @if (isset($serviciosPasados[0]))
        <hr>
        <h1>{{__('general.Pasados')}}</h1>
        @foreach ($serviciosPasados as $servicio)
        <div class="card my-1">
            <div class="card-header">
            @if ($servicio->tipo == 0) <strong>{{__('general.Tipo')}}: </strong>{{__('general.Viaje por kilometros')}} @else <strong>{{__('general.Tipo')}}: </strong>{{__('general.Alquiler por horas')}} @endif ||
            {{ $servicio->fecha_contratada }} || {{ date('H:i', strtotime($servicio->hora_contratada)) }}
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                <h3 class="col-md-12">{{__('general.Información')}}:</h3>
                <p><strong>{{__('general.Municipio')}}: </strong>{{ $servicio->municipioInicio->municipio }}<br>
                    <strong>{{__('general.Dirección')}}: </strong>{{ $servicio->direccion_inicio_exacta }}<br>
                    <strong>{{__('general.Fecha')}}: </strong>{{ $servicio->fecha_contratada }}<br>
                    <strong>{{__('general.Hora')}}: </strong>{{ date('H:i', strtotime($servicio->hora_contratada)) }}<br>
                    @if ($servicio->tipo == 0)

                        <strong>{{__('general.Kilometros')}}: </strong>{{ $servicio->kilometraje }} km
                </p>

                @else

                <strong>{{__('general.Tiempo')}}: </strong>{{ $servicio->horas_alquiler }} {{__('general.Horas')}}</p>

                @endif

            </div>
            <div class="col-md-6 row">

                @if (auth()->user()->rol == 0)
                    <h3 class="col-md-12">{{__('general.Conductor')}}</h3>
                    <div class="col-md-6">
                        <img class="card-img-top" src="{{ asset('storage/' . $servicio->chofer->user->image) }}"
                            alt="Card image cap" style="height:160px; object-fit: cover;">
                    </div>
                    <div class="col-md-6">
                            <p><strong>{{__('general.Nombre')}}:</strong> {{ $servicio->chofer->user->name }} </p>
                            <p><strong>{{__('general.Teléfono')}}:</strong> {{ $servicio->chofer->user->telefono }}</p>
                            <p><strong>{{__('general.Municipio')}}:</strong> {{ $servicio->chofer->user->municipio->municipio }} </p>
                    </div>
                @else
                    <h3 class="col-md-12">{{__('general.Cliente')}}</h3>
                    @if ($servicio->cliente->anonimo = 0)
                        <div class="col-md-6">
                            <img class="card-img-top" src="{{ asset('storage/' . $servicio->cliente->user->image) }}"
                                alt="Card image cap" style="height:160px; object-fit: cover;">
                        </div>
                        <div class="col-md-6">
                        <p><strong>{{__('general.Nombre')}}:</strong> {{ $servicio->cliente->user->name }} </p>
                        <p><strong>{{__('general.Teléfono')}}:</strong> {{ $servicio->cliente->user->telefono }}</p>
                        <p><strong>{{__('general.Municipio')}}:</strong> {{ $servicio->cliente->user->municipio->municipio }} </p>
                        </div>

                    @else
                        <p>{{__('general.El cliente quiere mantenerse anonimo')}}</p>
                    @endif


                @endif

            </div>
        </div>
        </div>
        @endforeach
    @endif



    </div>
@endsection
