<div>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Encabezado -->
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-gray-900">Editar Relación Encuesta - Pregunta</h1>
                <p class="mt-2 text-sm text-gray-700">Modifique la encuesta y la pregunta que desea relacionar.</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white shadow rounded-lg p-6">
                <div class="space-y-6">
                    @if (session()->has('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                        <!-- Selector de Encuesta -->
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Seleccionar Encuesta
                            </label>
                            <div class="relative">
                                <select
                                    wire:model="formData.encuestas_id"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md">
                                    <option value="">Seleccione una encuesta</option>
                                    @foreach($encuestas as $encuesta)
                                        <option value="{{ $encuesta->id }}">{{ $encuesta->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('formData.encuestas_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Selector de Pregunta -->
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Seleccionar Pregunta
                            </label>
                            <div class="relative">
                                <select
                                    wire:model="formData.preguntas_id"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md">
                                    <option value="">Seleccione una pregunta</option>
                                    @foreach($preguntas as $pregunta)
                                        <option value="{{ $pregunta->id }}">{{ $pregunta->texto }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('formData.preguntas_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                        <a
                            href="{{ route('portal360.encpre.encuesta-pregunta-encpre-empresa.mostrar-encuesta-pregunta-encpre-empresa') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancelar
                        </a>
                        <button
                            wire:click="actualizarEmpresa"
                            type="button"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>