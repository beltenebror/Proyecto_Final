<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- Assets y metaetiquetas de cabecera --}}
@include('layouts.head')

<body id="app-layout" style="height: 100vh;">
    <div class="page">
        {{-- Barra de navegación --}}
        @include('layouts.navbar')

        @include('flash-message')

        

        {{-- Contenido de la página --}}
        @yield('content')

        {{-- Footer --}}
        @include('layouts.footer')

        {{-- Assets después del footer --}}
        @include('layouts.footer_meta')
    </div>
</body>

</html>
