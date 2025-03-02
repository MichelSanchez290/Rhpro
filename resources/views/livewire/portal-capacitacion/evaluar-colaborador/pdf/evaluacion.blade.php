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


        fieldset {
            padding: 1em;
            border-color: rgb(7, 65, 107);
            border-style: solid;
            border-width: 2px;
            background: #fff;
        }

        legend {
            color: rgb(7, 65, 107);
            padding: 0.3em 0.6em;
            border: 1px solid rgb(7, 65, 107);
            background: #fff;
            font-size: 1.3em;
        }

        legend.radio {
            border-radius: 50px;
        }

        th,
        td {
            border: 1px solid rgb(7, 65, 107);
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: rgb(7, 65, 107);
        }



        /* Enfasis en las celdas */
        td:nth-child(5n+1),
        th:nth-child(5n+1) {
            background-color: rgb(7, 65, 107);
        }

        /* Estilo adicional */

        .container1 {
            background-color: #8cc2db;
            padding: 1em 1em 1em;
            box-sizing: border-box;
            opacity: 0.7;
        }

        .container1 ul {
            margin-top: 0;
            padding-left: 0em;
        }

        .container1 ul li {
            list-style-type: none;
        }

        .container1 ul+ul {
            margin-bottom: 0;
        }

        .container1 ul+ul>li+li label {
            margin-bottom: 0;
        }

        .page-break {
            page-break-before: always;
        }
        
    </style>

</head>
<body>         
    <!-- Portada -->
    <div class="contenedor">
        <img src="{{ asset('img/borde.png') }}" class="full-page" alt="portada">
        <!--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOa-NXzx-mmUk3IdQOC7ep03bvzV1ZjoHzEw&s" alt="Logo" style="position: absolute; top: 3cm; left: 9cm; width: 150px; height: 120px;">-->
        <div
            style="position: absolute; top: 9cm; left: 1cm; color: rgb(7, 65, 107); font-size: 15pt; font-family: 'Nourd', sans-serif;">
            {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}
        </div>
        <div style="position: absolute; top: 10cm; left: 1cm;">
            <div style="color: rgb(7, 65, 107); font-size: 36pt; font-family: 'Nourd', sans-serif; font-weight: 700;">
                Reporte de Evaluación
            </div>
            <br>
            <div style="border-top: 0.3cm solid rgb(7, 65, 107); width: 70%;"></div>
        </div>
        <div style="position: absolute; top: 16cm; left: 11cm;">
            <div style="color: rgb(7, 65, 107); font-size: 18pt; font-family: 'Nourd', sans-serif; font-weight: 700;">
               Análisis de desempeño y
            </div>
            <div style="color: rgb(7, 65, 107); font-size: 18pt; font-family: 'Nourd', sans-serif; font-weight: 700;">
                evaluación de criterios
             </div>
             <br>
            <div style="border-top: 0.1cm solid rgb(7, 65, 107); width: 70%;"></div>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="contenedor2" style="font-family: 'Nourd', sans-serif;">
        <!-- Contenido de la segunda página -->
        <div style=" width: 90%;text-align: justify;">
            <p style="font-weight: bold; color: rgb(7, 65, 107); font-size: 20pt; margin-bottom: 5px;">Información del
                Evaluado:
            </p>
            <div style="border-top: 0.1cm solid rgb(7, 65, 107); "></div>
            <div style="position: relative; font-size: 13pt; margin-top: 1cm;">
                <div style="width: 60%;">
                    <div style="position: absolute; top: 50px; left: 65%; z-index: 1;">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($usuario->name ?? 'Usuario') }}&background=random" 
                            alt="Foto de {{ $usuario->name ?? 'Usuario' }}" style="max-width: 100%; height: auto;">
                    </div>
                    <div style="position: relative; z-index: 0;">
                        @if ($usuario->tipo_user == 'Trabajador')
                        
                        <p style="margin: 0;"> <b>{{ $trabajador->clave_trabajador}}</b></p>
                            
                        @elseif ($usuario->tipo_user == 'Becario')
                        
                        <p style="margin: 0;"> <b>{{ $becario->clave_becario }}</b></p>

                        @elseif ($usuario->tipo_user == 'Practicante')  
                        <p style="margin: 0;"> <b>{{ $practicante->clave_practicante}}</b></p>
                        
                        @elseif ($usuario->tipo_user == 'Instructor')
                        <p style="margin: 0;"> <b>{{ $instructor->rfc }}</b></p>

                        @endif
                        <p style="color: rgb(7, 65, 107); font-size: 14pt; margin: 0;">Nombre del evaluado:</p>
                        <p style="margin: 0;"> <b>{{ $usuario->name }}</b></p>
                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Clave del trabajador:</p>
                        <p><b></b></p>
                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Curp:</p>
                        <p><b></b>{{ $usuario->curp }}</p>
                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">RFC:</p>
                        <p><b></b></p>
                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Número de celular:</p>
                        <p><b></b></p>
                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Ocupación:</p>
                        <p><b></b></p>
                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Puesto:</p>
                        <p><b>{{ $usuario->perfilActual()?->nombre_puesto ?? 'Sin asignar' }}</b></p>
                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Número de celular:</p>
                        <p><b></b></p>
                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Sexo:</p>
                        <p><b></b></p>
                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Sucursal:</p>
                        <p><b></b></p>
                        <p style="color: rgb(7, 65, 107); font-size: 14pt;">Departamento:</p>
                        <p><b></b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>
