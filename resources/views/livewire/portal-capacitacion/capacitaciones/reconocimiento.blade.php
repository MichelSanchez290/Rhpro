<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Reconocimiento</title>
    <style>
        @page {
            size: A4 landscape;
            /* Horizontal */
            margin: 0;
        }

        body {
            font-family: 'Times New Roman', serif;
            text-align: center;
            position: relative;
        }

        .background {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url("{{ public_path('img/reconocimiento.png') }}") no-repeat center;
            background-size: cover;
            z-index: -1;
        }

        .contenedor {
            height: 100vh;
            width: 100vw;
            /* Anchura Carta en puntos */
            margin: 0% !important;
        }

        .name {
            position: absolute;
            top: 9cm;
            /* Mantén la posición vertical */
            left: 50%;
            /* Centra horizontalmente */
            transform: translateX(-50%);
            /* Ajusta el centrado */
            font-size: 40px;
            font-style: italic;
            /* Texto en cursiva */
            line-height: 1.5;
            /* Mejor espaciado entre líneas */
            color: #2c3e50;
            /* Color oscuro para mejor contraste */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            /* Sombra sutil */
            white-space: nowrap;
            /* Evita que el texto se divida en varias líneas */
        }

        .text-container {
            position: absolute;
            top: 12cm;
            /* Posición vertical */
            left: 50%;
            /* Centrado horizontal */
            transform: translateX(-50%);
        }

        .text {
            font-size: 23px;
            color: #053565; 
        }

        .curso {
            font-size: 24px;
            font-weight: bold;
            color: #053565;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .fecha {
            position: absolute;
            margin-top: 15cm;
            font-size: 20px;
            color: #7f8c8d;
            font-style: italic;
            left: 50%;
            /* Centra horizontalmente */
            transform: translateX(-50%);
            /* Ajusta el centrado */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            /* Sombra sutil */
            white-space: nowrap;
            /* Evita que el texto se divida en varias líneas */
        }

        .firma {
            position: absolute;
            top: 19cm; /* Posición vertical */
            left: 50%; /* Centra horizontalmente */
            transform: translateX(-50%); /* Ajusta el centrado */
            font-size: 18px;
            color: #053565;
            white-space: nowrap;
        }

        .firma span {
            display: block;
            margin-top: 10px; /* Espacio entre la línea y el texto */
            border-top: 2px solid #333; /* Grosor y color de la línea */
            padding-top: 5px; /* Espacio entre la línea y el texto */
            width: 380px; /* Ancho de la línea (ajusta este valor según necesites) */
            margin-left: auto; /* Centra la línea horizontalmente */
            margin-right: auto; /* Centra la línea horizontalmente */
        }
    </style>
</head>

<body>
    <div class="background"></div>
    <div class="contenedor">
        <div class="name">{{ $user->name }}</div>
        <div class="text-container">
            <div class="text">Se certifica que el participante ha completado el curso
                <strong class="curso">{{ $curso->nombre ?? 'N/A' }}</strong>
                con una duración de <strong>{{ $curso->horas ?? '0' }}</strong> horas.
            </div>
        </div>

        <div class="fecha">
            Realizado del {{ $fechas->fechaIni ?? 'N/A' }} al {{ $fechas->fechaFin ?? 'N/A' }}.
        </div>

        <div class="firma">
            <span>Firma del Instructor</span>
        </div>
    </div>
</body>

</html>