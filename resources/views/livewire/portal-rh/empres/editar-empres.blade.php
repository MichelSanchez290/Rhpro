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
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Editar Empresa</h1>
                </div>
            </div>

            <form class="mt-5 mx-7">
                <!-- Nombre -->
                <div class="grid grid-cols-1">
                    <label for="nombre"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                    <input wire:model.defer="nombre" type="text" id="nombre" placeholder="Nombre de la empresa"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                </div>

                <!-- Razón Social y RFC -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="razon_social"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Razón
                            Social</label>
                        <input wire:model.defer="razon_social" type="text" id="razon_social"
                            placeholder="Razón social"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="rfc"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                        <input wire:model.defer="rfc" type="text" id="rfc" placeholder="RFC"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- Nombre Comercial -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="nombre_comercial"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre
                        Comercial</label>
                    <input wire:model.defer="nombre_comercial" type="text" id="nombre_comercial"
                        placeholder="Nombre comercial"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                </div>

                <!-- País de Origen -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="pais_origen"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">País de
                        Origen</label>
                    <input wire:model.defer="pais_origen" type="text" id="pais_origen" placeholder="País de origen"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                </div>

                <!-- Representante Legal -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="representante_legal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Representante
                        Legal</label>
                    <input wire:model.defer="representante_legal" type="text" id="representante_legal"
                        placeholder="Representante legal"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                </div>

                <!-- URL Constancia -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="url_constancia_situacion_fiscal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">URL
                        Constancia de Situación Fiscal</label>
                    <input wire:model.defer="url_constancia_situacion_fiscal" type="url"
                        id="url_constancia_situacion_fiscal" placeholder="https://..."
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                </div>

                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>

                    <button type="button" wire:click="actualizarEmpres()"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Actualizar</button>

                </div>
            </form>
        </div>
    </div>
</body>
