<div>
    <!-- Banner con botones -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-xl py-4 px-6 rounded-t-lg shadow-md flex items-center justify-between">
        <span>Activos de Inventario</span>
        <div class="flex items-center space-x-4">
            <!-- Botón Agregar -->
            <button wire:click="redirigir()"
                class=" text-white font-bold p-2 rounded-md flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
            <!-- Botón Editar -->
            <button onclick="alert('Editar')"
                class="text-white font-bold p-2 rounded-md flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Tabla de datos -->
    <div class="overflow-x-auto dark:bg-dark rounded-lg p-4">
        <livewire:activo-table />
    </div>
</div>
