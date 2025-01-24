<div>

    <div class="w-full mt-1 flex justify-end mr-5">
        <button wire:click="redirigirRelaciones()" class="bg-blue-700 text-white font-bold py-2 px-4 w-auto rounded hover:bg-gray-600">
            Agregar Nuevo Usuario
        </button>
    </div>
    <section class="antialiased bg-gray-100 text-gray-600 mt-6  px-4">
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Usuarios</h2>
                    <div class="relative">
                        <input class="appearance-none border-2 pl-10 border-gray-300 hover:border-gray-400 transition-colors rounded-md w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:ring-purple-600 focus:border-purple-600 focus:shadow-outline" id="id"
                            wire:model.live="search"
                            type="text"
                            placeholder="Search..." />
                        <div class="absolute right-0 inset-y-0 flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="-ml-1 mr-3 h-5 w-5 text-gray-400 hover:text-gray-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>

                        <div class="absolute left-0 inset-y-0 flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 ml-3 text-gray-400 hover:text-gray-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Nombre</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Acciones</div>
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse($relacionesuser as $user)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800">{{ $user->nombre }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <button wire:click="deleteRelaciones({{$user->id}})" class="text-blue-600 hover:text-blue-800"> Eliminar</button>
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
                        @if ($relacionesuser->count())
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $relacionesuser->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>