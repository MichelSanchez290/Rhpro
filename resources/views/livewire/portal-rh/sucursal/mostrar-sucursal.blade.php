<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Gestión de Sucursales</h1>
        <button wire:click="redirigir" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
            Agregar Sucursal
        </button>
    </div>

    <div class="bg-white shadow-md rounded-lg p-4">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
            <div class="flex-1">
                <label for="search" class="sr-only">Buscar</label>
                <input type="text" wire:model="search" id="search"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg p-2.5"
                    placeholder="Buscar por clave o nombre...">
            </div>
            <div>
                <label for="porpagina" class="sr-only">Resultados por página</label>
                <select wire:model="porpagina" id="porpagina"
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg p-2.5">
                    <option value="5">5 por página</option>
                    <option value="10">10 por página</option>
                    <option value="15">15 por página</option>
                    <option value="20">20 por página</option>
                    <option value="25">25 por página</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-gray-50 text-gray-600 text-sm font-medium uppercase border-b border-gray-200">
                    <tr>
                        <th class="p-3 text-left">Clave</th>
                        <th class="p-3 text-left">Nombre</th>
                        <th class="p-3 text-center">Zona Económica</th>
                        <th class="p-3 text-center">Estado</th>
                        <th class="p-3 text-center">Cuenta contable</th>
                        <th class="p-3 text-center">RFC</th>
                        <th class="p-3 text-center">Correo</th>
                        <th class="p-3 text-center">Teléfono</th>
                        <th class="p-3 text-center">Estatus</th>
                        <th class="p-3 text-center">Reg Patronal</th>
                        <th class="p-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm">
                    @forelse ($sucursales as $sucursal)
                        <tr>
                            <td class="p-3">{{ $sucursal->clave_sucursal }}</td>
                            <td class="p-3">{{ $sucursal->nombre_sucursal }}</td>
                            <td class="p-3 text-center">{{ $sucursal->zona_economica }}</td>
                            <td class="p-3 text-center">{{ $sucursal->estado }}</td>
                            <td class="p-3 text-center">{{ $sucursal->cuenta_contable }}</td>
                            <td class="p-3 text-center">{{ $sucursal->rfc }}</td> 
                            <td class="p-3 text-center">{{ $sucursal->correo }}</td> 
                            <td class="p-3 text-center">{{ $sucursal->telefono }}</td>
                            <td class="p-3 text-center">{{ $sucursal->status }}</td>
                            <td class="p-3 text-center">{{ $sucursal->registro_patronal_id }}</td>
                            
                            <td class="p-3 text-center">
                                
                                <a href="{{ route('editarsucursal', Crypt::encrypt($sucursal->id)) }}"
                                    class="text-blue-600 hover:underline">Editar</a>

                                <button wire:click="eliminar({{ $sucursal->id }})"
                                    class="text-red-600 hover:text-red-800 ml-4">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">
                                Sin resultados para la búsqueda "{{ $this->search }}"
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($sucursales->count())
            <div class="mt-4">
                {{ $sucursales->links() }}
            </div>
        @endif
    </div>


    <livewire:portalrh.sucursal.sucursal-table/>
    
</div>
