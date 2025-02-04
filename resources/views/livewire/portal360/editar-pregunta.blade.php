<div>
    <form wire:submit.prevent="editRelaciones">
        <!-- Campo para el texto de la pregunta -->
        <div class="mb-4">
            <label for="texto" class="block text-sm font-medium text-gray-700">
                Texto de la Pregunta
            </label>
            <textarea
                id="texto"
                wire:model="texto"
                rows="4"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Ingrese el texto de la pregunta..."></textarea>
            @error('texto')
            <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo para la descripción -->
        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">
                Descripción
            </label>
            <textarea
                id="descripcion"
                wire:model="descripcion"
                rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Ingrese la descripción..."></textarea>
            @error('descripcion')
            <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botón para guardar cambios -->
        <div class="mt-4">
            <button
                type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar Cambios
            </button>
        </div>
    </form>

    <!-- Notificaciones de éxito o error -->
    @if (session()->has('message'))
    <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('message') }}
    </div>
    @endif

    @if (session()->has('error'))
    <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        {{ session('error') }}
    </div>
    @endif
</div>