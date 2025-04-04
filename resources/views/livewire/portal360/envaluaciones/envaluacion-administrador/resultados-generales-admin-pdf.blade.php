<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte General de Resultados</title>
    <style>
        @page { margin: 50px; }
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
        .container {
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 20px;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin: 2px 0;
        }
        .section-title {
            color: #333;
            font-size: 16px;
            text-align: center;
            margin: 20px 0 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f5f5f5;
            color: #333;
        }
        .promedio {
            font-weight: bold;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>REPORTE GENERAL DE RESULTADOS EVALUACIÓN 360 GRADOS</h1>
        <p class="subtitle">{{ $encuestaNombre }}</p> <!-- Ya está incluido -->
        <p class="subtitle">{{ $calificadoNombre }}</p>
        <p class="subtitle">{{ $empresaNombre }}</p>
        <p class="subtitle">{{ $sucursalNombre }}</p>

        <h2 class="section-title">Clasificación de Evaluaciones 360° por Niveles</h2>
        <table>
            <thead>
                <tr>
                    <th>Rango</th>
                    <th>Resultado</th>
                    <th>Color</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0-1</td>
                    <td>Bajo</td>
                    <td style="color: red">Rojo</td>
                </tr>
                <tr>
                    <td>1-2</td>
                    <td>Regular</td>
                    <td style="color: orange">Anaranjado</td>
                </tr>
                <tr>
                    <td>2-3</td>
                    <td>Bueno</td>
                    <td style="color: #d4a017">Amarillo</td>
                </tr>
                <tr>
                    <td>3-4</td>
                    <td>Sobresaliente</td>
                    <td style="color: green">Verde</td>
                </tr>
            </tbody>
        </table>

        @forelse($resultados as $pregunta => $resultadosPregunta)
            <h2 class="section-title">{{ $pregunta }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre del colaborador</th>
                        <th>Departamento</th>
                        <th>Resultados</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultadosPregunta as $resultado)
                    <tr @if($resultado['nombre'] === 'Promedio final') class="promedio" @endif>
                        <td>{{ $resultado['nombre'] }}</td>
                        <td>{{ $resultado['departamento'] }}</td>
                        <td>{{ $resultado['resultado'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @empty
            <p style="text-align: center; color: #666">No hay respuestas disponibles para este usuario.</p>
        @endforelse
    </div>
</body>
</html>