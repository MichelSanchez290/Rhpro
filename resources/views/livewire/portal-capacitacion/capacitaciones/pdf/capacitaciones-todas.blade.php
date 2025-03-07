<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capacitaciones {{ $selectedYear }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .container { width: 100%; padding: 20px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Capacitaciones del Año {{ $selectedYear }}</h1>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Objetivo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($capacitaciones as $capacitacion)
                    <tr>
                        <td>{{ $capacitacion->nombreCapacitacion }}</td>
                        <td>{{ $capacitacion->objetivoCapacitacion }}</td>
                        <td>{{ $capacitacion->fechaIni }}</td>
                        <td>{{ $capacitacion->fechaFin }}</td>
                        <td>{{ $capacitacion->curso->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
