<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <!-- Formulario con sombras y bordes mejorados -->
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100">
            <div class="space-y-8">
                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-bold text-blue-800">Editar Relación Encuesta - Pregunta</h1>
                    <p class="mt-2 text-sm text-gray-600">Modifique los campos necesarios para actualizar la relación.</p>
                </div>

                <!-- Selectores con estilo mejorado -->
                <div class="grid gap-6">
                    <!-- Empresa -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-2">
                            1. Seleccionar Empresa
                        </label>
                        <select
                            wire:model.live="formData.empresa_id"
                            class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            <option value="">Seleccione una empresa</option>
                            @foreach($empresas as $empresa)
                            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
                        @error('formData.empresa_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sucursal -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-2">
                            2. Seleccionar Sucursal
                        </label>
                        <select
                            wire:model.live="formData.sucursal_id"
                            class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                            @if(empty($formData['empresa_id'])) disabled @endif>
                            <option value="">Seleccione una sucursal</option>
                            @foreach($sucursales as $sucursal)
                            <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
                            @endforeach
                        </select>
                        @if(empty($formData['empresa_id']))
                        <p class="mt-1 text-sm text-gray-500">Primero seleccione una empresa</p>
                        @elseif($sucursales->isEmpty())
                        <p class="mt-1 text-sm text-amber-600">No hay sucursales disponibles</p>
                        @endif
                        @error('formData.sucursal_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Encuesta -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-2">
                            3. Seleccionar Encuesta
                        </label>
                        <select
                            wire:model.live="formData.encuestas_id"
                            class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                            @if(empty($formData['sucursal_id'])) disabled @endif>
                            <option value="">Seleccione una encuesta</option>
                            @foreach($encuestas as $encuesta)
                            <option value="{{ $encuesta->id }}">{{ $encuesta->nombre }}</option>
                            @endforeach
                        </select>
                        @if(empty($formData['sucursal_id']))
                        <p class="mt-1 text-sm text-gray-500">Primero seleccione una sucursal</p>
                        @elseif($encuestas->isEmpty())
                        <p class="mt-1 text-sm text-amber-600">No hay encuestas disponibles</p>
                        @endif
                        @error('formData.encuestas_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Preguntas con diseño mejorado -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-2">
                            4. Buscar Preguntas
                        </label>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="busquedaPreguntas"
                            placeholder="Buscar preguntas..."
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 mb-4 transition-all duration-300"
                            @if(empty($formData['encuestas_id'])) disabled @endif>
                        <div class="flex space-x-2 mb-4">
                            <button
                                wire:click="seleccionarTodasPreguntas"
                                type="button"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300 disabled:opacity-50 shadow-sm"
                                @if($preguntas->isEmpty()) disabled @endif>
                                Seleccionar Todo
                            </button>
                            <button
                                wire:click="deseleccionarTodasPreguntas"
                                type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors duration-300 disabled:opacity-50 shadow-sm"
                                @if($preguntas->isEmpty()) disabled @endif>
                                Deseleccionar Todo
                            </button>
                        </div>
                        <div class="max-h-64 overflow-y-auto border border-gray-200 rounded-lg p-4 bg-gray-50 shadow-inner">
                            @if(empty($formData['encuestas_id']))
                            <p class="text-sm text-gray-500">Primero seleccione una encuesta</p>
                            @elseif($preguntas->isEmpty())
                            <p class="text-sm text-amber-600">No hay preguntas disponibles</p>
                            @else
                            @foreach($preguntas as $index => $pregunta)
                            <div class="flex items-start py-2 hover:bg-blue-50 transition-colors duration-200 rounded px-2">
                                <input
                                    type="checkbox"
                                    wire:model.live="formData.preguntas_id"
                                    value="{{ $pregunta->id }}"
                                    id="pregunta_{{ $pregunta->id }}"
                                    class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mt-0.5">
                                <label for="pregunta_{{ $pregunta->id }}" class="ml-3 text-sm text-gray-900">
                                    <span class="font-medium">{{ $index + 1 }}.</span> {{ $pregunta->texto }}
                                </label>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        @error('formData.preguntas_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botones con estilo mejorado -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a
                    href="{{ route('portal360.encpre.encuesta-pregunta-encpre-administrador.mostrar-encuesta-pregunta-encpre-administrador') }}"
                    class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                    Cancelar
                    </a>
                    <button
                        wire:click="actualizarAdministrador"
                        type="submit"
                        wire:loading.attr="disabled"
                        @if(empty($formData['encuestas_id']) || empty($formData['preguntas_id'])) disabled @endif
                        class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed shadow-sm">
                        <span wire:loading.remove>Actualizar</span>
                        <span wire:loading>
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Actualizando...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>