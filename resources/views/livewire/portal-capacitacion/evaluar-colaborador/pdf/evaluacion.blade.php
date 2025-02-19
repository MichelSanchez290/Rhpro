<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación {{ $fecha }}</title>
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
            /* Anchura Carta en puntos */
        }

        /* Contenedor que cubre toda la página */
        .contenedor {
            height: 100vh;
            width: 100vw;
            /* Anchura Carta en puntos */
            margin: 0% !important;
        }

        /* Imagen de fondo que cubre toda la página */
        .full-page {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            /* Coloca la imagen detrás del contenido */
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        /* Estilos para las páginas internas */
        .contenedor2 {
            height: 792pt;
            /* Altura Carta en puntos */
            width: 612pt;
            /* Anchura Carta en puntos */
        }

        .page-break {
            page-break-before: always;
        }

        /* Estilos generales */
        .contenedor3 {
            font-family: 'Nourd', sans-serif;
            width: 90%;
            margin: auto;
        }

        /* Título */
        .titulo {
            color: rgb(7, 65, 107);
            font-size: 20pt;
            font-weight: bold;
            margin-bottom: 5px;
            margin-top: 1cm;
        }

        /* Línea separadora */
        .separador {
            border-top: 4px solid rgb(7, 65, 107);
            margin-bottom: 1cm;
        }

                /* Asegurar que la tabla tenga bordes redondeados */
        .tabla-evaluacion {
            font-size: 13pt;
            border-collapse: separate; /* Necesario para aplicar border-radius */
            border-spacing: 0; /* Elimina espacios entre las celdas */
            width: 100%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px; /* Esquinas redondeadas */
            overflow: hidden; /* Evita que las esquinas se vean cuadradas en algunos navegadores */
        }

        /* Redondear solo las esquinas del encabezado */
        .tabla-evaluacion thead tr:first-child th:first-child {
            border-top-left-radius: 10px;
        }

        .tabla-evaluacion thead tr:first-child th:last-child {
            border-top-right-radius: 10px;
        }

        /* Redondear solo las esquinas del footer */
        .tabla-evaluacion tfoot tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
        }

        .tabla-evaluacion tfoot tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
        }

        /* Encabezado */
        .tabla-evaluacion thead tr {
            background-color: rgb(7, 65, 107);
            color: white;
            text-align: left;
        }

        /* Celdas */
        .tabla-evaluacion th, 
        .tabla-evaluacion td {
            padding: 10px;
            border: 1px solid rgb(255, 255, 255);
        }

        /* Filas alternas */
        .tabla-evaluacion tbody tr:nth-child(odd) {
            background-color: #ecf5ff;
        }

        /* Footer */
        .tabla-evaluacion tfoot {
            background-color: #d9d9da;
            font-weight: bold;
        }

        .card2 {
            padding: 20px;
            border: 2px solid #07416B;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto; 
            display: flex; justify-content: space-between;
        }

        .card {
            padding: 20px;
            border: 2px solid #07416B;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto; 
        }

        .card h2 {
            font-size: 24px;
            color: #07416B;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 18px;
            color: #333;
            margin: 5px 0;
        }
        .card .info {
            padding: 10px;
            background: #f4f7fc;
            border-radius: 5px;
        }
    </style>

</head>
<body>         
    <!-- Portada -->
    <div class="contenedor">
        <img src="{{ asset('img/doc.png') }}" class="full-page" alt="portada">
         <!--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOa-NXzx-mmUk3IdQOC7ep03bvzV1ZjoHzEw&s" alt="Logo" style="position: absolute; top: 3cm; left: 9cm; width: 150px; height: 110px;"> -->
        <div
            style="position: absolute; top: 11cm; left: 0.5cm; color: rgb(7, 65, 107); font-size: 15pt; font-family: 'Nourd', sans-serif;">
            Fecha de evaluación: {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}
        </div>
        <div style="position: absolute; top: 12cm; left: 0.5cm;">
            <div style="color: rgb(7, 65, 107); font-size: 36pt; font-family: 'Nourd', sans-serif; font-weight: 700;">
                Reporte de Evaluación
            </div>
        </div>
        <div style="position: absolute; top: 20.5cm; left: 11cm;">
            <div style="color: rgb(7, 65, 107); font-size: 18pt; font-family: 'Nourd', sans-serif; font-weight: 700;">
                Registro de Calificaciones Individual
            </div>
            <div style="color: rgb(7, 65, 107); font-size: 15pt; font-family: 'Nourd', sans-serif;">
                Privado y Confidencial
            </div>
        </div>
    </div>

    <div class="page-break"></div>

    <div style="font-family: 'Nourd', sans-serif;">
        <!-- Contenido de la segunda página -->
        <div style=" width: 100%; text-align: justify;">
            <p style="font-weight: bold; color: rgb(7, 65, 107); font-size: 20pt; margin-bottom: 5px;">Información del
                Evaluado:
            </p>
            <div style="border-top: 0.1cm solid rgb(7, 65, 107); "></div>
            <div style="position: relative; font-size: 13pt; margin-top: 1cm;">
                <div style="width: 100%;">
                    <div style="position: absolute; margin-top: 0; margin-left: 3; z-index: 1; high:55px; width:55px;">
                        <img src="https://i.ebayimg.com/images/g/d0EAAOSwZGpmYOJz/s-l400.png" 
                            style="width: 300px; height: 300px; border-radius: 50%; object-fit: cover; border: 3px solid #07416B; ">
                    </div>
                    <div style="position: absolute; z-index: 1;">
                        @if($usuario->tipo_user == 'Becario')
                            <div style="margin-left: 6cm; margin-top: 0.5cm;">
                                <p style="color: rgb(7, 65, 107); font-size: 14pt;">Nombre del evaluado:</p>
                                <p style="margin: 0;"> <b>{{ $usuario->name }}</b></p>
                                <p style="color: rgb(7, 65, 107); font-size: 14pt;">Clave del becario:</p>                        
                                <p style="margin: 0;"> <b>{{ $becario->clave_becario}}</b></p>
                            </div>
                             
                            <div style="margin-top: 0.5cm">
                                <div style="text-align: center">
                                    <h1 style="text-aling: center; font-size: 40px; color: #07416B;"><strong>------- Mas información -------</strong></h1>
                                </div>

                                <div class="card" style="width: 5cm">
                                    <div class="info">
                                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">RFC:</p>
                                        <h2><b>{{ $becario->rfc}}</b></h2>
                                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Curp:</p>
                                        <h2><b>{{ $becario->curp}}</h2></p>                                        
                                    </div>
                                </div>

                                <div class="card" style="width: 5cm">
                                    <div class="info">
                                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Sexo:</p>
                                        <h2><b>
                                            {{ $becario->sexo == 'F' ? 'Femenino' : ($becario->sexo == 'M' ? 'Masculino' : $becario->sexo) }}
                                        </b></h2>
                                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Número de celular:</p>
                                        <h2><b>{{ $becario->numero_celular}}</b></h2>
                                    </div>
                                </div>

                                <div class="card" style="width: 5cm">
                                    <div class="info">
                                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Ocupación:</p>
                                        <h2><b>{{ $becario->ocupacion}}</b></h2>
                                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Puesto:</p>
                                        <h2><b>{{ $usuario->perfilActual()?->nombre_puesto ?? 'Sin asignar' }}</b></h2>
                                    </div>
                                </div>
                                <div class="card" style="width: 8cm">
                                    <div class="info">
                                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Empresa:</p>
                                        <p><b>{{ $usuario->empresa->nombre }}</b></p>
                                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Sucursal:</p>
                                        <p><b>{{ $usuario->sucursal->nombre_sucursal}}</b></p>
                                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Departamento:</p>
                                        <p><b>{{ $becario->departamento->nombre_departamento}}</b></p>
                                    </div>
                                </div>
                            </div>
                        @endif
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
