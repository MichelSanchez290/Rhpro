<div class="flex min-h-screen items-center justify-center py-3">
    <div class="grid bg-white rounded-lg shadow-xl w-full">
        <div class="flex justify-center py-4">
            <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="30"
                    viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                    <path fill="#ffffff"
                        d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                </svg>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="flex">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Editar Instructor</h1>
            </div>
        </div>

        <div class="relative mb-4">
            <div class="flex items-center justify-between">
                @if (session()->has('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => {
                        show = false;
                        window.location.href = '{{ route('mostrarinstructor') }}'
                    }, 3000)" x-show="show"
                        class="fixed top-4 left-4 max-w-xs w-full bg-green-500 text-white shadow-lg rounded-lg p-4 flex items-center space-x-3 transition-transform transform hover:scale-105 z-50">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                        </svg>
                        <div class="flex-1">
                            <p class="font-bold">{{ session('message') }}</p>
                            @if (session('message') == 'Instructor Editado.')
                                <p class="text-sm">El instructor ha sido editado correctamente</p>
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

        <form class="mt-5 mx-7">
            <div x-data="{ tipoinstructor: @entangle('tipoinstructor') }">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="name"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre
                        </label>
                        <input wire:model.defer="user.name" type="text" id="name" placeholder="Nombre"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="user.name" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="email"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Correo
                        </label>
                        <input wire:model.defer="user.email" type="email" id="email" placeholder="Correo"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="user.email" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <!--  -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="Nueva contraseña"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Password
                            (SOLO SI ES NECESARIO)
                        </label>
                        <input wire:model.defer="password" type="password" id="password" placeholder="Password"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="password" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="registro_patronal_id"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Registros Patronales</label>
                        <select wire:model.defer="registro_patronal_id" id="registro_patronal_id"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value=""> --- Seleccione un Registro Patronal --- </option>
                            @foreach ($registros_patronales as $registro_patronal)
                                <option value="{{ $registro_patronal->id }}">
                                    {{ $registro_patronal->registro_patronal }}</option>
                            @endforeach
                        </select>

                        <x-input-error for="registro_patronal_id" />

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
                    <!--  -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="sucursal"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Sucursal</label>
                        <select wire:model.live="sucursal" id="sucursal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value=""> --- Seleccione una sucursal --- </option>
                            @forelse ($sucursales as $sucursal)

                                @foreach ($sucursal->sucursales as $mi_sucursal)
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

                                @foreach ($departamento->departamentos as $mi_depa)
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
                            <option value=""> --- Seleccione un puesto --- </option>
                            @forelse ($puestos as $puesto)

                                @foreach ($puesto->puestos as $mi_puesto)
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

                

                <!-- *********** -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
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
                    
                    <div class="grid grid-cols-1 mt-5">
                        <label for="tipoinstructor"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de
                            instructor</label>
                        <select wire:model.defer="tipoinstructor" id="tipoinstructor"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Física">Física</option>
                            <option value="Moral">Moral</option>
                        </select>
    
                        <x-input-error for="tipoinstructor" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="telefono1"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Telefono 1
                        </label>
                        <input wire:model.defer="telefono1" type="text" id="telefono1"
                            placeholder="Número de contacto primordial"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="telefono1" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="telefono2"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Telefono 2
                        </label>
                        <input wire:model.defer="telefono2" type="text" id="telefono2"
                            placeholder="Número de contacto secundario"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="telefono2" />
                    </div>
                </div>

                <!-- ********************** -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">

                    <div class="grid grid-cols-1">
                        <label for="rfc"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"> RFC
                        </label>
                        <input wire:model.defer="rfc" type="text" id="rfc" placeholder="RFC a 13 digitos"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="rfc" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="regimen"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Regimen fiscal</label>
                        <input wire:model.defer="regimen" type="text" id="regimen" placeholder="Regimen fiscal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="regimen" />
                    </div>
                </div>

                <!--  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="estado"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado
                        </label>
                        <input wire:model.defer="estado" type="text" id="estado" placeholder="Estado"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="estado" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="municipio"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Municipio
                        </label>
                        <input wire:model.defer="municipio" type="text" id="municipio" placeholder="Municipio"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="municipio" />
                    </div>
                </div>

                <!--  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="codigopostal"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código
                            Postal
                        </label>
                        <input wire:model.defer="codigopostal" type="text" id="codigopostal"
                            placeholder="Código Postal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="codigopostal" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="colonia"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Colonia
                        </label>
                        <input wire:model.defer="colonia" type="text" id="colonia" placeholder="Colonia"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="colonia" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="calle"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Calle
                        </label>
                        <input wire:model.defer="calle" type="text" id="calle" placeholder="Nombre de calle"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="calle" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="numero"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número
                        </label>
                        <input wire:model.defer="numero" type="text" id="numero" placeholder="Número de calle"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="numero" />
                    </div>
                </div>

                <!-- ********************************** -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="honorarios"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Honorarios</label>
                        <input wire:model.defer="honorarios" type="text" id="honorarios" placeholder="Honorarios"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="honorarios" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="status"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Status</label>
                        <select wire:model.defer="status" id="status"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>

                        <x-input-error for="status" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="dc5"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">DC5
                        </label>
                        <input wire:model.defer="dc5" type="text" id="dc5" placeholder="DC5"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="dc5" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="cuentabancaria"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta
                            Bancaria
                        </label>
                        <input wire:model.defer="cuentabancaria" type="text" id="cuentabancaria"
                            placeholder="Número de cuenta bancaria"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="cuentabancaria" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="ine"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">INE
                        </label>
                        <input wire:model.defer="ine" type="text" id="ine" placeholder="INE"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="ine" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="curp"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">CURP
                        </label>
                        <input wire:model.defer="curp" type="text" id="curp" placeholder="CURP"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="curp" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="sat"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">SAT
                        </label>
                        <input wire:model.defer="sat" type="text" id="sat" placeholder="SAT"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="sat" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="domicilio"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Domicilio
                        </label>
                        <input wire:model.defer="domicilio" type="text" id="domicilio" placeholder="Domicilio"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="domicilio" />
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-5">
                    <label for="registroStps"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"> Registro STPS
                    </label>
                    <input wire:model.defer="registroStps" type="text" id="registroStps"
                        placeholder="Registro STPS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                    <x-input-error for="registroStps" />
                </div> <br> <br>

                <!-- **********************************************  -->
                <!-- TIPO DE PERSONA MORAL  -->
                <!-- Condicional para mostrar los campos de persona moral -->
                <div x-show="tipoinstructor === 'Moral'">
                    <div class="flex justify-flex-start">
                        <div class="flex">
                            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Persona Moral</h1>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="nombre_empresa"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre
                            Empresa
                        </label>
                        <input wire:model.defer="nombre_empresa" type="text" id="nombre_empresa"
                            placeholder="Nombre Empresa"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="nombre_empresa" />
                    </div>

                    <!-- ***********************  -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                        <div class="grid grid-cols-1">
                            <label for="rfc_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC
                                Empresa
                            </label>
                            <input wire:model.defer="rfc_empre" type="text" id="rfc_empre"
                                placeholder="RFC de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="rfc_empre" />
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="calle_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Calle
                                Empresa
                            </label>
                            <input wire:model.defer="calle_empre" type="text" id="calle_empre"
                                placeholder="Calle de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="calle_empre" />
                        </div>
                    </div>

                    <!-- ***********************  -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                        <div class="grid grid-cols-1">
                            <label for="numero_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número
                                Calle Empresa
                            </label>
                            <input wire:model.defer="numero_empre" type="text" id="numero_empre"
                                placeholder="Número de Calle de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="numero_empre" />
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="colonia_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Colonia
                                Empresa
                            </label>
                            <input wire:model.defer="colonia_empre" type="text" id="colonia_empre"
                                placeholder="Colonia de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="colonia_empre" />
                        </div>
                    </div>

                    <!-- ***********************  -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                        <div class="grid grid-cols-1">
                            <label for="municipio_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Municipio
                                Empresa
                            </label>
                            <input wire:model.defer="municipio_empre" type="text" id="municipio_empre"
                                placeholder="Municipio de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="municipio_empre" />
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="estado_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado
                                Empresa
                            </label>
                            <input wire:model.defer="estado_empre" type="text" id="estado_empre"
                                placeholder="Estado de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="estado_empre" />
                        </div>
                    </div>

                    <!-- ***********************  -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                        <div class="grid grid-cols-1">
                            <label for="postal_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código
                                Postal Empresa
                            </label>
                            <input wire:model.defer="postal_empre" type="text" id="postal_empre"
                                placeholder="Código Postal de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="postal_empre" />
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="regimen_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Regimen
                                Empresa
                            </label>
                            <input wire:model.defer="regimen_empre" type="text" id="regimen_empre"
                                placeholder="Regimen de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="regimen_empre" />
                        </div>
                    </div>
                </div>

                <!-- Botones instructor -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>

                    <button type="button" wire:click="actualizarInstructor"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Actualizar
                    </button>

                    <button type="button" onclick="window.history.back()"
                        class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
