<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación {{ $fecha }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        
        @page {
            margin-left: 0.8cm !important;
            margin-right: 0.8cm !important;
            margin-top: 0.8cm !important;
            margin-bottom: 0.8cm !important;
        }

        html,
        body {
            margin: 0;
        }

        .contenedor {
            height: 100vh;
            width: 100vw;
            margin: 0% !important;
        }

        .full-page {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .page-break {
            page-break-before: always;
        }

        .contenedor3 {
            font-family: 'Poppins', sans-serif;
            width: 90%;
            margin: auto;
        }

        .titulo {
            color: rgb(7, 65, 107);
            font-size: 20pt;
            font-weight: bold;
            margin-bottom: 5px;
            margin-top: 1cm;
        }

        .separador {
            border-top: 4px solid rgb(7, 65, 107);
            margin-bottom: 1cm;
        }

        .info-evaluado-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 1cm;
        }

        .foto-evaluado {
            flex: 1 1 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .foto-evaluado img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 4px solid #07416B;
            object-fit: cover;
        }

        .info-columna {
            flex: 1 1 calc(50% - 30px);
            background-color: #f4f7fc;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info-columna:last-child {
            background-color: #e3f2fd;
        }

        .info-item {
            margin-bottom: 20px;
        }

        .info-label {
            font-weight: bold;
            color: #07416B;
            font-size: 22px;
            display: block;
        }

        .info-value {
            color: #333;
            font-size: 20px;
            display: block;
            margin-top: 8px;
        }

        .info-item i {
            margin-right: 10px;
            color: #07416B;
            font-size: 24px;
        }

    </style>
</head>
<body>
    <div class="contenedor">
        <img src="{{ asset('img/doc.png') }}" class="full-page" alt="portada">
        <div style="position: absolute; top: 11cm; left: 0.5cm; color: rgb(7, 65, 107); font-size: 15pt; font-family: 'Poppins', sans-serif;">
            Fecha de evaluación: {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}
        </div>
        <div style="position: absolute; top: 12cm; left: 0.5cm;">
            <div style="color: rgb(7, 65, 107); font-size: 36pt; font-family: 'Poppins', sans-serif; font-weight: 700;">
                Reporte de Evaluación
            </div>
        </div>
        <div style="position: absolute; top: 20.5cm; left: 11cm;">
            <div style="color: rgb(7, 65, 107); font-size: 18pt; font-family: 'Poppins', sans-serif; font-weight: 700;">
                Registro de Calificaciones Individual
            </div>
            <div style="color: rgb(7, 65, 107); font-size: 15pt; font-family: 'Poppins', sans-serif;">
                Privado y Confidencial
            </div>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="contenedor3">
        <h2 class="titulo">Información del Evaluado</h2>
        <div class="separador"></div>

        <div class="info-evaluado-container">
            <div class="foto-evaluado" style="flex: 1; text-align: left; padding-right: 50px;">
                <img src="https://i.ebayimg.com/images/g/d0EAAOSwZGpmYOJz/s-l400.png" alt="Foto del evaluado">
            </div>

            <div style="flex: 2; display: flex; flex-wrap: wrap; gap: 30px;">
                <div class="info-columna" style="flex: 1 1 calc(50% - 30px); padding: 30px;">
                    <div class="info-item">
                        <span class="info-label"><i class="fas fa-user"></i> Nombre del Evaluado:</span>
                        <span class="info-value">{{ $usuario->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label"><i class="fas fa-id-card"></i> Clave del Becario:</span>
                        <span class="info-value">{{ $becario->clave_becario }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label"> <i class="fas fa-file-alt"></i> RFC:</span>
                        <span class="info-value">{{ $becario->rfc }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-id-card"></i><span class="info-label">CURP:</span>
                        <span class="info-value">{{ $becario->curp }}</span>
                    </div>
                </div>

                <div class="info-columna" style="flex: 1 1 calc(50% - 30px); padding: 30px;">
                    <div class="info-item">
                        <i class="fas fa-venus-mars"></i><span class="info-label">Sexo:</span>
                        <span class="info-value">{{ $becario->sexo == 'F' ? 'Femenino' : ($becario->sexo == 'M' ? 'Masculino' : $becario->sexo) }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-phone"></i><span class="info-label">Celular:</span>
                        <span class="info-value">{{ $becario->numero_celular }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-briefcase"></i><span class="info-label">Ocupación:</span>
                        <span class="info-value">{{ $becario->ocupacion }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-suitcase"></i><span class="info-label">Puesto:</span>
                        <span class="info-value">{{ $usuario->perfilActual()?->nombre_puesto ?? 'Sin asignar' }}</span>
                    </div>
                </div>

                <div class="info-columna" style="flex: 1 1 100%; padding: 30px; background-color: #e3f2fd; border-radius: 10px;">
                    <div class="info-item">
                        <i class="fas fa-building"></i><span class="info-label">Empresa:</span>
                        <span class="info-value">{{ $usuario->empresa->nombre }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-store"></i><span class="info-label">Sucursal:</span>
                        <span class="info-value">{{ $usuario->sucursal->nombre_sucursal }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-sitemap"></i><span class="info-label">Departamento:</span>
                        <span class="info-value">{{ $becario->departamento->nombre_departamento }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="contenedor3">
        <h2 class="titulo">Evaluación</h2>
        <div class="separador"></div>
        <table class="tabla-evaluacion">
            <thead>
                <tr>
                    <th>Criterio</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluaciones as $evaluacion)
                    <tr>
                        <td>{{ $evaluacion->criterio }}</td>
                        <td>{{ $evaluacion->calificacion_desempeno }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td><strong>Calificación Final:</strong></td>
                    <td><strong>{{ number_format($evaluaciones->avg('calificacion_desempeno'), 2) }}</strong></td>
                </tr>
                @if($evaluaciones->isNotEmpty())
                    <tr>
                        <td colspan="2"><strong>Comentarios:</strong> {{ $evaluaciones->first()->comentarios }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Recomendaciones:</strong> {{ $evaluaciones->first()->recomendaciones }}</td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>
</body>
</html>
