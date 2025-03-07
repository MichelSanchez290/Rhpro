<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Estadístico</title>
    <style>
        /* Estilos CSS */
    </style>
</head>
<body>
    <!-- Portada -->
    <div class="portada">
        <img src="{{ asset('ruta/al/logo_del_software.png') }}" alt="Logo del Software" style="width: 100px;">
        <img src="{{ asset('ruta/al/logo_de_la_empresa.png') }}" alt="Logo de la Empresa" style="width: 150px;">
        <h1>Reporte de la Norma 035</h1>
        <p class="confidencial">Privado y confidencial</p>
        <div class="fondo-azul">
            <p>CESRH CONSULTORIA Y COACHING</p>
            <p>Reporte General</p>
            <p>Periodo de aplicación: {{ $encuesta->FechaInicio }} al {{ $encuesta->FechaFinal }}</p>
        </div>
    </div>
    <div class="paginacion">Página 1</div>

    <!-- Página 1: Introducción -->
    <div style="page-break-before: always;">
        <h2 style="color: blue;">Introducción</h2>
        <p><strong>Objetivo:</strong> Inserte texto</p>
        <p><strong>Método de evaluación:</strong> Inserte texto</p>
        <p><strong>Aplicador:</strong> Inserte texto</p>
        <p><strong>Principal Actividad del centro de trabajo:</strong> Inserte texto</p>
    </div>
    <div class="paginacion">Página 2</div>

    <!-- Página 2: Datos de los participantes -->
    <div style="page-break-before: always;">
        <h2 style="color: blue;">Datos de los participantes</h2>
        <p>Conoce el índice de participación de tu encuesta y el perfil de los participantes.</p>
        <h3>Índice de Participación</h3>
        <p style="color: blue;">De {{ $encuesta->NumeroEncuestas }} trabajadores</p>
        <div class="grafica">
            @if(isset($graficas['participacion']))
                <img src="{{ $graficas['participacion'] }}" alt="Gráfica de Participación">
            @else
                <p>No se pudo generar la gráfica de participación.</p>
            @endif
        </div>
        <p style="color: blue;">Periodo de aplicación: {{ $encuesta->FechaInicio }} al {{ $encuesta->FechaFinal }}</p>
        <p>Días totales: {{ $encuesta->diasTotales }}</p>
    </div>
    <div class="paginacion">Página 3</div>

    <!-- Otras páginas con gráficas... -->
</body>
</html>
