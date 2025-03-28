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
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Agregar Instructor</h1>
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
                            @if (session('message') == 'Instructor Agregado.')
                                <p class="text-sm">El instructor ha sido agregado correctamente</p>
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
            <div x-data="{ tipoinstructor: @entangle('instructor.tipoinstructor') }">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="nombre"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre
                        </label>
                        <input wire:model.defer="nombre" type="text" id="nombre" placeholder="Nombre"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="nombre" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="apellido_p"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido Paterno
                        </label>
                        <input wire:model.defer="apellido_p" type="text" id="apellido_p"
                            placeholder="Apellido paterno"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

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
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="apellido_m" />
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
                        <label for="password"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Password
                        </label>
                        <input wire:model.defer="password" type="password" id="password" placeholder="Password"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="password" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="registro_patronal_id"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Registros Patronales</label>
                        <select wire:model.defer="instructor.registro_patronal_id" id="registro_patronal_id"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value=""> --- Seleccione un Registro Patronal --- </option>
                            @foreach ($registros_patronales as $registro_patronal)
                                <option value="{{ $registro_patronal->id }}">
                                    {{ $registro_patronal->registro_patronal }}</option>
                            @endforeach
                        </select>

                        <x-input-error for="instructor.registro_patronal_id" />

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


                    <div class="grid grid-cols-1 mt-5">
                        <label for="puesto_id"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Puesto</label>
                        <select wire:model.defer="user.puesto_id" id="puesto_id"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value=""> --- Seleccione una sucursal --- </option>
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

                <div class="grid grid-cols-1 mt-5">
                    <label for="tipoinstructor"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de
                        instructor</label>
                    <select wire:model.defer="instructor.tipoinstructor" id="tipoinstructor"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Física">Física</option>
                        <option value="Moral">Moral</option>
                    </select>

                    <x-input-error for="instructor.tipoinstructor" />
                </div>

                <!-- *********** -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <!--  -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="telefono1"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Telefono 1
                        </label>
                        <input wire:model.defer="instructor.telefono1" type="text" id="telefono1"
                            placeholder="Número de contacto primordial"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.telefono1" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="telefono2"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Telefono 2
                        </label>
                        <input wire:model.defer="instructor.telefono2" type="text" id="telefono2"
                            placeholder="Número de contacto secundario"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.telefono2" />
                    </div>


                </div>

                <!-- ********************** -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">

                    <div class="grid grid-cols-1 mt-5">
                        <label for="rfc"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            RFC
                        </label>
                        <input wire:model.defer="instructor.rfc" type="text" id="rfc"
                            placeholder="RFC a 13 digitos"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.rfc" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="regimen"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Regimen fiscal</label>
                        <input wire:model.defer="instructor.regimen" type="text" id="regimen"
                            placeholder="Regimen fiscal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.regimen" />
                    </div>
                </div>

                <!--  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="estado"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado
                        </label>
                        <input wire:model.defer="instructor.estado" type="text" id="estado"
                            placeholder="Estado"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.estado" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="municipio"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Municipio
                        </label>
                        <input wire:model.defer="instructor.municipio" type="text" id="municipio"
                            placeholder="Municipio"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.municipio" />
                    </div>
                </div>

                <!--  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="codigopostal"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código Postal
                        </label>
                        <input wire:model.defer="instructor.codigopostal" type="text" id="codigopostal"
                            placeholder="Código Postal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.codigopostal" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="colonia"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Colonia
                        </label>
                        <input wire:model.defer="instructor.colonia" type="text" id="colonia"
                            placeholder="Colonia"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.colonia" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="calle"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Calle </label>
                        <input wire:model.defer="instructor.calle" type="text" id="calle"
                            placeholder="Nombre de calle"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.calle" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="numero"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número </label>
                        <input wire:model.defer="instructor.numero" type="text" id="numero"
                            placeholder="Número de calle"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.numero" />
                    </div>
                </div>

                <!-- ********************************** -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="honorarios"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Honorarios
                            (Sueldo)</label>
                        <input wire:model.defer="instructor.honorarios" type="text" id="honorarios"
                            placeholder="500.00"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.honorarios" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="status"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Status</label>
                        <select wire:model.defer="instructor.status" id="status"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>

                        <x-input-error for="instructor.status" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="dc5"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">DC5
                        </label>
                        <input wire:model.defer="instructor.dc5" type="text" id="dc5" placeholder="DC5"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.dc5" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="cuentabancaria"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta Bancaria
                        </label>
                        <input wire:model.defer="instructor.cuentabancaria" type="text" id="cuentabancaria"
                            placeholder="Número de cuenta bancaria"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.cuentabancaria" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="ine"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">INE IDMEX (CIC)
                        </label>
                        <input wire:model.defer="instructor.ine" type="text" id="ine"
                            placeholder="IDMEX1836173420"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.ine" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="curp"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">CURP
                        </label>
                        <input wire:model.defer="instructor.curp" type="text" id="curp" placeholder="CURP"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.curp" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="sat"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">SAT
                        </label>
                        <input wire:model.defer="instructor.sat" type="text" id="sat" placeholder="SAT"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.sat" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="domicilio"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Domicilio
                        </label>
                        <input wire:model.defer="instructor.domicilio" type="text" id="domicilio"
                            placeholder="Domicilio"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.domicilio" />
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-7">
                    <label for="registroStps"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Registro STPS
                    </label>
                    <input wire:model.defer="instructor.registroStps" type="text" id="registroStps"
                        placeholder="Registro STPS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                    <x-input-error for="instructor.registroStps" /> <br> <br>
                </div>

                <!-- ******* DOCUMENTOS ********* -->
                <div class="flex flex-col md:flex-row gap-5 mt-5">
                    <!-- Comprobante DC5 -->
                    <div class="flex flex-col items-center w-full md:w-1/2">
                        <label for="dc5_doc" class="uppercase text-lg md:text-xl text-gray-600 font-semibold mb-4">
                            Comprobante DC5
                        </label>

                        <div class="mx-auto cursor-pointer flex w-full flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center"
                            onclick="document.getElementById('dc5_file').click()" ondragover="event.preventDefault()"
                            ondrop="handleDrop(event, 'dc5_file')">

                            <!-- Icono y texto... -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>

                            <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Adjuntar archivo</h2>
                            <p class="mt-2 text-gray-500 tracking-wide">Seleccione o arrastre su archivo aquí</p>

                            <input type="file" id="dc5_file" class="hidden" wire:model.defer="dc5_doc"
                                accept=".pdf" />

                            @if ($dc5_doc)
                                <img src="{{ asset('img/pdf_icon.jpeg') }}" alt="PDF Icon" width="100"
                                    height="100">
                            @endif
                        </div>
                        <x-input-error for="dc5_doc" />
                    </div>

                    <!-- Comprobante de Cuenta Bancaria -->
                    <div class="flex flex-col items-center w-full md:w-1/2">
                        <label for="cuenta_doc" class="uppercase text-lg md:text-xl text-gray-600 font-semibold mb-4">
                            Comprobante de Cuenta Bancaria
                        </label>

                        <div class="mx-auto cursor-pointer flex w-full flex-col items-center rounded-xl border-2 border-dashed border-green-400 bg-white p-6 text-center"
                            onclick="document.getElementById('cuenta_file').click()"
                            ondragover="event.preventDefault()" ondrop="handleDrop(event, 'cuenta_file')">

                            <!-- Icono y texto... -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>

                            <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Adjuntar archivo</h2>
                            <p class="mt-2 text-gray-500 tracking-wide">Seleccione o arrastre su archivo aquí</p>

                            <input type="file" id="cuenta_file" class="hidden" wire:model.defer="cuenta_doc"
                                accept=".pdf" />

                            @if ($cuenta_doc)
                                <img src="{{ asset('img/pdf_icon.jpeg') }}" alt="PDF Icon" width="100"
                                    height="100">
                            @endif
                        </div>
                        <x-input-error for="cuenta_doc" />
                    </div>
                </div> <br>

                <div class="flex flex-col md:flex-row gap-5 mt-5">
                    <!-- Comprobante INE -->
                    <div class="flex flex-col items-center w-full md:w-1/2">
                        <label for="ine_doc" class="uppercase text-lg md:text-xl text-gray-600 font-semibold mb-4">
                            Comprobante de INE
                        </label>

                        <div class="mx-auto cursor-pointer flex w-full flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center"
                            onclick="document.getElementById('ine_file').click()" ondragover="event.preventDefault()"
                            ondrop="handleDrop(event, 'ine_file')">

                            <!-- Icono y texto... -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>

                            <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Adjuntar archivo</h2>
                            <p class="mt-2 text-gray-500 tracking-wide">Seleccione o arrastre su archivo aquí</p>

                            <input type="file" id="ine_file" class="hidden" wire:model.defer="ine_doc"
                                accept=".pdf" />

                            @if ($ine_doc)
                                <img src="{{ asset('img/pdf_icon.jpeg') }}" alt="PDF Icon" width="100"
                                    height="100">
                            @endif
                        </div>
                        <x-input-error for="ine_doc" />
                    </div>

                    <!-- Comprobante de CURP -->
                    <div class="flex flex-col items-center w-full md:w-1/2">
                        <label for="curp_doc" class="uppercase text-lg md:text-xl text-gray-600 font-semibold mb-4">
                            Comprobante de CURP
                        </label>

                        <div class="mx-auto cursor-pointer flex w-full flex-col items-center rounded-xl border-2 border-dashed border-green-400 bg-white p-6 text-center"
                            onclick="document.getElementById('curp_file').click()" ondragover="event.preventDefault()"
                            ondrop="handleDrop(event, 'curp_file')">

                            <!-- Icono y texto... -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>

                            <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Adjuntar archivo</h2>
                            <p class="mt-2 text-gray-500 tracking-wide">Seleccione o arrastre su archivo aquí</p>

                            <input type="file" id="curp_file" class="hidden" wire:model.defer="curp_doc"
                                accept=".pdf" />

                            @if ($curp_doc)
                                <img src="{{ asset('img/pdf_icon.jpeg') }}" alt="PDF Icon" width="100"
                                    height="100">
                            @endif
                        </div>
                        <x-input-error for="curp_doc" />
                    </div>
                </div> <br>

                <div class="flex flex-col md:flex-row gap-5 mt-5">
                    <!-- Comprobante SAT -->
                    <div class="flex flex-col items-center w-full md:w-1/2">
                        <label for="sat_doc" class="uppercase text-lg md:text-xl text-gray-600 font-semibold mb-4">
                            Comprobante de SAT
                        </label>

                        <div class="mx-auto cursor-pointer flex w-full flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center"
                            onclick="document.getElementById('sat_file').click()" ondragover="event.preventDefault()"
                            ondrop="handleDrop(event, 'sat_file')">

                            <!-- Icono y texto... -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>

                            <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Adjuntar archivo</h2>
                            <p class="mt-2 text-gray-500 tracking-wide">Seleccione o arrastre su archivo aquí</p>

                            <input type="file" id="sat_file" class="hidden" wire:model.defer="sat_doc"
                                accept=".pdf" />

                            @if ($sat_doc)
                                <img src="{{ asset('img/pdf_icon.jpeg') }}" alt="PDF Icon" width="100"
                                    height="100">
                            @endif
                        </div>
                        <x-input-error for="sat_doc" />
                    </div> 

                    <!-- Comprobante de DOMICILIO -->
                    <div class="flex flex-col items-center w-full md:w-1/2">
                        <label for="domicilio_doc" class="uppercase text-lg md:text-xl text-gray-600 font-semibold mb-4">
                            Comprobante de Domicilio
                        </label>

                        <div class="mx-auto cursor-pointer flex w-full flex-col items-center rounded-xl border-2 border-dashed border-green-400 bg-white p-6 text-center"
                            onclick="document.getElementById('domicilio_file').click()" ondragover="event.preventDefault()" 
                            ondrop="handleDrop(event, 'domicilio_file')">

                            <!-- Icono y texto... -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>

                            <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Adjuntar archivo</h2>
                            <p class="mt-2 text-gray-500 tracking-wide">Seleccione o arrastre su archivo aquí</p>

                            <input type="file" id="domicilio_file" class="hidden" wire:model.defer="domicilio_doc"
                                accept=".pdf" />

                            @if ($domicilio_doc)
                                <img src="{{ asset('img/pdf_icon.jpeg') }}" alt="PDF Icon" width="100"
                                    height="100">
                            @endif
                        </div>
                        <x-input-error for="domicilio_doc" />
                    </div>
                </div>

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
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre Empresa
                        </label>
                        <input wire:model.defer="instructor.nombre_empresa" type="text" id="nombre_empresa"
                            placeholder="Nombre Empresa"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="instructor.nombre_empresa" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                        <div class="grid grid-cols-1 mt-5">
                            <label for="rfc_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC Empresa
                            </label>
                            <input wire:model.defer="instructor.rfc_empre" type="text" id="rfc_empre"
                                placeholder="RFC de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="instructor.rfc_empre" />
                        </div>

                        <div class="grid grid-cols-1 mt-5">
                            <label for="calle_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Calle
                                Empresa
                            </label>
                            <input wire:model.defer="instructor.calle_empre" type="text" id="calle_empre"
                                placeholder="Calle de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="instructor.calle_empre" />
                        </div>
                    </div>

                    <!-- ***********************  -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                        <div class="grid grid-cols-1 mt-5">
                            <label for="numero_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número
                                Calle
                                Empresa
                            </label>
                            <input wire:model.defer="instructor.numero_empre" type="text" id="numero_empre"
                                placeholder="Número de Calle de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="instructor.numero_empre" />
                        </div>

                        <div class="grid grid-cols-1 mt-5">
                            <label for="colonia_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Colonia
                                Empresa
                            </label>
                            <input wire:model.defer="instructor.colonia_empre" type="text" id="colonia_empre"
                                placeholder="Colonia de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="instructor.colonia_empre" />
                        </div>
                    </div>

                    <!-- ***********************  -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                        <div class="grid grid-cols-1 mt-5">
                            <label for="municipio_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Municipio
                                Empresa
                            </label>
                            <input wire:model.defer="instructor.municipio_empre" type="text" id="municipio_empre"
                                placeholder="Municipio de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="instructor.municipio_empre" />
                        </div>

                        <div class="grid grid-cols-1 mt-5">
                            <label for="estado_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado
                                Empresa
                            </label>
                            <input wire:model.defer="instructor.estado_empre" type="text" id="estado_empre"
                                placeholder="Estado de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="instructor.estado_empre" />
                        </div>
                    </div>

                    <!-- ***********************  -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                        <div class="grid grid-cols-1 mt-5">
                            <label for="postal_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código
                                Postal
                                Empresa
                            </label>
                            <input wire:model.defer="instructor.postal_empre" type="text" id="postal_empre"
                                placeholder="Código Postal de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="instructor.postal_empre" />
                        </div>

                        <div class="grid grid-cols-1 mt-5">
                            <label for="regimen_empre"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Regimen
                                Empresa
                            </label>
                            <input wire:model.defer="instructor.regimen_empre" type="text" id="regimen_empre"
                                placeholder="Regimen de la Empresa"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                            <x-input-error for="instructor.regimen_empre" />
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>

                    <button type="button" wire:click="saveInstructor"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Agregar
                    </button>

                    <button type="button" wire:click="redirigirInstructor"
                        class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    // Función modificada para manejar múltiples inputs
    function handleDrop(event, inputId) {
        event.preventDefault();
        const fileInput = document.getElementById(inputId);
        if (event.dataTransfer.files.length > 0) {
            fileInput.files = event.dataTransfer.files;
            
            // Dispara el evento change para Livewire
            const changeEvent = new Event('change', { bubbles: true });
            fileInput.dispatchEvent(changeEvent);
            
            // Opcional: Mostrar nombre del archivo
            const dropZone = event.currentTarget;
            const fileNameElement = dropZone.querySelector('.file-name') || document.createElement('p');
            fileNameElement.textContent = event.dataTransfer.files[0].name;
            fileNameElement.className = 'file-name mt-2 text-blue-600';
            if (!dropZone.querySelector('.file-name')) {
                dropZone.appendChild(fileNameElement);
            }
        }
    }

    // Opcional: Función para mostrar el nombre del archivo al seleccionar
    document.addEventListener('DOMContentLoaded', function() {
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', function(e) {
                const dropZone = this.closest('.border-dashed');
                const fileNameElement = dropZone.querySelector('.file-name') || document.createElement('p');
                
                if (this.files.length > 0) {
                    fileNameElement.textContent = this.files[0].name;
                    fileNameElement.className = 'file-name mt-2 text-blue-600';
                    if (!dropZone.querySelector('.file-name')) {
                        dropZone.appendChild(fileNameElement);
                    }
                }
            });
        });
    });
</script>