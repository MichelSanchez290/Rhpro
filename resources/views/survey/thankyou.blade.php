<!-- resources/views/survey/thankyou.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por responder</title>
</head>
<body>
    <h1>¡Gracias por responder la encuesta!</h1>
    @if(session('requiereAtencion'))
        <p>Tu encuesta ha sido revisada y requiere atención adicional.</p>
    @else
        <p>Tu encuesta ha sido completada con éxito.</p>
    @endif
</body>
</html>