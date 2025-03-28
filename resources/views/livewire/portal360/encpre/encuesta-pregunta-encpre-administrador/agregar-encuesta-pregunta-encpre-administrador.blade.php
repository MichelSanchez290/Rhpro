<div class="min-h-screen py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Encabezado -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Agregar Pregunta a Encuesta</h1>
            <p class="mt-2 text-sm text-gray-600">Siga los pasos en orden: empresa, sucursal, encuesta y preguntas.</p>
        </div>

        <!-- Formulario -->
        <div class="bg-white shadow-lg rounded-xl p-6">
            <div class="space-y-8">
                <!-- Selectores -->
                <div class="grid gap-6">
                    <!-- Empresa -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            1. Seleccionar Empresa
                        </label>
                        <select
                            wire:model.live="formData.empresa_id"
                            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
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
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            2. Seleccionar Sucursal
                        </label>
                        <select
                            wire:model.live="formData.sucursal_id"
                            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
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
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            3. Seleccionar Encuesta
                        </label>
                        <select
                            wire:model.live="formData.encuestas_id"
                            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
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

                    <!-- Preguntas -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            4. Seleccionar Preguntas
                        </label>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="busquedaPreguntas"
                            placeholder="Buscar preguntas..."
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 mb-4"
                            @if(empty($formData['encuestas_id'])) disabled @endif>
                        <div class="flex space-x-2 mb-4">
                            <button
                                wire:click="seleccionarTodasPreguntas"
                                type="button"
                                class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 disabled:opacity-50"
                                @if($preguntas->isEmpty()) disabled @endif>
                                Seleccionar Todo
                            </button>
                            <button
                                wire:click="deseleccionarTodasPreguntas"
                                type="button"
                                class="px-3 py-1 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 disabled:opacity-50"
                                @if($preguntas->isEmpty()) disabled @endif>
                                Deseleccionar Todo
                            </button>
                        </div>
                        <div class="max-h-64 overflow-y-auto border border-gray-200 rounded-md p-3 bg-gray-50">
                            @if(empty($formData['encuestas_id']))
                            <p class="text-sm text-gray-500">Primero seleccione una encuesta</p>
                            @elseif($preguntas->isEmpty())
                            <p class="text-sm text-amber-600">No hay preguntas disponibles</p>
                            @else
                            @foreach($preguntas as $index => $pregunta)
                            <div class="flex items-center py-1">
                                <input
                                    type="checkbox"
                                    wire:model.live="formData.preguntas_id"
                                    value="{{ $pregunta->id }}"
                                    id="pregunta_{{ $pregunta->id }}"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="pregunta_{{ $pregunta->id }}" class="ml-2 text-sm text-gray-900">
                                    {{ $index + 1 }}. {{ $pregunta->texto }}
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

                <!-- Botones -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a
                        href="{{ route('portal360.encpre.encuesta-pregunta-encpre-administrador.mostrar-encuesta-pregunta-encpre-administrador') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:ring-2 focus:ring-blue-500">
                        Cancelar
                    </a>
                    <button
                        wire:click="guardarAdministracion"
                        type="submit"
                        wire:loading.attr="disabled"
                        @if(empty($formData['encuestas_id']) || $preguntas->isEmpty()) disabled @endif
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span wire:loading.remove>Guardar</span>
                        <span wire:loading>Guardando...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>