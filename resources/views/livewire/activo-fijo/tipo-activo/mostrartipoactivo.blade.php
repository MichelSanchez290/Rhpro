<div>
    <!-- Modal de Confirmación -->
    <div x-data="{ open: @entangle('showConfirmModal') }">
        <div x-show="open"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-xl w-96 z-50">
                <h2 class="text-lg font-bold mb-4">¿Confirmar eliminación?</h2>
                <p>¿Estás seguro de que deseas eliminar este activo? Esta acción no se puede deshacer.</p>
                
                <div class="mt-4 flex justify-end space-x-2">
                    <button @click="open = false" class="px-4 py-2 bg-gray-500 text-white rounded">Cancelar</button>
                    <button wire:click="deleteTipoActivo" class="px-4 py-2 bg-red-600 text-white rounded">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Título con fondo degradado y sombra -->
    <div
        class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-xl py-4 px-6 rounded-t-lg shadow-lg flex items-center justify-between">
        <span>Activos de Inventario</span>
        <div class="flex items-center space-x-4">
            <!-- Botón Agregar -->
            <button onclick="window.location.href='{{ route('agregartipoactivo') }}'"
                class="text-white font-bold p-2 rounded-md flex items-center justify-center hover:bg-purple-700 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Contenedor de la tabla con fondo blanco y sombras -->
    <div class="bg-white rounded-b-lg shadow-2xl p-6 mt-2">
        <livewire:activo-table />
    </div>
</div>

