<div class="w-full bg-gray-100">
    <div class="flex justify-center w-full px-2 py-4 bg-white border-0 border-2 border-red-400 rounded-lg shadow-lg">
        {{-- Nombre del contacto --}}
        <div class="mx-2">
            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                Nombre del contacto
            </label>
            <input
                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                wire:model.defer="lead.nombre_contacto" type="text" placeholder="">
            <x-input-error for="lead.nombre_contacto" />
        </div>
        {{-- Numero del cliente --}}
        <div class="mx-2">
            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                Numero de cliente
            </label>
            <input
                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                wire:model.defer="lead.numero_cliente" type="text" placeholder="">
            <x-input-error for="lead.numero_cliente" />
        </div>
        {{-- Fecha --}}
        <div class="mx-2">
            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                Fecha
            </label>
            <input
                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                wire:model.defer="lead.fecha" type="text" placeholder="">
            <x-input-error for="lead.fecha" />
        </div>
    </div>
    <div class="flex justify-center w-full px-2 py-4 bg-white border-0 border-2 border-red-400 rounded-lg shadow-lg">
        {{-- Hora --}}
        <div class="mx-2">
            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                Hora
            </label>
            <input
                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                wire:model.defer="lead.hora" type="text" placeholder="">
            <x-input-error for="lead.hora" />
        </div>
        {{-- Razon Social --}}
        <div class="mx-2">
            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                Razon social
            </label>
            <input
                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                wire:model.defer="lead.datos_id" type="text" placeholder="">
            <x-input-error for="lead.datos_id" />
        </div>
        {{-- Puesto --}}
        <div class="mx-2">
            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                Puesto
            </label>
            <input
                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                wire:model.defer="lead.puesto" type="text" placeholder="">
            <x-input-error for="lead.puesto" />
        </div>
    </div>
    <div class="flex justify-center w-full px-2 py-4 bg-white border-0 border-2 border-red-400 rounded-lg shadow-lg">
        {{-- Correo --}}
        <div class="mx-2">
            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                Correo
            </label>
            <input
                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                wire:model.defer="lead.correo" type="text" placeholder="">
            <x-input-error for="lead.correo" />
        </div>
        {{-- Telefono --}}
        <div class="mx-2">
            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                Telefono
            </label>
            <input
                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                wire:model.defer="lead.telefono" type="text" placeholder="">
            <x-input-error for="lead.telefono" />
        </div>
    </div>
    <div class="flex justify-center w-full px-2 py-4 bg-white border-0 border-2 border-red-400 rounded-lg shadow-lg">
        {{-- Acciones --}}
        <div class="mx-2">
            <button wire:click="saveLead()"
                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                Agregar
            </button>
            <a href="{{ url('/crm/crm-inicio') }}"
                class="px-4 py-2 font-bold text-white bg-red-500 rounded btn hover:bg-red-700">
                Cancelar
            </a>
        </div>
    </div>
</div>
