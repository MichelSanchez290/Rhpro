<body class="bg-gray-200">
    <div class="flex h-screen items-center justify-center">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-green-200 rounded-full md:p-4 p-2 border-2 border-green-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        class="w-8 h-8 text-white" stroke-linecap="round" stroke-linejoin="round" width="32"
                        height="32" stroke-width="2">
                        <path d="M3 21h9"></path>
                        <path d="M9 8h1"></path>
                        <path d="M9 12h1"></path>
                        <path d="M9 16h1"></path>
                        <path d="M14 8h1"></path>
                        <path d="M14 12h1"></path>
                        <path d="M5 21v-16c0 -.53 .211 -1.039 .586 -1.414c.375 -.375 .884 -.586 1.414 -.586h10c.53 0 1.039 .211 1.414 .586c.375 .375 .586 .884 .586 1.414v7">
                        </path>
                        <path d="M16 19h6"></path>
                        <path d="M19 16v6"></path>
                    </svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Registrar Departamento</h1>
                </div>
            </div>

            <form class="mt-5 mx-7">
                <!-- Nombre del Departamento -->
                <div class="grid grid-cols-1">
                    <label for="nombre_departamento"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre del
                        Departamento</label>
                    <input wire:model.defer="departamento.nombre_departamento" type="text" id="nombre_departamento"
                        placeholder="Nombre del departamento"
                        class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" />
                </div>

                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" wire:click="saveDepartament"
                        class='w-auto bg-green-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Agregar Departamento
                    </button>

                    <button type="button" wire:click="redirigir"
                        class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
