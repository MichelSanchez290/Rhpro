<div class="my-5">
    <!-- Main container for the form -->
    <div class="container mx-auto w-full sm:max-w-md md:max-w-lg lg:max-w-xl dark:bg-dark py-4 px-6 sm:px-10 bg-white dark:bg-gray-800 rounded-md relative border-2 border-[#752174]"> <!-- Eliminar max-w-full para usar w-full -->

        <!-- Título con fondo degradado -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-xl py-4 px-6 rounded-t-lg shadow-md">
            <h1 class="text-center text-2xl sm:text-3xl font-bold text-white">Crear un nuevo Activo</h1>
        </div>

        <div class="my-3">
            <form wire:submit.prevent="agregarTipoActivo" class="w-full"> <!-- Aseguramos que el formulario ocupe todo el ancho -->
            
                <!-- Input field for 'Nombre del Activo' -->
                <div class="my-2">
                    <label for="nombretipo" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Nombre del Activo</label>
                    <input type="text" wire:model="nombretipo" class="block w-full border-2 border-[#752174] outline-[#752174] px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="nombretipo" placeholder="Ingresa el nombre del activo">
                    @error('nombretipo') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center mt-4">
                    <button type="submit" class="bg-[#752174] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-lg font-bold hover:bg-[#913b8f] dark:hover:bg-indigo-500">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
