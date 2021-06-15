<!DOCTYPE html>
<html lang="es">
<head>
    <title>El cliente confirmó que el viaje se realizó</title>
</head>
<body>
    <p>Para terminar confirme usted también el viaje en el siguiente enlace:</p>
    <p>{{route('confirmar-viaje', ['servicioId' => $servicioId])}}</p>
</body>
</html>