<div>
    <!-- Título con fondo degradado -->
    <div class="bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] text-white font-bold text-xl py-4 px-6 rounded-t-lg">
        <h1 class="text-center text-2xl sm:text-3xl font-bold text-white">Agregar Nota (Golden Admin)</h1>
    </div>

    <!-- Formulario con fondo blanco y sombras -->
    <div class="bg-white rounded-b-lg p-6">
        <div>
            <!-- Campo para la descripción de la nota -->
            <div class="my-2">
                <label for="notadescripcion" class="text-gray-700 font-bold text-xl">Descripción</label>
                <input type="text" wire:model="notadescripcion"
                    class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black"
                    id="notadescripcion" placeholder="Ingrese la descripción de la nota">
                @error('notadescripcion')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Select para activos de tecnología -->
            <div class="my-2">
                <label for="activosTecnologiaSeleccionados" class="text-gray-700 font-bold text-xl">Activo de Tecnología</label>
                <select wire:model="activosTecnologiaSeleccionados" 
                    class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-gray-500">
                    <option value="">Seleccione un activo de tecnología</option>
                    @foreach ($activosTecnologia as $activo)
                        <option value="{{ $activo->id }}">
                            {{ $activo->nombre }} - {{ $activo->descripcion }} 
                            (Empresa: {{ $activo->empresa->nombre ?? 'N/A' }}, Sucursal: {{ $activo->sucursal->nombre_sucursal ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
                @error('activosTecnologiaSeleccionados')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-center mt-4 space-x-4">
                <button wire:click="agregarNotatec()"
                    class="bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] text-white px-6 py-2 rounded-lg shadow-lg font-bold hover:bg-[#1763A6]">
                    Guardar
                </button>
                <button wire:click="closeModal"
                    class="bg-gray-500 text-white px-6 py-2 rounded-lg shadow-lg font-bold hover:bg-gray-600">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>