<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto space-y-8">
        <!-- Pregunta -->
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-md">
            <h2 class="text-2xl font-bold text-blue-800 text-center mb-6">Editar Pregunta</h2>
            <div class="space-y-6">
                <div>
                    <label for="texto" class="block text-sm font-medium text-blue-700 mb-2">Pregunta</label>
                    <textarea
                        id="texto"
                        wire:model.live="pregunta.texto"
                        rows="4"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="Ingrese el texto de la pregunta..."></textarea>
                    <x-input-error for="pregunta.texto" class="mt-1 text-sm text-red-600" />
                </div>
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-blue-700 mb-2">Descripción</label>
                    <textarea
                        id="descripcion"
                        wire:model.live="pregunta.descripcion"
                        rows="3"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="Ingrese la descripción..."></textarea>
                    <x-input-error for="pregunta.descripcion" class="mt-1 text-sm text-red-600" />
                </div>
            </div>
        </div>

        <!-- Respuestas -->
        @foreach ($respuestas as $index => $respuesta)
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-md">
            <h2 class="text-2xl font-bold text-blue-800 text-center mb-6">Respuesta {{ $index + 1 }}</h2>
            <div class="space-y-6">
                <div>
                    <label for="respuesta{{ $index + 1 }}" class="block text-sm font-medium text-blue-700 mb-2">Respuesta {{ $index + 1 }}</label>
                    <textarea
                        id="respuesta{{ $index + 1 }}"
                        wire:model.live="respuestas.{{ $index }}.texto"
                        rows="3"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="Ingrese la respuesta {{ $index + 1 }}..."></textarea>
                    <x-input-error for="respuestas.{{ $index }}.texto" class="mt-1 text-sm text-red-600" />
                </div>
                <div>
                    <label for="puntuacion{{ $index + 1 }}" class="block text-sm font-medium text-blue-700 mb-2">Puntuación (1-4)</label>
                    <input
                        type="number"
                        id="puntuacion{{ $index + 1 }}"
                        wire:model.live="respuestas.{{ $index }}.puntuacion"
                        min="1"
                        max="4"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="Ingrese la puntuación (1-4)...">
                    <x-input-error for="respuestas.{{ $index }}.puntuacion" class="mt-1 text-sm text-red-600" />
                </div>
            </div>
        </div>
        @endforeach

        <!-- Empresa -->
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-md">
            <label for="empresa_id" class="block text-sm font-medium text-blue-700 mb-2">Empresa</label>
            <select
                id="empresa_id"
                wire:model.live="empresa_id"
                class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                <option value="">Seleccione una empresa</option>
                @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                @endforeach
            </select>
            <x-input-error for="empresa_id" class="mt-1 text-sm text-red-600" />
        </div>

        <!-- Sucursal -->
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-md">
            <label for="sucursal_id" class="block text-sm font-medium text-blue-700 mb-2">Sucursal</label>
            <select
                id="sucursal_id"
                wire:model.live="sucursal_id"
                class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                @if(!$empresa_id) disabled @endif>
                <option value="">Seleccione una sucursal</option>
                @foreach($sucursales as $sucursal)
                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
                @endforeach
            </select>
            <x-input-error for="sucursal_id" class="mt-1 text-sm text-red-600" />
        </div>

        <!-- Botones -->
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100">
            <button
                wire:click="editarPreguntaAdmin"
                class="w-full flex justify-center items-center px-5 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                Guardar Pregunta
            </button>
        </div>
    </div>
</div>