<div class="my-5">
        <div class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold text-xl py-4 px-6 rounded-t-lg shadow-md">
            <h1 class="text-center text-2xl sm:text-3xl font-bold text-white">Nota</h1>
            
                <form wire:submit.prevent="agregarNotatec" class="w-full bg-gradient-to-r from-purple-600 to-indigo-600"> <!-- Aseguramos que el formulario ocupe todo el ancho -->
                        <label for="notadescripcion" class="text-white font-bold text-xl">Descripcion</label>
                        <input type="text" wire:model="notadescripcion" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-white text-black" id="nombretipo" placeholder="">
                        @error('notadescripcion') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
    
                    <!-- Submit Button -->
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="bg-[#752174] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-lg font-bold hover:bg-[#913b8f] dark:hover:bg-indigo-500">Guardar</button>
                    </div>
                </form>
            
        </div>
</div>
