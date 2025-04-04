<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Botón Agregar Relaciones -->
        <div class="flex justify-end mb-6">
            <button wire:click="redirigirRelaciones()"
                class="flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
                Agregar Relaciones
            </button>
        </div>

        <!-- Tabla -->
        <section class="antialiased text-gray-600">
            <div class="bg-white shadow-xl rounded-xl border border-gray-100">
                <header class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-900">Relaciones Laborales</h2>
                    <div class="relative w-64">
                        <input class="border border-gray-300 pl-10 pr-3 py-2 rounded-lg w-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                            wire:model.live="search"
                            type="text"
                            placeholder="Buscar..." />
                        <div class="absolute left-3 inset-y-0 flex items-center">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </header>

                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse">
                            <thead class="text-xs font-semibold uppercase text-gray-500 bg-gray-50">
                                <tr>
                                    <th class="p-4 text-left">Nombre</th>
                                    <th class="p-4 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-200">
                                @forelse($relacionesuser as $user)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="p-4 text-gray-800">{{ $user->nombre }}</td>
                                    <td class="p-4 text-center">
                                        <div class="flex justify-center gap-3">
                                            <a href="{{ route('editarRelacionesAdministrador', Crypt::encrypt($user->id)) }}"
                                                class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Editar
                                            </a>
                                            <button wire:click="deleteRelaciones({{ $user->id }})"
                                                class="flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors duration-300 focus:ring-2 focus:ring-red-500 shadow-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a2 2 0 00-2 2h8a2 2 0 00-2-2m-4 0V3m-3 4h10"></path>
                                                </svg>
                                                Eliminar
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="p-6 text-center text-gray-500">
                                        Sin resultados para "{{ $this->search }}"
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @if ($relacionesuser->count())
                        <div class="bg-white px-6 py-4 border-t border-gray-200">
                            {{ $relacionesuser->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@script
<script>
    $wire.on('eliminarRelacionesAdministrador', (event) => {
        //alert(event.id);
        Swal.fire({
            title: "¿Está seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Si, bórralo!"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.dispatch('delete', {id: event.id});
            }
        });
    });
</script>
@endscript
