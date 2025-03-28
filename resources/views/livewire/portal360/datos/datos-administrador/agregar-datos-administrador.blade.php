<div>
    <div class="p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <!-- Header with Title and Back Button -->
            <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-4">
                <h2 class="text-xl font-bold text-gray-900">Agregar Nuevos Datos</h2>
                <!-- <button wire:click="cancelar" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button> -->
            </div>
            
            <!-- Flash Messages -->
            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            @if (session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            
            <!-- Form -->
            <form wire:submit.prevent="save">
                <div class="grid grid-cols-1 gap-6">
                    <!-- Nombre Field -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre *</label>
                        <input 
                            type="text" 
                            id="nombre" 
                            wire:model="nombre" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('nombre') border-red-500 @enderror"
                            placeholder="Ingrese el nombre">
                        @error('nombre')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Descripción Field -->
                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea 
                            id="descripcion" 
                            wire:model="descripcion" 
                            rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            placeholder="Ingrese una descripción (opcional)"></textarea>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="mt-6 flex justify-end space-x-4">
                    <a 
                        href="{{ route('portal360.datos.datos-administrador.mostrar-datos-administrador') }}"
                        type="button" 
                        wire:click="cancelar"
                        class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancelar
                    </a>
                    <button 
                        type="submit" 
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>