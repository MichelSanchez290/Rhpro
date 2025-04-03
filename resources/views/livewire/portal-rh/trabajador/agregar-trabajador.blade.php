<div class="flex min-h-screen items-center justify-center py-3">

    <div class="grid bg-white rounded-lg shadow-xl w-full">
        <div class="flex justify-center py-4">
            <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="30" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="flex">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Agregar Trabajador</h1>
            </div>
        </div>

        <div class="relative mb-4">
            <div class="flex items-center justify-between">
                @if (session()->has('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => {
                        show = false;
                        window.location.href = '{{ route('mostrartrabajador') }}'
                    }, 3000)" x-show="show"
                        class="fixed top-4 left-4 max-w-xs w-full bg-green-500 text-white shadow-lg rounded-lg p-4 flex items-center space-x-3 transition-transform transform hover:scale-105 z-50">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                        </svg>
                        <div class="flex-1">
                            <p class="font-bold">{{ session('message') }}</p>
                            @if (session('message') == 'Trabajador Agregado.')
                                <p class="text-sm">El trabajador ha sido agregado correctamente</p>
                            @endif
                        </div>
                        <button @click="show = false" class="text-white hover:text-gray-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endif
    
            </div>
        </div>

        <div class="mt-5 mx-7">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="nombre"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre
                    </label>
                    <input wire:model.defer="nombre" type="text" id="nombre"
                        placeholder="Nombre"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"/>

                    <x-input-error for="nombre" /> 
                    
                </div>
                <div class="grid grid-cols-1 mt-5">
                    <label for="apellido_p"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido Paterno
                    </label>
                    <input wire:model.defer="apellido_p" type="text" id="apellido_p"
                        placeholder="Apellido paterno"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"/>

                    <x-input-error for="apellido_p" /> 
                    
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="apellido_m"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido Materno
                    </label>
                    <input wire:model.defer="apellido_m" type="text" id="apellido_m"
                        placeholder="Apellido materno"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"/>

                    <x-input-error for="apellido_m" /> 
                    
                </div>

                <div class="grid grid-cols-1 mt-5">
                    <label for="email"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Correo
                    </label>
                    <input wire:model.defer="user.email" type="email" id="email"
                        placeholder="Correo"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"/>

                    <x-input-error for="user.email" /> 
                    
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <!--  -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="password"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Password
                    </label>
                    <input wire:model.defer="password" type="password" id="password"
                        placeholder="Password"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"/>

                    <x-input-error for="password" /> 
                    
                </div>

                <!-- Clave -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="clave_trabajador"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clave
                        Trabajador</label>
                    <input wire:model.defer="trabajador.clave_trabajador" type="text" id="clave_trabajador"
                        placeholder="Clave del trabajador"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                
                    <x-input-error for="trabajador.clave_trabajador" />
                </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                
                <div class="grid grid-cols-1 mt-5">
                    <label for="empresa"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Empresa</label>
                    <select wire:model.live="empresa" id="empresa"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value=""> --- Seleccione una empresa --- </option>
                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>

                    <x-input-error for="empresa" />
                </div>

                <div class="grid grid-cols-1 mt-5">
                    <label for="sucursal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Sucursal</label>
                    <select wire:model.live="sucursal" id="sucursal"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value=""> --- Seleccione una sucursal --- </option>
                        @forelse ($sucursales as $sucursal)

                            @foreach($sucursal->sucursales as $mi_sucursal)

                                <option value="{{ $mi_sucursal->id }}">{{ $mi_sucursal->nombre_sucursal }}
                                </option>
                            @endforeach

                        @empty
                            <option value=""> Esta empresa no tiene sucursales </option>
                        @endforelse
                    </select>

                    <x-input-error for="sucursal" />
                </div>
            </div>
            
            <!-- ***********************  -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <!--  -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="departamento"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Departamento</label>
                    <select wire:model.live="departamento" id="departamento"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value=""> --- Seleccione un departamento --- </option>
                        @forelse ($departamentos as $departamento)

                            @foreach($departamento->departamentos as $mi_depa)

                                <option value="{{ $mi_depa->id }}">{{ $mi_depa->nombre_departamento }}
                                </option>
                            @endforeach

                        @empty
                            <option value=""> Esta sucursal no tiene departamentos</option>
                        @endforelse
                    </select>

                    <x-input-error for="departamento" />
                </div>


                <!--  -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="puesto_id"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Puesto</label>
                    <select wire:model.defer="user.puesto_id" id="puesto_id"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value=""> --- Seleccione una sucursal --- </option>
                        @forelse ($puestos as $puesto)

                            @foreach($puesto->puestos as $mi_puesto)

                                <option value="{{ $mi_puesto->id }}">{{ $mi_puesto->nombre_puesto }}
                                </option>
                            @endforeach

                        @empty
                            <option value=""> Este departamento no tiene puestos </option>
                        @endforelse
                    </select>

                    <x-input-error for="user.puesto_id" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="registro_patronal_id"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Registros Patronales</label>
                    <select wire:model.defer="trabajador.registro_patronal_id" id="registro_patronal_id"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value=""> ---  Seleccione un Registro Patronal --- </option>
                        @foreach ($registros_patronales as $registro_patronal)
                            <option value="{{ $registro_patronal->id }}">{{ $registro_patronal->registro_patronal }}</option>
                        @endforeach
                    </select>

                    <x-input-error for="trabajador.registro_patronal_id" />
                </div>

                <!-- Selección de Rol -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="rol"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Rol
                    </label>
                    <select wire:model.defer="rol" id="rol"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="">--- Seleccione un rol --- </option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="rol" />
                    
                </div>
            </div>

            <!-- NNS y Fecha Nacimiento -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="numero_seguridad_social"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de 
                        Seguridad Social</label>
                    <input wire:model.defer="trabajador.numero_seguridad_social" type="text" id="numero_seguridad_social"
                        placeholder="Número de Seguridad Social (NSS)"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.numero_seguridad_social" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="fecha_nacimiento" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Fecha Nacimiento
                    </label>
                    <input wire:model.defer="trabajador.fecha_nacimiento" type="date" id="fecha_nacimiento"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.fecha_nacimiento" />
                </div>
            </div>

            <!-- Lugar Nacimiento y Estado -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">

                <div class="grid grid-cols-1">
                    <label for="lugar_nacimiento"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Lugar Nacimiento</label>
                    <input wire:model.defer="trabajador.lugar_nacimiento" type="text" id="lugar_nacimiento"
                        placeholder="Lugar de nacimiento"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.lugar_nacimiento" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="estado"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Estado</label>
                    <input wire:model.defer="trabajador.estado" type="text" id="estado"
                         placeholder="Estado"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.estado" />
                </div>
            </div>

            <!-- Código Postal y Sexo -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="codigo_postal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código Postal</label>
                    <input wire:model.defer="trabajador.codigo_postal" type="text" id="codigo_postal" placeholder="Código Postal"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.codigo_postal" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="sexo"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Sexo</label>
                    <select wire:model.defer="trabajador.sexo" id="sexo"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>

                    <x-input-error for="trabajador.sexo" />
                </div>
            </div>

            <!-- CURP Y RFC -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="curp"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">CURP</label>
                    <input wire:model.defer="trabajador.curp" type="text" id="curp" placeholder="CURP"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.curp" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="rfc"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                    <input wire:model.defer="trabajador.rfc" type="text" id="rfc" placeholder="RFC"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.rfc" />
                </div>
            </div>

            <!-- ***********************  -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="numero_celular"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número Celular </label>
                    <input wire:model.defer="trabajador.numero_celular" type="text" id="numero_celular" placeholder="Número de celular"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.numero_celular" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="fecha_ingreso" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Fecha Ingreso
                    </label>
                    <input wire:model.defer="trabajador.fecha_ingreso" type="date" id="fecha_ingreso"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.fecha_ingreso" />
                </div>
            </div>

            <!-- ********************************** -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="edad"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Edad</label>
                    <select wire:model.defer="trabajador.edad" id="edad"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="15-19">15-19</option>
                        <option value="20-24">20-24</option>
                        <option value="25-29">25-29</option>
                        <option value="30-34">30-34</option>
                        <option value="35-39">35-39</option>
                        <option value="40-44">40-44</option>
                        <option value="45-49">45-49</option>
                        <option value="50-54">50-54</option>
                        <option value="55-59">55-59</option>
                        <option value="60-64">60-64</option>
                        <option value="65-69">65-69</option>
                        <option value="70 o más">70 o más</option>
                    </select>

                    <x-input-error for="trabajador.edad" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="estado_civil"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado Civil</label>
                    <select wire:model.defer="trabajador.estado_civil" id="estado_civil"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="Viudo">Viudo</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Unión libre">Unión libre</option>
                    </select>
                    <x-input-error for="trabajador.estado_civil" />
                </div>
            </div>

            <!-- ***********************  -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="estudios"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nivel de Estudios</label>
                    <select wire:model.defer="trabajador.estudios" id="estudios"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Sin Formación">Sin Formación</option>
                        <option value="Preescolar">Preescolar</option>
                        <option value="Primaria">Primaria</option>
                        <option value="Secundaria">Secundaria</option>
                        <option value="Preparatoria o Bachillerato">Preparatoria o Bachillerato</option>
                        <option value="Técnico Superior">Técnico Superior</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Maestría">Maestría</option>
                        <option value="Doctorado">Doctorado</option>
                    </select>
                    
                    <x-input-error for="trabajador.estudios" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="ocupacion"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Ocupación</label>
                    <input wire:model.defer="trabajador.ocupacion" type="text" id="ocupacion" placeholder="Ocupación actual"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.ocupacion" />
                </div>
            </div>

            <!-- ***********************  -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="tipo_puest"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de puesto</label>
                    <select wire:model.defer="trabajador.tipo_puest" id="tipo_puest"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Operativo">Operativo</option>
                        <option value="Profesional o técnico">Profesional o técnico</option>
                        <option value="Superior">Superior</option>
                        <option value="Gerente">Gerente</option>
                    </select>

                    <x-input-error for="trabajador.tipo_puest" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="contratacion"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Contratación</label>
                    <select wire:model.defer="trabajador.contratacion" id="contratacion"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Por obra o proyecto">Por obra o proyecto</option>
                        <option value="Por tiempo determinado (temporal)">Por tiempo determinado (temporal)</option>
                        <option value="Tiempo indeterminado">Tiempo indeterminado</option>
                        <option value="Honorarios">Honorarios</option>
                    </select>

                    <x-input-error for="trabajador.contratacion" />
                </div>
            </div>

            <!-- ***********************  -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="tipo_personal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de personal</label>
                    <select wire:model.defer="trabajador.tipo_personal" id="tipo_personal"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Sindicalizado">Sindicalizado</option>
                        <option value="Confianza">Confianza</option>
                        <option value="Ninguno">Ninguno</option>
                    </select>

                    <x-input-error for="trabajador.tipo_personal" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="jornada_trabajo"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Jornada de trabajo</label>
                    <select wire:model.defer="trabajador.jornada_trabajo" id="jornada_trabajo"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Fijo Nocturno (entre las 20:00 y 6:00 hrs)">Fijo Nocturno (entre las 20:00 y 6:00 hrs)</option>
                        <option value="Fijo Diurno (entre las 6:00 y 20:00 hrs)">Fijo Diurno (entre las 6:00 y 20:00 hrs)</option>
                        <option value="Fijo mixto (combinación de nocturno y diurno)">Fijo mixto (combinación de nocturno y diurno)</option>
                    </select>

                    <x-input-error for="trabajador.jornada_trabajo" />
                </div>
            </div>

            <!-- ***********************  -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="rotacion"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Rotación de turno</label>
                    <select wire:model.defer="trabajador.rotacion" id="rotacion"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Sí">Sí</option>
                        <option value="No">No</option>
                    </select>

                    <x-input-error for="trabajador.rotacion" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="experiencia"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Experiencia</label>
                    <select wire:model.defer="trabajador.experiencia" id="experiencia"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Menos de 6 meses">Menos de 6 meses</option>
                        <option value="Entre 6 meses y 1 año">Entre 6 meses y 1 año</option>
                        <option value="Entre 1 y 4 años">Entre 1 y 4 años</option>
                        <option value="Entre 5 y 9 años">Entre 5 y 9 años</option>
                        <option value="Entre 10 y 14 años">Entre 10 y 14 años</option>
                        <option value="Entre 15 y 19 años">Entre 15 y 19 años</option>
                        <option value="Entre 20 y 24 años">Entre 20 y 24 años</option>
                        <option value="25 años o más">25 años o más</option>
                    </select>

                    <x-input-error for="trabajador.experiencia" />
                </div>
            </div>

            <!-- ***********************  -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="tiempo_puesto"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tiempo en el puesto</label>
                    <select wire:model.defer="trabajador.tiempo_puesto" id="tiempo_puesto"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Menos de 6 meses">Menos de 6 meses</option>
                        <option value="Entre 6 meses y 1 año">Entre 6 meses y 1 año</option>
                        <option value="Entre 1 y 4 años">Entre 1 y 4 años</option>
                        <option value="Entre 5 y 9 años">Entre 5 y 9 años</option>
                        <option value="Entre 10 y 14 años">Entre 10 y 14 años</option>
                        <option value="Entre 15 y 19 años">Entre 15 y 19 años</option>
                        <option value="Entre 20 y 24 años">Entre 20 y 24 años</option>
                        <option value="25 años o más">25 años o más</option>
                    </select>

                    <x-input-error for="trabajador.tiempo_puesto" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="calle"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Calle</label>
                    <input wire:model.defer="trabajador.calle" type="text" id="calle" placeholder="Calle"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.calle" />
                </div>
            </div>

            <!-- ***********************  -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="numero"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número</label>
                    <input wire:model.defer="trabajador.numero" type="text" id="numero" placeholder="Número de calle"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.numero" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="colonia"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Colonia</label>
                    <input wire:model.defer="trabajador.colonia" type="text" id="colonia" placeholder="Colonia"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.colonia" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="status"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Status</label>
                    <select wire:model.defer="trabajador.status" id="status"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                    <x-input-error for="trabajador.status" />
                </div>

                <div class="grid grid-cols-1 mt-5">
                    <label for="sueldo"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Sueldo</label>
                    <input wire:model.defer="trabajador.sueldo" type="text" id="sueldo" placeholder="2500.50"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        
                    <x-input-error for="trabajador.sueldo" />
                </div>

            </div>
            

            <!-- Botones -->
            <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>

                <button type="button" wire:click="saveTrabajador"
                    class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    Agregar
                </button>

                <button type="button" wire:click="redirigirTrabajador"
                    class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
