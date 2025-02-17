<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Evaluaciones</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background: #f4f4f4;
        }

        .portada, .seccion {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            position: relative;
            background: white;
            padding: 40px;
        }

        .portada {
            background: linear-gradient(to right, #4A90E2, #2C3E50);
            color: white;
        }

        .portada img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .titulo {
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }

        .subtitulo {
            font-size: 18px;
            margin-top: 10px;
            opacity: 0.9;
            color: #333;
        }

        .container {
            max-width: 800px;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #2C3E50;
            color: white;
        }

        tfoot td {
            background: #f8f9fa;
            font-weight: bold;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>

    <!-- Portada -->
    <div class="portada">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOa-NXzx-mmUk3IdQOC7ep03bvzV1ZjoHzEw&s" alt="Logo" style="width: 30px; height: 35px;">
        <h1 class="titulo">Historial de Evaluaciones</h1>
        <p class="subtitulo">Análisis de desempeño y evaluación de criterios</p>
        <p class="subtitulo">Fecha de Generación: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
    </div>

    <div class="page-break"></div>

    <!-- Datos del Usuario -->
    <div class="seccion">
        <div class="container">
            <h2>Datos del Evaluado</h2>
            <img src="https://ui-avatars.com/api/?name={{ urlencode($usuario->name ?? 'Usuario') }}&background=random" 
                    alt="Foto de {{ $usuario->name ?? 'Usuario' }}"> 
            <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
            <p><strong>Puesto:</strong> {{ $usuario->perfilActual()?->nombre_puesto ?? 'Sin asignar' }}</p>
        </div>
    </div>

    <div class="page-break"></div>

    <!-- Historial de Evaluaciones -->
    @foreach ($evaluaciones as $fecha => $evals)
        <div class="seccion">
            <div>
                <h2>Fecha de Evaluación: {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Criterio</th>
                            <th>Calificación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evals as $evaluacion)
                            <tr>
                                <td>{{ $evaluacion->criterio }}</td>
                                <td>{{ $evaluacion->calificacion_desempeno }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Calificación Final:</strong></td>
                            <td><strong>{{ number_format($evals->avg('calificacion_desempeno'), 2) }}</strong></td>
                        </tr>
                        @php
                            $comentarioFinal = $evals->first()->comentarios ?? 'N/A';
                            $recomendacionFinal = $evals->first()->recomendaciones ?? 'N/A';
                        @endphp
                        <tr>
                            <td colspan="2"><strong>Comentarios:</strong> {{ $comentarioFinal }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Recomendaciones:</strong> {{ $recomendacionFinal }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endforeach

</body>
</html>
