<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container ">

        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">TuChofer</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrincipal"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse py-2" id="navbarPrincipal">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link {{ !Route::is('home') ?: 'active' }}" href="{{ route('home') }}">{{__('general.Home')}}</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link  {{ !Route::is('viaje') ?: 'active' }}"
                                href="{{ route('viaje') }}">{{__('general.Viaje')}}</a>
                        </li>
                    @else
                        @if (auth()->user()->rol == 0)
                            <li class="nav-item">
                                <a class="nav-link  {{ !Route::is('viaje') ?: 'active' }}"
                                    href="{{ route('viaje') }}">{{__('general.Viaje')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ !Route::is('ver-viajes') ?: 'active' }}"
                                    href="{{ route('ver-viajes') }}">{{__('general.Mis viajes')}}</a>
                            </li>
                        @else

                            <li class="nav-item">
                                <a class="nav-link  {{ !Route::is('ver-viajes') ?: 'active' }}"
                                    href="{{ route('ver-viajes') }}">{{__('general.Mis viajes')}}</a>
                            </li>
                        @endif
                    @endguest


                </ul>

                
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ !Route::is('login') ?: 'active' }}"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ !Route::is('register') ?: 'active' }}"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="rounded-circle" src="{{ asset('storage/' . Auth::user()->image) }}"
                                    alt="image" style="height:30px; width:30px; object-fit: cover;">
                                &nbsp;{{ Auth::user()->name }} <span class="caret"></span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('perfil') }}">
                                    {{ __('general.Perfil') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                    {{ __('general.Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item">
                    <a class="nav-link "
                     href="{{ route('locale',['locale'=> 'es']) }}">
                     <img class="rounded-circle" src="{{ asset('storage/lenguage/espana.svg') }}"
                     alt="image" style="height:30px; width:30px; object-fit: cover;">
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                     href="{{ route('locale',['locale'=> 'en']) }}">
                     <img class="rounded-circle" src="{{ asset('storage/lenguage/reino-unido.svg') }}"
                     alt="image" style="height:30px; width:30px; object-fit: cover;">
                    </a>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</nav>
