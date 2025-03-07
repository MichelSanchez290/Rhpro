<div class="space-y-6">
    <div>
        <label for="sucursal" class="block text-sm font-medium text-gray-700">Seleccione una sucursal:</label>
        <select wire:model.live="sucursal_id" id="sucursal" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">-- Seleccione --</option>
            @foreach($sucursales as $sucursal)
                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
            @endforeach
        </select>
    </div>

    @if($sucursal_id)
        <div>
            <label class="block text-sm font-medium text-gray-700">Seleccione el tipo de personal:</label>
            <div class="flex space-x-4 mt-2">
                <button wire:click="setTipo('trabajador')" class="p-4 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">Trabajador</button>
                <button wire:click="setTipo('becario')" class="p-4 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition">Becario</button>
                <button wire:click="setTipo('practicante')" class="p-4 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition">Practicante</button>
            </div>
            
        </div>
    @endif

    @if($tipo_seleccionado && count($opciones) > 0)
    <div>
        <h3 class="text-lg font-semibold text-gray-700">Seleccione un {{ ucfirst($tipo_seleccionado) }}:</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-4">
            @foreach($opciones as $opcion)
                <div class="p-4 border rounded-lg shadow hover:bg-gray-100 cursor-pointer transition">
                    <a class="text-lg font-semibold" href='{{ route("asignarPerfilPuesto", ["id" => Crypt::encrypt($opcion->id), "tipoUsuario" => $tipo_seleccionado]) }}'>{{ $opcion->usuarios->name ?? 'Sin nombre' }}</a>
                    <p class="text-sm text-gray-500">{{ $opcion->usuarios->email ?? 'Sin email' }}</p>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>