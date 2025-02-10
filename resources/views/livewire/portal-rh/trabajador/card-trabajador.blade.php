<!-- component -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
</head>
<body>
    <div class="h-full bg-gray-200 p-8">
        <div class="bg-white rounded-lg shadow-xl pb-8">
            
            <div class="w-full h-[250px]">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" class="w-full h-full rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center -mt-20">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile.jpg" class="w-40 border-4 border-white rounded-full">
                <div class="flex items-center space-x-2 mt-2">

                    <p class="text-2xl">{{ $usuario->name ?? 'Sin Nombre' }}</p>
                    <span class="bg-blue-500 rounded-full p-1" title="Verified">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </span>

                </div>
                <p class="text-gray-700">{{ $trabajador->tipo_puest }}</p>
                <p class="text-sm text-gray-500">{{ $trabajador->lugar_nacimiento }}, {{ $trabajador->estado }}</p>
            </div>

            <!-- Botones 
            <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
                <div class="flex items-center space-x-4 mt-2">
                    <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                        </svg>
                        <span>Connect</span>
                    </button>
                    <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Message</span>
                    </button>
                </div>
            </div> 
            -->

        </div>

        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <div class="w-full flex flex-col 2xl:w-1/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Información Personal</h4>
                    <ul class="mt-2 text-gray-700">
                        <li class="flex border-y py-2">
                            <span class="font-bold w-44">Nombre: </span>
                            <span class="text-gray-700">{{ $usuario->name ?? 'Sin Nombre' }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Calve de Trabajador: </span>
                            <span class="text-gray-700">{{ $trabajador->clave_trabajador }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">NSS: </span>
                            <span class="text-gray-700">{{ $trabajador->numero_seguridad_social }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Fecha de nacimiento:</span>
                            <span class="text-gray-700">{{ $trabajador->fecha_nacimiento }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Lugar de nacimiento: </span>
                            <span class="text-gray-700">{{ $trabajador->lugar_nacimiento }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Estado: </span>
                            <span class="text-gray-700">{{ $trabajador->estado }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Código Postal:</span>
                            <span class="text-gray-700">{{ $trabajador->codigo_postal }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Sexo:</span>
                            <span class="text-gray-700">{{ $trabajador->sexo }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">CURP:</span>
                            <span class="text-gray-700">{{ $trabajador->curp }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">RFC:</span>
                            <span class="text-gray-700">{{ $trabajador->rfc }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Número de celular:</span>
                            <span class="text-gray-700"> +52 | {{ $trabajador->numero_celular }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Fecha de ingreso:</span>
                            <span class="text-gray-700">{{ $trabajador->fecha_ingreso }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Edad:</span>
                            <span class="text-gray-700">{{ $trabajador->edad }} años</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Estado Civil:</span>
                            <span class="text-gray-700">{{ $trabajador->estado_civil }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Nivel de estudios:</span>
                            <span class="text-gray-700">{{ $trabajador->estudios }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Ocupación:</span>
                            <span class="text-gray-700">{{ $trabajador->ocupacion }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Tipo de puesto:</span>
                            <span class="text-gray-700">{{ $trabajador->tipo_puest }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Contratacion:</span>
                            <span class="text-gray-700">{{ $trabajador->contratacion }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Tipo de personal:</span>
                            <span class="text-gray-700">{{ $trabajador->tipo_personal }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Contratacion:</span>
                            <span class="text-gray-700">{{ $trabajador->contratacion }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Jornada de trabajo:</span>
                            <span class="text-gray-700">{{ $trabajador->jornada_trabajo }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Rotación de turno:</span>
                            <span class="text-gray-700">{{ $trabajador->rotacion }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Experiencia:</span>
                            <span class="text-gray-700">{{ $trabajador->experiencia }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Tiempo en el puesto:</span>
                            <span class="text-gray-700">{{ $trabajador->tiempo_puesto }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Calle:</span>
                            <span class="text-gray-700">{{ $trabajador->calle }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Número:</span>
                            <span class="text-gray-700">{{ $trabajador->numero }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Colonia:</span>
                            <span class="text-gray-700">{{ $trabajador->colonia }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Status:</span>
                            <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{ $trabajador->status }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Puesto:</span>
                            <span class="text-gray-700">{{ $puesto->nombre_puesto ?? 'Sin Sucursal' }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Departamento:</span>
                            <span class="text-gray-700">{{ $departamento->nombre_departamento ?? 'Sin Departamento' }}</span>
                        </li>
                    </ul>


                    <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>
                        <button type="button" onclick="window.history.back()"
                            class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                            Volver
                        </button>
                    </div>
                    
                </div>
            </div> 
        </div>
    </div>
</body>
</html>