<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Botón Agregar -->
    <div class="mt-4 flex justify-end">
        <button wire:click="redirigir()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
            Agregar
        </button>
    </div>
    <section class="antialiased bg-gray-100 text-gray-600 mt-6 px-4">
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <div class="max-w-2xl mx-auto mt-6">
                    <!-- Contenedor del buscador y selector -->
                    <div class="flex items-center space-x-4 px-5 py-4">
                        <!-- Input de búsqueda -->
                        <div class="relative w-full">
                            <label for="simple-search" class="sr-only">Buscar</label>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        d="M9 3a7 7 0 100 14 7 7 0 000-14zM2 9a7 7 0 1113.867 4.803l4.234 4.234a1 1 0 01-1.414 1.414l-4.234-4.234A7 7 0 012 9z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </div>
                            <input
                                type="text"
                                wire:model="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                placeholder="Buscar..."
                            />
                        </div>
    
                        <!-- Selector de cantidad por página -->
                        <div>
                            <label for="porpagina" class="sr-only">Por Página</label>
                            <select
                                wire:model="porpagina"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-4.5"
                            >
                                <option value="5">5 por página</option>
                                <option value="10">10 por página</option>
                                <option value="15">15 por página</option>
                            </select>
                        </div>
                    </div>
                </div>
    
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Funciones Específicas</h2>
                </header>
    
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-700 bg-blue-50">
                                <tr>
                                    <th class="p-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Nombre</div>
                                    </th>
                                    <th class="p-3 whitespace-nowrap">
                                        <div class="font-semibold text-center">Acciones</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-200">
                                @forelse($funciones as $funcion)
                                    <tr>
                                        <td class="p-3 whitespace-normal">
                                            <div class="text-gray-800">{{ $funcion->nombre }}</div>
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center space-x-4 cursor-pointer">
                                                <a href="{{route('editarFuncionesEspecificas', Crypt::encrypt($funcion->id))}}" class="text-blue-600 hover:text-blue-800">Editar</a>
                                                <button wire:click="delete({{ $funcion->id }})" class="text-red-600 hover:text-red-800">Eliminar</button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="lg:col-span-5 sm:col-span-4 col-span-1 text-center">
                                        <span class="ml-6  text-gray-400 text-4xl font-extrabold">
                                            Sin resultados para la busqueda "{{ $this->search }}"
                                        </span>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
    
                        @if ($funciones->count())
                            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                {{ $funciones->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>    

    <div class="mt-6 bg-white shadow-lg rounded-lg border border-gray-200 overflow-hidden">
        <livewire:portalcapacitacion.funcionesespecificas.funcion-especifica-table/>
    </div>
</div>
