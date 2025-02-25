<div>
    <div class="flex min-h-screen items-center justify-center py-3">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path fill="#ffffff"
                            d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                    </svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Solicitar Incidencia</h1>
                </div>
            </div>

            <form class="mt-5 mx-7">
                <!-- Nombre del puesto -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="tipo_incidencia"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de
                        Incidencia</label>
                    <input wire:model.defer="incidencia.tipo_incidencia" type="text" id="tipo_incidencia"
                        placeholder="Permiso, vacaciones o incidencia"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                    <x-input-error for="incidencia.tipo_incidencia" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="fecha_inicio"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Fecha Inicio
                        </label>
                        <input wire:model.defer="incidencia.fecha_inicio" type="date" id="fecha_inicio"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
    
    
                        <x-input-error for="incidencia.fecha_inicio" />
                    </div>
    
                    <div class="grid grid-cols-1 mt-5">
                        <label for="fecha_final"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Fecha Final
                        </label>
                        <input wire:model.defer="incidencia.fecha_final" type="date" id="fecha_final"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
    
    
                        <x-input-error for="incidencia.fecha_final" />
                    </div>    
                </div>
                
                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" wire:click="saveIncidencia"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Agregar
                    </button>

                    <button type="button" wire:click="redirigirIncidencia"
                        class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
