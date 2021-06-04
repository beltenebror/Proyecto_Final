@extends('layouts.base')

@section('content')
<div class="container">
    @foreach ($chofers as $chofer)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://iteragrow.com/wp-content/uploads/2018/04/buyer-persona-e1545248524290.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{($chofer->user->name)}}</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Seleccionar</a>
        </div>
      </div>
    @endforeach
</div>
@endsection