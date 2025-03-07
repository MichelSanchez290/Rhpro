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
                <p class="text-gray-700">{{ $instructor->tipoinstructor }}</p>
                <p class="text-sm text-gray-500">{{ $instructor->municipio }}, {{ $instructor->estado }}</p>
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
                            <span class="font-bold w-44">Contacto: </span>
                            <span class="text-gray-700"> + 52 | {{ $instructor->telefono1 }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Contacto adicional: </span>
                            <span class="text-gray-700"> + 52 | {{ $instructor->telefono2 }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Registro STPS:</span>
                            <span class="text-gray-700">{{ $instructor->registroStps }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">RFC: </span>
                            <span class="text-gray-700">{{ $instructor->rfc }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Regimen: </span>
                            <span class="text-gray-700">{{ $instructor->regimen }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Estado:</span>
                            <span class="text-gray-700">{{ $instructor->estado }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Municipio:</span>
                            <span class="text-gray-700">{{ $instructor->municipio }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Código Postal:</span>
                            <span class="text-gray-700">{{ $instructor->codigopostal }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Colonia:</span>
                            <span class="text-gray-700">{{ $instructor->colonia }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Calle:</span>
                            <span class="text-gray-700">{{ $instructor->calle }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Número de calle:</span>
                            <span class="text-gray-700">{{ $instructor->numero }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Honorarios:</span>
                            <span class="text-gray-700">{{ $instructor->honorarios }} </span>
                        </li>
                        
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Status:</span>
                            <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{ $instructor->status }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">DC5:</span>
                            <span class="text-gray-700">{{ $instructor->dc5 }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Cuenta Bancaria:</span>
                            <span class="text-gray-700">{{ $instructor->cuentabancaria }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">INE:</span>
                            <span class="text-gray-700">{{ $instructor->ine }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">CURP:</span>
                            <span class="text-gray-700">{{ $instructor->curp }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">SAT:</span>
                            <span class="text-gray-700">{{ $instructor->sat }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Domicilio:</span>
                            <span class="text-gray-700">{{ $instructor->domicilio }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Tipo Instructor:</span>
                            <span class="text-gray-700">{{ $instructor->tipoinstructor }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Nombre de la empresa:</span>
                            <span class="text-gray-700">{{ $instructor->nombre_empresa }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">RFC de la empresa:</span>
                            <span class="text-gray-700">{{ $instructor->rfc_empre }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Calle de la empresa:</span>
                            <span class="text-gray-700">{{ $instructor->calle_empre }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">No. Calle de la empresa:</span>
                            <span class="text-gray-700">{{ $instructor->numero_empre }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Colonia de la empresa:</span>
                            <span class="text-gray-700">{{ $instructor->colonia_empre }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Municipio de la empresa:</span>
                            <span class="text-gray-700">{{ $instructor->municipio_empre }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Estado de la empresa:</span>
                            <span class="text-gray-700">{{ $instructor->estado_empre }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Código Postal de la empresa:</span>
                            <span class="text-gray-700">{{ $instructor->postal_empre }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Regimen de la empresa:</span>
                            <span class="text-gray-700">{{ $instructor->regimen_empre }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Puesto:</span>
                            <span class="text-gray-700">{{ $puesto->nombre_puesto ?? 'Sin Sucursal' }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Departamento:</span>
                            <span class="text-gray-700">{{ $departamento->nombre_departamento ?? 'Sin Departamento' }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-44">Registro Patronal:</span>
                            <span class="text-gray-700">{{ $registro_patronal->registro_patronal ?? 'Sin Departamento' }}</span>
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