<div class="container ">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">TuChofer</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrincipal" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse py-2" id="navbarPrincipal">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link {{ ! Route::is('home') ?: 'active' }}" href="{{ route('home') }}">Home</a> 
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">link</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">link</a>
          </li>

        </ul>
        
        
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
        
      </div>
    </div>
  </nav>
 </div>