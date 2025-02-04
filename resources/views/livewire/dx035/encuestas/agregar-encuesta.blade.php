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

        <!-- Contenedor del formulario sin etiqueta <form> -->
        <div class="space-y-6">
            <!-- Sección de Información Básica -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
            </div>

            <!-- Sección de Fechas -->
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

            <!-- Encuestas Contestadas -->
            <div>
                <label for="EncuestasContestadas" class="block text-sm font-semibold text-gray-700">Encuestas Contestadas</label>
                <input type="text" id="EncuestasContestadas" wire:model="EncuestasContestadas"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('EncuestasContestadas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Actividades -->
            <div>
                <label for="Actividades" class="block text-sm font-semibold text-gray-700">Actividades</label>
                <textarea id="Actividades" wire:model="Actividades"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                @error('Actividades') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Número -->
            <div>
                <label for="Numero" class="block text-sm font-semibold text-gray-700">Número</label>
                <input type="number" id="Numero" wire:model="Numero"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('Numero') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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

            <!-- Cerrable -->
            <div>
                <label for="Cerrable" class="block text-sm font-semibold text-gray-700">Cerrable</label>
                <select id="Cerrable" wire:model="Cerrable" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
                @error('Cerrable') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Correo Electrónico -->
            <div>
                <label for="usuariosdx035_CorreoElectronico" class="block text-sm font-semibold text-gray-700">Correo Electrónico</label>
                <input type="email" id="usuariosdx035_CorreoElectronico" wire:model="usuariosdx035_CorreoElectronico" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('usuariosdx035_CorreoElectronico') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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

            <!-- Selección de Cuestionarios -->
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
