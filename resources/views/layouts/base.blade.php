<!DOCTYPE html >
<html class="wide wow-animation" lang="es">

{{-- Assets y metaetiquetas de cabecera --}}
@include('layouts.head')

<body id="app-layout" style="height: 100vh;">
    <div class="page">
        {{-- Barra de navegación --}}
        @include('layouts.navbar')

        {{-- Mensajes flash --}}
        {{-- @include('flash.todos') --}}

        {{-- Contenido de la página --}}
        @yield('content')

        {{-- Footer --}}
        @include('layouts.footer')

        {{-- Assets después del footer --}}
        @include('layouts.footer_meta')
    </div>
</body>
</html>
