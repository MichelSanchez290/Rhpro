<div>
    <!-- Título con fondo degradado -->
    <div class="bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] text-white font-bold text-xl py-4 px-6 rounded-t-lg">
        <h1 class="text-center text-2xl sm:text-3xl font-bold text-white">Nota</h1>
    </div>

    <!-- Formulario con fondo blanco y sombras -->
    <div class="bg-white rounded-b-lg">
        <form wire:submit.prevent="agregarNotatec">
            <!-- Campo para la descripción de la nota -->
            <div class="my-2">
                <label for="notadescripcion" class="text-gray-700 font-bold text-xl">Descripción</label>
                <input type="text" wire:model="notadescripcion" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black" id="notadescripcion" placeholder="Ingrese la descripción">
                @error('notadescripcion')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Campo para seleccionar los activos de tecnología -->
            <div class="my-2">
                <label for="activosTecnologiaSeleccionados" class="text-gray-700 font-bold text-xl">Activos de Tecnología</label>
                <select wire:model="activosTecnologiaSeleccionados" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black" multiple>
                    @foreach ($activosTecnologia as $activo)
                        <option value="{{ $activo->id }}">{{ $activo->nombre }}</option>
                    @endforeach
                </select>
                @error('activosTecnologiaSeleccionados')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón de Guardar -->
            <div class="flex justify-center mt-4">
                <button type="submit" class="bg-[#752174] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-lg font-bold hover:bg-[#913b8f] dark:hover:bg-indigo-500">Guardar</button>
            </div>
        </form>
    </div>
</div>