<div>
    <div class="bg-white shadow-md rounded-lg p-6 mx-4 my-6">
        <p class="text-center text-xl font-extrabold text-black md:text-3xl">
            Agregar Asignación
        </p>

        <!-- Select de Calificador -->
        <div class="mb-6">
            <label for="calificador_id" class="block text-sm font-medium text-gray-700 mb-2">
                Seleccionar Calificador
            </label>
            <select id="calificador_id" wire:model="calificador_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Seleccione un calificador --</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
            <x-input-error for="calificador_id" />
        </div>

        <!-- Select de Calificado -->
        <div class="mb-6">
            <label for="calificado_id" class="block text-sm font-medium text-gray-700 mb-2">
                Seleccionar Calificado
            </label>
            <select id="calificado_id" wire:model="calificado_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Seleccione un calificado --</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
            <x-input-error for="calificado_id" />
        </div>

        <!-- Select de Relación -->
        <div class="mb-6">
            <label for="relacion_id" class="block text-sm font-medium text-gray-700 mb-2">
                Seleccionar Relación
            </label>
            <select id="relacion_id" wire:model="relacion_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Seleccione una relación --</option>
                @foreach($relaciones as $relacion)
                    <option value="{{ $relacion->id }}">{{ $relacion->nombre }}</option>
                @endforeach
            </select>
            <x-input-error for="relacion_id" />
        </div>

        <!-- Select de Encuesta -->
        <div class="mb-6">
            <label for="encuesta_id" class="block text-sm font-medium text-gray-700 mb-2">
                Seleccionar Encuesta
            </label>
            <select id="encuesta_id" wire:model="encuesta_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Seleccione una encuesta --</option>
                @foreach($encuestas as $encuesta)
                    <option value="{{ $encuesta->id }}">{{ $encuesta->nombre }}</option>
                @endforeach
            </select>
            <x-input-error for="encuesta_id" />
        </div>

        <!-- Fecha de Realización -->
        <div class="mb-6">
            <label for="realizada" class="block text-sm font-medium text-gray-700 mb-2">
                Fecha de Realización
            </label>
            <input type="datetime-local" id="realizada" wire:model="realizada" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <x-input-error for="realizada" />
        </div>

        <!-- Botón Guardar -->
        <div>
            <button wire:click="saveAsignacion" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded">
                Guardar Asignación
            </button>
        </div>

        <!-- Mensajes de éxito/error -->
        @if (session()->has('success'))
            <div class="mt-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mt-4 p-4 bg-red-100 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>