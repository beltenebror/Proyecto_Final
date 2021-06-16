@extends('layouts.base')

@section('content')
    <div class="container">
        @if (isset($chofers[0]))
        <h2 class="center">{{__('general.Seleccione el chofer para su viaje:')}}</h2>
            <div class="row">
                @foreach ($chofers as $chofer)
                <button data-toggle="modal" data-target="#modal-chofer-{{$chofer->chofers_id}}" style="border: none; background-color:white;">
                    <div class="card m-2" style="width: 16rem;">
                        <img class="card-img-top" src="{{ asset('storage/' . $chofer->user->image) }}"
                            alt="Card image cap" style="height:160px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $chofer->user->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                          @if ($servicio->tipo==0)
                          <li class="list-group-item">{{ number_format(($chofer->precio_kilometro  * $servicio->kilometraje), 2, ',', '.')}} €</li>

                          @else
                          <li class="list-group-item">{{ number_format(($chofer->precio_hora  * $servicio->horas_alquiler), 2, ',', '.')}} €</li>

                          @endif

                        </ul>
                    </div>
                  </button>
                                    <!--modal-->
                  <div class="modal fade" id="modal-chofer-{{$chofer->chofers_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">{{ $chofer->user->name }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>{{__('general.¿Desea seleccionar este chofer?')}}</p>
                        </div>
                        
                        <div class="modal-footer">
                          <a href="{{route("seleccionar-chofer",['choferId'=> $chofer->chofers_id , 
                            'servicioId'=>$servicio->id])}}" type="button" class="btn btn-primary">{{__('general.Seleccionar este chofer')}}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <!--Fin-->

                
                @endforeach
            </div>
        @else
            <p>{{__('general.No tenemos chofers para este servicio actualemnte. ¡Sentimos las molestias!')}}</p>
        @endif

    </div>
@endsection
