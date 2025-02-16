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

        <div class="space-y-6">

        <!-- Empresa -->
        <div>
            <label for="empresa" class="block text-sm font-semibold text-gray-700">Empresa</label>
            <select id="empresa" wire:model.live="empresa" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Seleccione una empresa</option>
                @forelse($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                 @empty
                @endforelse
            </select>
            @error('empresa') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

            <!-- Sucursal -->
            <div>
                <label for="sucursal" class="block text-sm font-semibold text-gray-700">Sucursal</label>
                <select id="sucursal" wire:model.live="sucursal" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Seleccione una sucursal</option>
                    @forelse($sucursales as $sucursal)
                        <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
                    @empty
                    @endforelse
                </select>
                @error('sucursal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Departamento -->
            <div>
                <label for="departamento" class="block text-sm font-semibold text-gray-700">Departamento</label>
                <select id="departamento" wire:model.live="departamento" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Seleccione un departamento</option>
                    @forelse($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nombre_departamento }}</option>
                    @empty
                    @endforelse
                </select>
                @error('departamento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Actividades -->
            <div>
                <label for="Actividades" class="block text-sm font-semibold text-gray-700">Actividades</label>
                <textarea id="Actividades" wire:model="Actividades" required
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                @error('Actividades') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Fechas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Fecha de Inicio -->
                <div>
                    <label for="FechaInicio" class="block text-sm font-semibold text-gray-700">Fecha de Inicio</label>
                    <input type="date" id="FechaInicio" wire:model="FechaInicio" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('FechaInicio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Fecha de Cierre -->
                <div>
                    <label for="FechaFinal" class="block text-sm font-semibold text-gray-700">Fecha de Cierre</label>
                    <input type="date" id="FechaFinal" wire:model="FechaFinal" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('FechaFinal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Número de Trabajadores -->
            <div>
                <label for="NumeroEncuestas" class="block text-sm font-semibold text-gray-700">Número de Trabajadores</label>
                <input type="number" id="NumeroEncuestas" wire:model.live="NumeroEncuestas" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       min="1">
                @error('NumeroEncuestas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Cuestionarios -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">Seleccionar Cuestionarios</label>
                <div class="space-y-4">
                    @foreach($cuestionarios as $cuestionario)
                        <div class="flex items-center space-x-3">
                            <label for="cuestionario{{ $cuestionario->id }}" class="flex items-center cursor-pointer">
                                <input
                                    type="checkbox"
                                    id="cuestionario{{ $cuestionario->id }}"
                                    wire:model="cuestionariosSeleccionados.{{ $cuestionario->id }}"
                                    class="form-checkbox h-5 w-5 text-blue-600 rounded focus:ring-blue-500"
                                >
                                <span class="ml-2 text-gray-700">{{ $cuestionario->Nombre }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('cuestionariosSeleccionados') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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

            <!-- Botón de Guardar Encuesta -->
            <div class="mt-6 flex justify-center">
                <button type="button" wire:click="submit"
                        class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none">
                    Guardar Encuesta
                </button>
            </div>
        </div>
    </div>
</div>
