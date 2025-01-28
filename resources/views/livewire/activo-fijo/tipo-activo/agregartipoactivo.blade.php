<div class="my-5">
    <!-- Main container for the form -->  
        <!-- Título con fondo degradado -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-xl py-4 px-6 rounded-t-lg shadow-md">
            <h1 class="text-center text-2xl sm:text-3xl font-bold text-white">Crear un nuevo Activo</h1>
            
                <form wire:submit.prevent="agregarTipoActivo" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600"> <!-- Aseguramos que el formulario ocupe todo el ancho -->
                        <label for="nombretipo" class="text-white font-bold text-xl">Nombre del Activo</label>
                        <input type="text" wire:model="nombretipo" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-white text-black" id="nombretipo" placeholder="Ingresa el nombre del activo">
                        @error('nombretipo') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
    
                    <!-- Submit Button -->
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="bg-[#752174] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-lg font-bold hover:bg-[#913b8f] dark:hover:bg-indigo-500">Guardar</button>
                    </div>
                </form>
            
        </div>
</div>
