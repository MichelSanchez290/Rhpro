<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100">
            <header class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-blue-800">Editar</h2>
                <p class="mt-2 text-sm text-gray-600">Actualice la información de relaciones laborales</p>
            </header>

            <form wire:submit.prevent="editarRelacionesAdministrador" class="space-y-8">
                <div class="grid gap-6">
                    <!-- Nombre -->
                    <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                        <label class="block text-sm font-medium text-blue-700 mb-4">Nombre</label>
                        <input type="text"
                            wire:model="nombre"
                            class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                            placeholder="Ingrese el nombre">
                        @error('nombre')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('portal360.relaciones.relaciones-administrador.mostrar-relacion-administrador') }}"
                        class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                        Actualizar Relaciones
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>