@extends('layouts.base')

@section('title')
    - Inicio
@endsection

@section('content')
    <div class="container">
        <div class=" justify-content-center">

            <h1 class="m-4 text-center">{{ __('general.Inicio1') }}</h1>
            <hr>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('storage/carrusel/1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('storage/carrusel/2.jpg') }}" alt="Second slide"
                            style="height: 555px;  object-fit: cover;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('storage/carrusel/3.jpg') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <hr class="mb-4">
            <div style="height: 50px"></div>
            <div class="m-4 row">

                <div class="col-md-6">
                    <h2>{{ __('general.subtitulo1') }}</h2>
                    <p>{{ __('general.parrafo1-1') }}</p>
                    <p>{{ __('general.parrafo1-2') }}</p>

                </div>
                <div class="col-md-6">
                  <img class="d-block w-100" src="{{ asset('storage/imagenes/pasajero.jpg') }}" alt="viajero">
                </div>



            </div>
            <div style="height: 50px"></div>

            <div class="m-4 row">
                <div class="col-md-6">
                  <img class="d-block w-100" src="{{ asset('storage/imagenes/conductor.jpg') }}" alt="conductor">
                </div>
                <div class="col-md-6">
                    <h2 class="text-right">{{ __('general.subtitulo2') }}</h2>
                    <p class="text-right">{{ __('general.parrafo2-1') }}</p>
                    <p class="text-right">{{ __('general.parrafo2-2') }}</p>
                </div>


            </div>
            <div style="height: 50px"></div>

        </div>
    </div>
@endsection
