<body class="bg-gray-200">
    <div class="flex h-screen items-center justify-center">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
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
