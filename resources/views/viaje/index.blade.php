@extends('layouts.base')

@section('title')
    - Viajes
@endsection

@section('content')
    <div class="container">
        <div class=" justify-content-center">
            <div class="row">
                <div class="col-md-6">
                    <h1>Viaja con nosotros :</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid ut impedit cum debitis consectetur,
                        atque ex adipisci eveniet labore optio eaque laborum sed non quos odio beatae doloribus ratione
                        dolor.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat sapiente officiis in totam
                        corporis aut expedita ad numquam cupiditate, dicta, fuga, itaque tempora impedit dolor
                        exercitationem esse quo sed eius!</p>
                    @guest
                        <!--vista para invitado-->

                        <h2>¡No pierdas tu tiempo, registrate!</h2>
                        <a href="{{ route("register")}}">Quiero mi viaje</a>


                    @else

                        @if (auth()->user()->rol == 0)
                            <!--vista para cliente-->

                            <h2> <a href="#">Solicita tu viaje!</a></h2>

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
