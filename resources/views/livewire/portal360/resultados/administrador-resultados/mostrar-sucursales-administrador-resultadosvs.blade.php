<div class="p-6 ml-4 space-y-6">
    @if($empresaSucursal)
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Detalles de la Sucursal</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="px-6 py-3 text-left text-sm font-medium">Campo</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Valor</th>
                        <th class="px-6 py-3 text-center text-sm font-medium">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 font-semibold text-gray-700">Nombre de la Sucursal</td>
                        <td class="px-6 py-4 text-gray-600">{{ $empresaSucursal->sucursal->nombre_sucursal }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-3">
                                <button 
                                    wire:click="resultadosGenerales" 
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition-all duration-200 hover:shadow-md"
                                >
                                    Resultados Generales
                                </button>
                                <button 
                                    wire:click="resultadosGeneralesPorUsuario" 
                                    class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition-all duration-200 hover:shadow-md"
                                >
                                    Resultados por Usuario
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
        <p class="text-red-700">No se encontraron datos para esta sucursal.</p>
    </div>
    @endif

    @if($mostrarTablaUsuarios)
    <div class="mt-6 bg-white p-6 rounded-xl shadow-md border border-gray-100 ml-2 mr-4">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">Resultados Generales por Usuario</h3>
            <button 
                wire:click="ocultarTabla" 
                class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition-all duration-200 hover:shadow-md"
            >
                Cerrar
            </button>
        </div>
        <livewire:portal360.envaluaciones.ver-resultados-por-usuario-admin.ver-resultados-usuario-table :sucursalId="$SucursalId" />
    </div>
    @endif

    @if($mostrarTablaGenerales)
    <div class="mt-6 bg-white p-6 rounded-xl shadow-md border border-gray-100 ml-2 mr-4">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">Resultados Generales</h3>
            <button 
                wire:click="ocultarTabla" 
                class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition-all duration-200 hover:shadow-md"
            >
                Cerrar
            </button>
        </div>
        <div class="mb-6">
            <select 
                wire:model.live="selectedCalificadoId" 
                class="w-full max-w-xs border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
            >
                @foreach($calificados as $calificado)
                <option value="{{ $calificado->id }}">{{ $calificado->name }}</option>
                @endforeach
            </select>
        </div>
        <livewire:portal360.envaluaciones.envaluacion-administrador.ver-resultados-generales-adminis
            :sucursalId="$SucursalId"
            :calificadoId="$selectedCalificadoId"
            key="{{ $selectedCalificadoId }}" />
    </div>
    @endif
</div>