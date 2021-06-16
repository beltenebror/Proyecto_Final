@extends('layouts.base')

@section('title')
    - Viajes
@endsection

@section('content')
    <div class="container">
        <div class=" justify-content-center">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="mt-4">{{__('general.Viaja con nosotros :')}}</h1>
                    <p>{{__('general.viaje1')}}</p>
                    <p class="mb-4">{{__('general.viaje2')}}</p>
                    @guest
                        <!--vista para invitado-->

                        <h2>{{__('general.¡Si quieres tu viaje no pierdas el tiempo, registrate!')}}</h2>
                        <h2><a href="{{ route("register")}}">{{__('Register')}}</a></h2>
                        


                    @else

                        @if (auth()->user()->rol == 0)
                            <!--vista para cliente-->

                            <h2> <a href="{{ route('pedir-viaje')}}">{{__('general.Solicita tu viaje!')}}</a></h2>

                        @endif

                    @endguest
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('imagenes/coche1.jpg') }}" alt="coche de alquiler" style="width: 100%;">

                </div>
            </div>





        </div>
    </div>
@endsection
