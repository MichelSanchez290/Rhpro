<body class="bg-gray-200">
    <div class="flex min-h-screen items-center justify-center py-3">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        class="w-8 h-8 text-white" stroke-linecap="round" stroke-linejoin="round" width="32"
                        height="32" stroke-width="2">
                        <path d="M3 21h9"></path>
                        <path d="M9 8h1"></path>
                        <path d="M9 12h1"></path>
                        <path d="M9 16h1"></path>
                        <path d="M14 8h1"></path>
                        <path d="M14 12h1"></path>
                        <path
                            d="M5 21v-16c0 -.53 .211 -1.039 .586 -1.414c.375 -.375 .884 -.586 1.414 -.586h10c.53 0 1.039 .211 1.414 .586c.375 .375 .586 .884 .586 1.414v7">
                        </path>
                        <path d="M16 19h6"></path>
                        <path d="M19 16v6"></path>
                    </svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Registrar Empresa</h1>
                </div>
            </div>

            <form class="mt-5 mx-7">
                <form class="mt-5 mx-7">
                    <!-- Nombre -->
                    <div class="grid grid-cols-1">
                        <label for="nombre"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                        <input wire:model.defer="empresa.nombre" type="text" id="nombre"
                            placeholder="Nombre de la empresa"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <!-- Razón Social y RFC -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                        <div class="grid grid-cols-1">
                            <label for="razon_social"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Razón
                                Social</label>
                            <input wire:model.defer="empresa.razon_social" type="text" id="razon_social"
                                placeholder="Razón social"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="rfc"
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                            <input wire:model.defer="empresa.rfc" type="text" id="rfc" placeholder="RFC"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>

                    <!-- Nombre Comercial -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="nombre_comercial"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre
                            Comercial</label>
                        <input wire:model.defer="empresa.nombre_comercial" type="text" id="nombre_comercial"
                            placeholder="Nombre comercial"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <!-- País de Origen -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="pais_origen"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">País de
                            Origen</label>
                        <input wire:model.defer="empresa.pais_origen" type="text" id="pais_origen"
                            placeholder="País de origen"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <!-- Representante Legal -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="representante_legal"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Representante
                            Legal</label>
                        <input wire:model.defer="empresa.representante_legal" type="text" id="representante_legal"
                            placeholder="Representante legal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <!-- URL Constancia -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="url_constancia"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">URL Constancia
                            de
                            Situación Fiscal</label>
                        <input wire:model.defer="empresa.url_constancia_situacion_fiscal" type="url"
                            id="url_constancia" placeholder="https://..."
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <!-- Botones -->
                    <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>

                        <button type="button" wire:click="saveEmpres"
                            class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                            Agregar Empresa
                        </button>

                        <button type="button" wire:click="redirigir"
                            class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                            Cancelar
                        </button>
                    </div>
                </form>
            </form>
        </div>
    </div>
</body>
