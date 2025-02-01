<div class="bg-white shadow-lg rounded-lg p-8 max-w-5xl mx-auto">
    <div>
        <!-- Título centrado y con color personalizado -->
        <h2 class="text-4xl font-bold text-blue-600 mb-8 text-center">Agregar Encuesta</h2>

        <!-- Mensaje de éxito -->
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="submit" class="space-y-6">
            <!-- Clave -->
            <div>
                <label for="Clave" class="block text-sm font-semibold text-gray-700">Clave</label>
                <input type="text" id="Clave" wire:model="Clave" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('Clave') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Empresa -->
            <div>
                <label for="Empresa" class="block text-sm font-semibold text-gray-700">Empresa</label>
                <input type="text" id="Empresa" wire:model="Empresa" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('Empresa') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Selección de Cuestionarios -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">Seleccionar Cuestionarios</label>
                <div class="space-y-4">
                    <!-- Cuestionario 1 -->
                    <div class="flex items-center space-x-3">
                        <label for="cuestionario1" class="flex items-center cursor-pointer">
                            <input type="checkbox" id="cuestionario1" wire:model="cuestionariosSeleccionados.1"
                                   class="peer hidden" value="1">
                            <div class="switch-bg w-12 h-6 bg-gray-300 rounded-full relative">
                                <div class="switch-circle w-6 h-6 bg-blue-500 rounded-full absolute left-0
                                    {{ $cuestionariosSeleccionados[1] ? 'left-6' : 'left-0' }}
                                    transition-all duration-300 ease-in-out"></div>
                            </div>
                            <span class="ml-2 text-gray-700">Cuestionario 1</span>
                        </label>
                    </div>

                    <!-- Cuestionario 2 -->
                    <div class="flex items-center space-x-3">
                        <label for="cuestionario2" class="flex items-center cursor-pointer">
                            <input type="checkbox" id="cuestionario2" wire:model="cuestionariosSeleccionados.2"
                                   class="peer hidden" value="2">
                            <div class="switch-bg w-12 h-6 bg-gray-300 rounded-full relative">
                                <div class="switch-circle w-6 h-6 bg-blue-500 rounded-full absolute left-0
                                    {{ $cuestionariosSeleccionados[2] ? 'left-6' : 'left-0' }}
                                    transition-all duration-300 ease-in-out"></div>
                            </div>
                            <span class="ml-2 text-gray-700">Cuestionario 2</span>
                        </label>
                    </div>

                    <!-- Cuestionario 3 -->
                    <div class="flex items-center space-x-3">
                        <label for="cuestionario3" class="flex items-center cursor-pointer">
                            <input type="checkbox" id="cuestionario3" wire:model="cuestionariosSeleccionados.3"
                                   class="peer hidden" value="3">
                            <div class="switch-bg w-12 h-6 bg-gray-300 rounded-full relative">
                                <div class="switch-circle w-6 h-6 bg-blue-500 rounded-full absolute left-0
                                    {{ $cuestionariosSeleccionados[3] ? 'left-6' : 'left-0' }}
                                    transition-all duration-300 ease-in-out"></div>
                            </div>
                            <span class="ml-2 text-gray-700">Cuestionario 3</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Fecha Inicio y Fecha Final en una línea -->
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="FechaInicio" class="block text-sm font-semibold text-gray-700">Fecha de Inicio</label>
                    <input type="date" id="FechaInicio" wire:model="FechaInicio" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('FechaInicio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2">
                    <label for="FechaFinal" class="block text-sm font-semibold text-gray-700">Fecha de Cierre</label>
                    <input type="date" id="FechaFinal" wire:model="FechaFinal"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('FechaFinal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Número de Encuestas -->
            <div>
                <label for="NumeroEncuestas" class="block text-sm font-semibold text-gray-700">Número de Encuestas</label>
                <input type="number" id="NumeroEncuestas" wire:model="NumeroEncuestas" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       min="0">
                @error('NumeroEncuestas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Departamentos -->
            <div>
                <label for="departamentosSeleccionados" class="block text-sm font-semibold text-gray-700">Departamentos</label>
                @if($departamentos->isEmpty())
                    <p class="mt-1 text-gray-500">No hay departamentos disponibles.</p>
                @else
                    <select multiple id="departamentosSeleccionados" wire:model="departamentosSeleccionados"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre_departamento }}</option>
                        @endforeach
                    </select>
                    @error('departamentosSeleccionados') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                @endif
            </div>

            <!-- Logo de la Empresa -->
            <div>
                <label for="logo" class="block text-sm font-semibold text-gray-700">Logo de la Empresa</label>
                <input type="file" id="logo" wire:model="logo"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('logo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <!-- Vista previa del logo -->
                @if ($logo)
                    <div class="mt-4">
                        <img src="{{ $logo->temporaryUrl() }}" alt="Vista previa del logo"
                             class="max-h-32 rounded border">
                    </div>
                @endif
            </div>

            <!-- Botón de Activar Encuesta -->
            <div class="mt-6 flex justify-center">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none">
                    Guardar Encuesta
                </button>
            </div>
        </form>
    </div>
</div>
