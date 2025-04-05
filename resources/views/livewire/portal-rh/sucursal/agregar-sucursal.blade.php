<div>
    <div class="flex min-h-screen items-center justify-center py-3">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="30"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path fill="#ffffff"
                            d="M36.8 192l566.3 0c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0L121.7 0c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224l0 160 0 80c0 26.5 21.5 48 48 48l224 0c26.5 0 48-21.5 48-48l0-80 0-160-64 0 0 160-192 0 0-160-64 0zm448 0l0 256c0 17.7 14.3 32 32 32s32-14.3 32-32l0-256-64 0z" />
                    </svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Agregar Sucursal</h1>
                </div>
            </div>

            <div class="relative mb-4">
                <div class="flex items-center justify-between">
                    @if (session()->has('message'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => {
                            show = false;
                            window.location.href = '{{ route('mostrarsucursal') }}'
                        }, 3000)" x-show="show"
                            class="fixed top-4 left-4 max-w-xs w-full bg-green-500 text-white shadow-lg rounded-lg p-4 flex items-center space-x-3 transition-transform transform hover:scale-105 z-50">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path fill="#ffffff"
                                    d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                            </svg>
                            <div class="flex-1">
                                <p class="font-bold">{{ session('message') }}</p>
                                @if (session('message') == 'Sucursal Agregada.')
                                    <p class="text-sm">La Sucursal ha sido agregada correctamente</p>
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
                <!-- Clave Sucursal -->
                <div class="grid grid-cols-1">
                    <label for="clave_sucursal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clave
                        Sucursal</label>
                    <input wire:model.defer="sucursal.clave_sucursal" type="text" id="clave_sucursal"
                        placeholder="Clave de la sucursal"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                    <x-input-error for="sucursal.clave_sucursal" />
                </div>

                <!-- Nombre Sucursal y Zona Económica -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="nombre_sucursal"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre
                            Sucursal</label>
                        <input wire:model.defer="sucursal.nombre_sucursal" type="text" id="nombre_sucursal"
                            placeholder="Nombre de la sucursal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="sucursal.nombre_sucursal" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="zona_economica"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Zona
                            Económica</label>
                        <input wire:model.defer="sucursal.zona_economica" type="text" id="zona_economica"
                            placeholder="Zona económica"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="sucursal.zona_economica" />
                    </div>
                </div>

                <!-- Estado y Cuenta Contable -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="estado"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado</label>
                        <input wire:model.defer="sucursal.estado" type="text" id="estado" placeholder="Estado"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="sucursal.estado" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="cuenta_contable"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta
                            Contable</label>
                        <input wire:model.defer="sucursal.cuenta_contable" type="text" id="cuenta_contable"
                            placeholder="Cuenta contable"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="sucursal.cuenta_contable" />
                    </div>
                </div>

                <!-- RFC y Correo -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="rfc"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                        <input wire:model.defer="sucursal.rfc" type="text" id="rfc" placeholder="RFC"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="sucursal.rfc" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="correo"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Correo</label>
                        <input wire:model.defer="sucursal.correo" type="email" id="correo"
                            placeholder="Correo electrónico"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="sucursal.correo" />
                    </div>
                </div>

                <!-- Teléfono y Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="telefono"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono</label>
                        <input wire:model.defer="sucursal.telefono" type="text" id="telefono" placeholder="Teléfono"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                        <x-input-error for="sucursal.telefono" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="status"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Status</label>
                        <select wire:model.defer="sucursal.status" id="status"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>

                        <x-input-error for="sucursal.status" />
                    </div>
                </div>

                <!-- Registro Patronal -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="registro_patronal_id"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Registro Patronal
                        </label>
                        <select wire:model.defer="sucursal.registro_patronal_id" id="registro_patronal_id"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="">Seleccione un Registro Patronal</option>
                            @foreach ($regpatronales as $regpatronal)
                                <option value="{{ $regpatronal->id }}">{{ $regpatronal->registro_patronal }}</option>
                            @endforeach
                        </select>
    
                        <x-input-error for="sucursal.registro_patronal_id" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="empresa_id"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Asociar Empresa</label>
                        <select wire:model.defer="empresa_id" id="empresa_id"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="">Seleccione una Empresa</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
    
                        <x-input-error for="empresa_id" />
                    </div>
                </div>
                

                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>

                    <button type="button" wire:click="saveSucursal()"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Agregar
                    </button>

                    <button type="button" wire:click="redirigirSuc"
                        class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
