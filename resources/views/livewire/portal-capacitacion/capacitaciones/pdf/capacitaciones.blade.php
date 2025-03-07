<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capacitación {{ $capacitacion->fechaIni}}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        @page {
            margin-left: 0.8cm !important;
            margin-right: 0.8cm !important;
            margin-top: 0.8cm !important;
            margin-bottom: 0.8cm !important;
        }

        .contenedor {
            height: 100vh;
            width: 100vw;
            /* Anchura Carta en puntos */
            margin: 0% !important;
        }

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


    </style>
</head>
<body>
    <div class="contenedor">
        <img src="{{ asset('img/doc.png') }}" class="full-page" alt="portada">
         <!--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOa-NXzx-mmUk3IdQOC7ep03bvzV1ZjoHzEw&s" alt="Logo" style="position: absolute; top: 3cm; left: 9cm; width: 150px; height: 110px;"> -->
        <div
            style="position: absolute; top: 11cm; left: 0.5cm; color: rgb(7, 65, 107); font-size: 15pt; font-family: 'Nourd', sans-serif;">
            Fecha de Capacitación: {{ \Carbon\Carbon::parse($capacitacion->fechaIni )->format('d/m/Y') }}
        </div>
        <div style="position: absolute; top: 12cm; left: 0.5cm;">
            <div style="color: rgb(7, 65, 107); font-size: 36pt; font-family: 'Nourd', sans-serif; font-weight: 700;">
                Reporte de Capacitación
            </div>
        </div>
        <div style="position: absolute; top: 20.5cm; left: 11cm;">
            <div style="color: rgb(7, 65, 107); font-size: 18pt; font-family: 'Nourd', sans-serif; font-weight: 700;">
                Mejora tus habilidades con
            </div>
            <div style="color: rgb(7, 65, 107); font-size: 15pt; font-family: 'Nourd', sans-serif;">
                Cada curso
            </div>
        </div>
    </div>

    <div class="page-break"></div>

    <div style="font-family: 'Arial', sans-serif; margin: 0; padding: 20px; background-color: #ffffff;">
        <h2 class="titulo">Información del Evaluado</h2>
        <div class="separador"></div>

        <div>
            @if($usuario->tipo_user == 'Becario')
                <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background: url('{{ asset('img/fondo.jpg') }}') no-repeat center center/cover;">
                    <!-- Tarjeta contenedora -->
                    <div style="display: flex; justify-content: center; align-items: center; height: 90vh; width: 80%; margin-left: 10%; background-color: rgb(255, 255, 255) border-radius: 15px; border: 2px">
                        
                        <!-- Imagen de usuario flotante arriba -->
                        <div style="justify-items: center; justify-content: center; margin-left: 40%">
                            <img src="https://www.shutterstock.com/image-photo/attractive-elegant-young-asian-business-260nw-2401137563.jpg" class="imagenPerfil"
                                alt="Foto" style="width: 200px; height: 200px; border-radius: 50%; border: 5px solid white; box-shadow: 0px 4px 8px rgba(0,0,0,0.2);">
                        </div>
                        
                        <!-- Información principal -->
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                            <tr>
                                <td style="padding: 10px; text-align: left; text-align: center; ">
                                    <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Nombre:</p>
                                    <p style="font-size: 14pt; color: #333;">{{ $usuario->name }}</p>
                                    <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Clave Becario:</p>
                                    <p style="font-size: 14pt; color: #333;">{{ $becario->clave_becario }}</p>
                                </td>
                            </tr>
                        </table>
                
                        <!-- Tarjeta de información adicional -->
                        <div style="padding: 8px; border-radius: 10px; text-align: center; background: #e3efff; margin-top: 15px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">RFC:</p>
                                        <p style="color: #333;">{{ $becario->rfc }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">CURP:</p>
                                        <p style="color: #333;">{{ $becario->curp }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Teléfono:</p>
                                        <p style="color: #333;">{{ $becario->numero_celular }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Sexo:</p>
                                        <p style="color: #333;">
                                            {{ $becario->sexo == 'F' ? 'Femenino' : ($becario->sexo == 'M' ? 'Masculino' : $becario->sexo) }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Ocupación:</p>
                                        <p style="color: #333;">{{ $becario->ocupacion }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Puesto:</p>
                                        <p style="color: #333;">
                                            {{ $usuario->puesto->nombre_puesto }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                
                        <!-- Tarjeta de empresa -->
                        <div style="padding: 8px; border-radius: 10px; text-align: center;">
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Empresa:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->empresa->nombre }}</p>
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Sucursal:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->sucursal->nombre_sucursal }}</p>
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Departamento:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->departamento->nombre_departamento }}</p>
                        </div>
                    </div>
                </div>

            @elseif($usuario->tipo_user == 'Trabajador')
                <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background: url('{{ asset('img/fondo.jpg') }}') no-repeat center center/cover;">
                    <!-- Tarjeta contenedora -->
                    <div style="display: flex; justify-content: center; align-items: center; height: 90vh; width: 80%; margin-left: 10%; background-color: rgb(255, 255, 255) border-radius: 15px; border: 2px">
                        
                        <!-- Imagen de usuario flotante arriba -->
                        <div style="justify-items: center; justify-content: center; margin-left: 40%">
                            <img src="https://i.pinimg.com/474x/33/b1/fc/33b1fc52945e5d3c5e22c003c2fe2a03.jpg" class="imagenPerfil"
                                alt="Foto" style="width: 200px; height: 200px; border-radius: 50%; border: 5px solid white; box-shadow: 0px 4px 8px rgba(0,0,0,0.2);">
                        </div>
                        
                        <!-- Información principal -->
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                            <tr>
                                <td style="padding: 10px; text-align: left; text-align: center; ">
                                    <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Nombre:</p>
                                    <p style="font-size: 14pt; color: #333;">{{ $usuario->name }}</p>
                                    <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Clave Trabajador:</p>
                                    <p style="font-size: 14pt; color: #333;">{{ $trabajador->clave_trabajador }}</p>
                                </td>
                            </tr>
                        </table>
                
                        <!-- Tarjeta de información adicional -->
                        <div style="padding: 8px; border-radius: 10px; text-align: center; background: #e3efff; margin-top: 15px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">RFC:</p>
                                        <p style="color: #333;">{{ $trabajador->rfc }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">CURP:</p>
                                        <p style="color: #333;">{{ $trabajador->curp }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Teléfono:</p>
                                        <p style="color: #333;">{{ $trabajador->numero_celular }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Sexo:</p>
                                        <p style="color: #333;">
                                            {{ $trabajador->sexo == 'F' ? 'Femenino' : ($trabajador->sexo == 'M' ? 'Masculino' : $trabajador->sexo) }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Ocupación:</p>
                                        <p style="color: #333;">{{ $trabajador->ocupacion }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Puesto:</p>
                                        <p style="color: #333;">
                                            {{ $usuario->puesto->nombre_puesto }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                
                        <!-- Tarjeta de empresa -->
                        <div style="padding: 8px; border-radius: 10px; text-align: center;">
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Empresa:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->empresa->nombre }}</p>
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Sucursal:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->sucursal->nombre_sucursal }}</p>
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Departamento:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->departamento->nombre_departamento }}</p>
                        </div>
                    </div>
                </div>
            
            @elseif($usuario->tipo_user == 'Practicante')
                <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background: url('{{ asset('img/fondo.jpg') }}') no-repeat center center/cover;">
                    <!-- Tarjeta contenedora -->
                    <div style="display: flex; justify-content: center; align-items: center; height: 90vh; width: 80%; margin-left: 10%; background-color: rgb(255, 255, 255) border-radius: 15px; border: 2px">
                        
                        <!-- Imagen de usuario flotante arriba -->
                        <div style="justify-items: center; justify-content: center; margin-left: 40%">
                            <img src="https://www.shutterstock.com/image-photo/attractive-elegant-young-asian-business-260nw-2401137563.jpg" class="imagenPerfil"
                                alt="Foto" style="width: 200px; height: 200px; border-radius: 50%; border: 5px solid white; box-shadow: 0px 4px 8px rgba(0,0,0,0.2);">
                        </div>
                        
                        <!-- Información principal -->
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                            <tr>
                                <td style="padding: 10px; text-align: left; text-align: center; ">
                                    <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Nombre:</p>
                                    <p style="font-size: 14pt; color: #333;">{{ $usuario->name }}</p>
                                    <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Clave Practicante:</p>
                                    <p style="font-size: 14pt; color: #333;">{{ $practicante->clave_practicante }}</p>
                                </td>
                            </tr>
                        </table>
                
                        <!-- Tarjeta de información adicional -->
                        <div style="padding: 8px; border-radius: 10px; text-align: center; background: #e3efff; margin-top: 15px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">RFC:</p>
                                        <p style="color: #333;">{{ $practicante->rfc }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">CURP:</p>
                                        <p style="color: #333;">{{ $practicante->curp }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Teléfono:</p>
                                        <p style="color: #333;">{{ $practicante->numero_celular }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Sexo:</p>
                                        <p style="color: #333;">
                                            {{ $practicante->sexo == 'F' ? 'Femenino' : ($practicante->sexo == 'M' ? 'Masculino' : $practicante->sexo) }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Ocupación:</p>
                                        <p style="color: #333;">{{ $practicante->ocupacion }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Puesto:</p>
                                        <p style="color: #333;">
                                            No se
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                
                        <!-- Tarjeta de empresa -->
                        <div style="padding: 8px; border-radius: 10px; text-align: center;">
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Empresa:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->empresa->nombre }}</p>
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Sucursal:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->sucursal->nombre_sucursal }}</p>
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Departamento:</p>
                            <p style="font-size: 13pt; color: #333;">no se</p>
                        </div>
                    </div>
                </div>

            @elseif($usuario->tipo_user == 'Instructor')
                <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background: url('{{ asset('img/fondo.jpg') }}') no-repeat center center/cover;">
                    <!-- Tarjeta contenedora -->
                    <div style="display: flex; justify-content: center; align-items: center; height: 90vh; width: 80%; margin-left: 10%; background-color: rgb(255, 255, 255) border-radius: 15px; border: 2px">
                        
                        <!-- Imagen de usuario flotante arriba -->
                        <div style="justify-items: center; justify-content: center; margin-left: 40%">
                            <img src="https://www.shutterstock.com/image-photo/attractive-elegant-young-asian-business-260nw-2401137563.jpg" class="imagenPerfil"
                                alt="Foto" style="width: 200px; height: 200px; border-radius: 50%; border: 5px solid white; box-shadow: 0px 4px 8px rgba(0,0,0,0.2);">
                        </div>
                        
                        <!-- Información principal -->
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                            <tr>
                                <td style="padding: 10px; text-align: left; text-align: center; ">
                                    <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Nombre:</p>
                                    <p style="font-size: 14pt; color: #333;">{{ $usuario->name }}</p>
                                    <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Clave Instructor:</p>
                                    <p style="font-size: 14pt; color: #333;">{{ $instructor->clave_instructor }}</p>
                                </td>
                            </tr>
                        </table>
                
                        <!-- Tarjeta de información adicional -->
                        <div style="padding: 8px; border-radius: 10px; text-align: center; background: #e3efff; margin-top: 15px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">RFC:</p>
                                        <p style="color: #333;">{{ $instructor->rfc }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">CURP:</p>
                                        <p style="color: #333;">{{ $instructor->curp }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Teléfono:</p>
                                        <p style="color: #333;">{{ $instructor->numero_celular }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Sexo:</p>
                                        <p style="color: #333;">
                                            {{ $instructor->sexo == 'F' ? 'Femenino' : ($instructor->sexo == 'M' ? 'Masculino' : $instructor->sexo) }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Ocupación:</p>
                                        <p style="color: #333;">{{ $instructor->ocupacion }}</p>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <p style="font-size: 12pt; font-weight: bold; color: #07416B;">Puesto:</p>
                                        <p style="color: #333;">
                                            {{ $usuario->puesto->nombre_puesto }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                
                        <!-- Tarjeta de empresa -->
                        <div style="padding: 8px; border-radius: 10px; text-align: center;">
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Empresa:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->empresa->nombre }}</p>
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Sucursal:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->sucursal->nombre_sucursal }}</p>
                            <p style="font-size: 14pt; font-weight: bold; color: #07416B;">Departamento:</p>
                            <p style="font-size: 13pt; color: #333;">{{ $usuario->departamento->nombre_departamento }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>   

    <div class="contenedor1">
        <h1>Reporte de Capacitación</h1>
        <p><strong>Nombre:</strong> {{ $capacitacion->nombreCapacitacion }}</p>
        <p><strong>Objetivo:</strong> {{ $capacitacion->objetivoCapacitacion }}</p>
        <p><strong>Fecha de Inicio:</strong> {{ $capacitacion->fechaIni }}</p>
        <p><strong>Fecha de Fin:</strong> {{ $capacitacion->fechaFin }}</p>
        <p><strong>Curso:</strong> {{ $capacitacion->curso->nombre }}</p>
    </div>
</body>
</html>
