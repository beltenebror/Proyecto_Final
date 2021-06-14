<!DOCTYPE html>
<html lang="es">

<head>
    <title>Nuevo viaje</title>
</head>

<body>
    <h1>Tienes una nueva solicitud de servicio</h1>
    <h2>Información:</h2>
    <hr>

    @if ($servicio->tipo == 0)
        <p><strong>Tipo: </strong>Viaje por kilometros</p>
        <p><strong>Localidad: </strong>{{$servicio->municipioInicio->municipio}}</p>
        <p><strong>Dirección: </strong>{{$servicio->direccion_inicio_exacta}}</p>
        <p><strong>Fecha: </strong>{{$servicio->fecha_contratada}}</p>
        <p><strong>Hora: </strong>{{ date('H:i', strtotime($servicio->hora_contratada) ) }}</p>
        <p><strong>Kilometros: </strong>{{ $servicio->kilometraje }} km</p>

    @else
        <p><strong>Tipo: </strong>Alquiler por horas</p>
        <p><strong>Localidad: </strong>{{$servicio->municipioInicio->municipio}}</p>
        <p><strong>Dirección: </strong>{{$servicio->direccion_inicio_exacta}}</p>
        <p><strong>Fecha: </strong>{{ $servicio->fecha_contratada }}</p>
        <p><strong>Hora: </strong>{{ date('H:i', strtotime($servicio->hora_contratada)) }}</p>
        <p><strong>Tiempo: </strong>{{ $servicio->horas_alquiler }} Horas</p>

    @endif
    <p><strong>Remuneración: </strong>{{ number_format($servicio->precio, 2, ',', '.') }} €</p>
    

</body>

</html>
