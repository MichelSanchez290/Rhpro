<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-md">
            <!-- Encabezado -->
            <header class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-blue-800">Editar Encuesta</h2>
                <p class="mt-2 text-sm text-gray-600">Actualice los datos de la encuesta.</p>
            </header>

            <!-- Formulario -->
            <form wire:submit.prevent="saveEncuestaAdministrador" class="space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Empresa -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-2">Empresa</label>
                        <select
                            wire:model.live="encuesta.empresa_id"
                            class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            <option value="">Seleccione una empresa</option>
                            @foreach($empresas as $empresa)
                            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
                        @error('encuesta.empresa_id')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Sucursal -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-2">Sucursal</label>
                        <select
                            wire:model="encuesta.sucursal_id"
                            class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                            @if(!$encuesta['empresa_id']) disabled @endif>
                            <option value="">Seleccione una sucursal</option>
                            @foreach($sucursales as $sucursal)
                            <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
                            @endforeach
                        </select>
                        @error('encuesta.sucursal_id')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nombre -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-2">Nombre</label>
                        <input
                            type="text"
                            wire:model="encuesta.nombre"
                            class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                            placeholder="Ingrese el nombre de la encuesta...">
                        @error('encuesta.nombre')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-2">Descripción</label>
                        <textarea
                            wire:model="encuesta.descripcion"
                            rows="3"
                            class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                            placeholder="Ingrese la descripción..."></textarea>
                        @error('encuesta.descripcion')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Indicaciones -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-2">Indicaciones</label>
                        <textarea
                            wire:model="encuesta.indicaciones"
                            rows="3"
                            class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                            placeholder="Ingrese las indicaciones..."></textarea>
                        @error('encuesta.indicaciones')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('portal360.encuesta.encuesta-administrador.mostrar-encuesta-administrador') }}"
                        class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                        </svg>
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>