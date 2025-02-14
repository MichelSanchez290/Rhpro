<div class="scroll-smooth">
    <div class="w-full bg-white rounded-lg">
        <div class="text-center">
            <h1 class="text-3xl p-5 font-bold">
                Formulario de Lead
            </h1>
        </div>
        <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
            {{-- Nombre del contacto --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase " for="razonsocial">
                    Nombre del contacto
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.nombre_contacto" type="text" placeholder="">
                <x-input-error for="lead.nombre_contacto" />
            </div>
            {{-- Numero del cliente --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Numero de cliente
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 border-2 border-black bg-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.numero_cliente" type="number" min="0" max="99999999" step="10"
                    placeholder="">
                <x-input-error for="lead.numero_cliente" />
            </div>
            {{-- Fecha --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Fecha
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.fecha" type="type" placeholder="">
                <x-input-error for="lead.fecha" />
            </div>
        </div>
        <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
            {{-- Hora --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Hora
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 border-2 border-black bg-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.hora" type="time" placeholder="" step="1">
                <x-input-error for="lead.hora" />
            </div>
            {{-- Razon Social --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Razon social
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.datos_id" type="text" placeholder="">
                <select wire:model='lead.datos_id'>
                    <option value="">Selecciona</option>
                    @foreach ($datosfis as $d)
                        <option value="{{ $d->id }}">{{ $d->razon_social }}</option>
                    @endforeach
                </select>
                {{-- <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="" type="text" placeholder=""> --}}
                <x-input-error for="lead.datos_id" />
            </div>
            {{-- Puesto --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Puesto
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.puesto" type="text" placeholder="">
                <x-input-error for="lead.puesto" />
            </div>
        </div>
        <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
            {{-- Correo --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Correo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.correo" type="text" placeholder="">
                <x-input-error for="lead.correo" />
            </div>
            {{-- Telefono --}}
            <div class="mx-2 mb-4">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Telefono
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 border-2 border-black bg-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.telefono" type="number" placeholder=""min="0" max="99999999" step="10">
                <x-input-error for="lead.telefono" />
            </div>
        </div>
    </div>
    <div class="bg-gray-100 w-full m-4 rounded-lg items-center">
        <div class="p-4">
            <div class="flex text-center">
                <a href="#form1" wire:click="uno"
                    class="flex-1 py-2 px-4 rounded-md transition-all duration-300 border-2 border-gray-900 shadow-md shadow-gray-900 hover:shadow-none mx-2">
                    E-Smart
                </a>
                <a href="#form2" wire:click="dos"
                    class="flex-1 py-2 px-4 rounded-md transition-all duration-300 border-2 border-gray-900 shadow-md shadow-gray-900 hover:shadow-none mx-2">
                    Training
                </a>
                <a href="#form3" wire:click="tres"
                    class="flex-1 py-2 px-4 rounded-md transition-all duration-300 border-2 border-gray-900 shadow-md shadow-gray-900 hover:shadow-none mx-2">
                    HeadHunting
                </a>
                <a href="#form4" wire:click="cuatro"
                    class="flex-1 py-2 px-4 rounded-md transition-all duration-300 border-2 border-gray-900 shadow-md shadow-gray-900 hover:shadow-none mx-2">
                    Nom 035
                </a>
            </div>
        </div>
    </div>

    @if ($paginacion == 1)
        <div id="form1">
            <div class="m-4 shadow-md shadow-gray-300 rounded-lg">
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Nombre del contacto --}}
                    <div class="mx-2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Nombre del contacto
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.nombre_contacto" type="text" placeholder="">
                        <x-input-error for="lead.nombre_contacto" />
                    </div>
                    {{-- Numero del cliente --}}
                    <div class="mx-2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Numero de cliente
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.numero_cliente" type="text" placeholder="">
                        <x-input-error for="lead.numero_cliente" />
                    </div>
                    {{-- Fecha --}}
                    <div class="mx-2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Fecha
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.fecha" type="text" placeholder="">
                        <x-input-error for="lead.fecha" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Hora --}}
                    <div class="mx-2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Hora
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.hora" type="text" placeholder="">
                        <x-input-error for="lead.hora" />
                    </div>
                    {{-- Razon Social --}}
                    <div class="mx-2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Razon social
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.datos_id" type="text" placeholder="">
                        <x-input-error for="lead.datos_id" />
                    </div>
                    {{-- Puesto --}}
                    <div class="mx-2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Puesto
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.puesto" type="text" placeholder="">
                        <x-input-error for="lead.puesto" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Correo --}}
                    <div class="mx-2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Correo
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.correo" type="text" placeholder="">
                        <x-input-error for="lead.correo" />
                    </div>
                    {{-- Telefono --}}
                    <div class="mx-2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Telefono
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200  border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.telefono" type="text" placeholder="">
                        <x-input-error for="lead.telefono" />
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($paginacion == 2)
        <div id="form2">
            <div class="m-4 shadow-md shadow-gray-300 rounded-lg">
                Hola mundo 2
            </div>
        </div>
    @endif

    @if ($paginacion == 3)
        <div id="form3">
            <div class="m-4 shadow-md shadow-gray-300 rounded-lg">
                Hola mundo 2
            </div>
        </div>
    @endif

    @if ($paginacion == 4)
        <div id="form4">
            <div class="m-4 shadow-md shadow-gray-300 rounded-lg">
                Hola mundo 2
            </div>
        </div>
    @endif

</div>
