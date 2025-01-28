<body class="bg-gray-200">
    <div class="flex h-screen items-center justify-center">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 2.487a2.25 2.25 0 013.182 3.182L6.557 19.157a4.5 4.5 0 01-1.689 1.1l-3.124 1.043a.375.375 0 01-.473-.473l1.043-3.124a4.5 4.5 0 011.1-1.689L16.862 2.487zM19.5 7.125l-3-3" />
                    </svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Editar Sucursal</h1>
                </div>
            </div>

            <form class="mt-5 mx-7">
                <!-- Clave Sucursal -->
                <div class="grid grid-cols-1">
                    <label for="clave_sucursal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clave
                        Sucursal</label>
                    <input wire:model.defer="clave_sucursal" type="text" id="clave_sucursal"
                        placeholder="Clave Sucursal"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                </div>

                <!-- Nombre Sucursal y Zona Económica -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="nombre_sucursal"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre
                            Sucursal</label>
                        <input wire:model.defer="nombre_sucursal" type="text" id="nombre_sucursal"
                            placeholder="Nombre Sucursal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="zona_economica"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Zona
                            Económica</label>
                        <input wire:model.defer="zona_economica" type="text" id="zona_economica"
                            placeholder="Zona Económica"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- Estado y Cuenta Contable -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="estado"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado</label>
                        <input wire:model.defer="estado" type="text" id="estado" placeholder="Estado"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="cuenta_contable"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta
                            Contable</label>
                        <input wire:model.defer="cuenta_contable" type="text" id="cuenta_contable"
                            placeholder="Cuenta Contable"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- RFC y Correo -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="rfc"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                        <input wire:model.defer="rfc" type="text" id="rfc" placeholder="RFC"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="correo"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Correo</label>
                        <input wire:model.defer="correo" type="email" id="correo" placeholder="Correo Electrónico"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- Teléfono y Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="telefono"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono</label>
                        <input wire:model.defer="telefono" type="text" id="telefono" placeholder="Teléfono"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="status"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Status</label>
                        <select wire:model.defer="status" id="status"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>

                <!-- Registro Patronal -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="registro_patronal_id"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Registro
                        Patronal</label>
                    <select wire:model.defer="registro_patronal_id" id="registro_patronal_id"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="">Seleccione un usuario</option>
                        @foreach ($regpatronales as $regpatronal)
                            <option value="{{ $regpatronal->id }}">{{ $regpatronal->registro_patronal }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" wire:click="actualizarSucursal"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</body>
