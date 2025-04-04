<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Encabezado con estilo mejorado -->

        <!-- Formulario con sombras y bordes mejorados -->
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100">
            <form wire:submit.prevent="saveRelaciones" class="space-y-8">
                <div class="grid gap-6">
                    <div class="mb-8 text-center">
                        <h1 class="text-3xl font-bold text-blue-800">Agregar Relaciones</h1>
                        <p class="mt-2 text-sm text-gray-600">Complete el formulario para agregar una nueva relación.</p>
                    </div>
                    <!-- Nombre -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-4">
                            Nombre
                        </label>
                        <input type="text"
                            wire:model="relaciones.nombre"
                            class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                            placeholder="Ingrese el nombre">
                        @error('relaciones.nombre')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botones con estilo mejorado -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('portal360.relaciones.relaciones-administrador.mostrar-relacion-administrador') }}"
                        class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                        Guardar Relaciones
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>