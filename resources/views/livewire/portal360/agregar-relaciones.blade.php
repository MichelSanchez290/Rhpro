<div>
    <div class="w-full max-w-4xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 p-8">
        <header class="px-5 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Agregar Nuevas Relaciones</h2>
        </header>

        <form wire:submit.prevent="saveRelaciones" class="space-y-6 p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nombre -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" 
                           wire:model="relaciones.nombre"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('relaciones.nombre') 
                        <span class="text-red-500 text-xs">{{ $message }}</span> 
                    @enderror
                </div>

            <div class="flex justify-end space-x-4">
                <button type="button" 
                        wire:click="$emit('closeModal')"
                        class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">
                    Cancelar
                </button>
                <button type="submit" 
                        class="bg-blue-700 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                    Guardar Cliente
                </button>
            </div>
        </form>
    </div>
</div>