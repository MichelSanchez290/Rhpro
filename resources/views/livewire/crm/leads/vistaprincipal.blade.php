<div class="scroll-smooth">
    <div class="w-full bg-white rounded-lg">
        <div class="text-center">
            <h1 class="p-5 text-3xl font-bold">
                Formulario de Lead
            </h1>
        </div>
        <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
            {{-- Nombre del lead --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase w-60 ">
                    Nombre del lead
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.nombre_contacto" type="text">
                <x-input-error for="lead.nombre_contacto" />
            </div>
            {{-- Numero del cliente --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase w-60">
                    Numero de cliente
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.numero_cliente" type="number">
                <x-input-error for="lead.numero_cliente" />
            </div>
            {{-- Fecha --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase w-60">
                    Fecha
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.fecha" type="date">
                <x-input-error for="lead.fecha" />
            </div>
        </div>
        <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
            {{-- Hora --}}
            {{-- <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Hora
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.hora" type="time" step="1">
                <x-input-error for="lead.hora" />
            </div> --}}
            {{-- Nombre de empresa --}}
            <div class="mx-2 text-center w-60 ">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Nombre de empresa
                </label>
                <select wire:model="lead.nombre_empresa"
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Seleccione una empresa</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->nombre }}">{{ $empresa->nombre }}</option>
                    @endforeach
                </select>
                {{-- <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="" type="text"> --}}
                <x-input-error for="" />
            </div>
            {{-- Puesto --}}
            <div class="mx-2 text-center w-60">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Puesto
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.puesto" type="text">
                <x-input-error for="lead.puesto" />
            </div>
        </div>
        <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
            {{-- Correo --}}
            <div class="mx-2 text-center w-60">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Correo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.correo" type="email">
                <x-input-error for="lead.correo" />
            </div>
            {{-- Telefono --}}
            <div class="mx-2 mb-4 text-center w-60">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Telefono
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.telefono" type="number">
                <x-input-error for="lead.telefono" />
            </div>
        </div>
    </div>
    <div class="items-center w-full m-4 bg-gray-100 rounded-lg">
        <div class="p-4">
            <div class="flex text-center">
                <a href="#form1" wire:click="uno"
                    class="flex-1 px-4 py-2 mx-2 transition-all duration-300 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 hover:shadow-none">
                    E-Smart
                </a>
                <a href="#form2" wire:click="dos"
                    class="flex-1 px-4 py-2 mx-2 transition-all duration-300 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 hover:shadow-none">
                    Training
                </a>
                <a href="#form3" wire:click="tres"
                    class="flex-1 px-4 py-2 mx-2 transition-all duration-300 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 hover:shadow-none">
                    HeadHunting
                </a>
                <a href="#form4" wire:click="cuatro"
                    class="flex-1 px-4 py-2 mx-2 transition-all duration-300 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 hover:shadow-none">
                    Nom 035
                </a>
            </div>
        </div>
    </div>

    @if ($paginacion == 1)
        <div id="form1">
            <div class="m-4 bg-white rounded-lg shadow-md shadow-gray-300">
                <div class="text-center">
                    <h1 class="p-10 text-3xl font-bold">
                        Formulario de E-Smart
                    </h1>
                </div>
                <div class="flex justify-center w-full px-2 py-4">
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Nombre Cliente
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.nombre_contacto" type="text">
                        <x-input-error for="lead.nombre_contacto" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Nombre de empresa
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.nombre_empresa" type="text">
                        <x-input-error for="lead.nombre_empresa" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Telefono
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.telefono" type="number">
                        <x-input-error for="lead.telefono" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Correo
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.correo" type="text">
                        <x-input-error for="lead.correo" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4">
                    {{-- Tamaño de la empresa --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Tamaño de la empresa
                        </label>
                        <select wire:model='esmart.tamaño_empresa'
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" disabled>Seleccione un valor</option>
                            <option value="" disabled>------</option>
                            <option value="Micro">Micro</option>
                            <option value="Chica">Chica</option>
                            <option value="Mediana">Mediana</option>
                            <option value="Grande">Grande</option>
                        </select>
                    </div>
                    {{-- Primera vez aplicando --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            ¿Es la primera vez aplicando?
                        </label>
                        <select wire:model='esmart.primera_o_recompra'
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" disabled>Seleccione un valor</option>
                            <option value="" disabled>------</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    {{-- Responsable Comercial --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Responsable comercial
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="esmart.responsable_comercial" type="text">
                        <x-input-error for="esmart.responsable_comercial" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            ¿Por cual medio se entero?
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="esmart.medio_cesrh" type="text">
                        <x-input-error for="esmart.medio_cesrh" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4">
                    {{-- Fecha --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Giro de la empresa
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="esmart.giro_empresa" type="text">
                        <x-input-error for="esmart.giro_empresa" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Ubicacion
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="esmart.ubicacion_empresa" type="text">
                        <x-input-error for="esmart.ubicacion_empresa" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Fecha
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="esmart.fecha" type="date">
                        <x-input-error for="esmart.fecha" />
                    </div>
                </div>
                <div class="flex justify-end">
                    <button
                        class="p-2 my-6 mr-4 font-semibold text-white bg-blue-600 rounded-md shadow-md shadow-gray-500 hover:shadow-none hover:bg-blue-800">
                        Guardar y Agregar otro
                    </button>
                    <button wire:click = "guardarEsmart" wire:loading.attr="disabled"
                        class="p-2 my-6 mr-6 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 hovehover:shadow-none hover:bg-green-800 ">
                        Guardar y Salir
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if ($paginacion == 2)
        <div id="form2">
            <div class="m-4 bg-white rounded-lg shadow-md shadow-gray-300">
                <div class="text-center">
                    <h1 class="p-10 text-3xl font-bold">
                        Formulario de Training
                    </h1>
                </div>
                <div class="flex justify-center w-full px-2 py-4">
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Nombre del Lead
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.nombre_contacto" type="text">
                        <x-input-error for="lead.nombre_contacto" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Nombre de empresa
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.nombre_empresa" type="text">
                        <x-input-error for="lead.nombre_empresa" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Correo
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.correo" type="text">
                        <x-input-error for="lead.correo" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Telefono
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.telefono" type="number">
                        <x-input-error for="lead.telefono" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4">
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Giro de la empresa
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="" type="text">
                        <x-input-error for="" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Ubicacion
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="" type="text">
                        <x-input-error for="" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            ¿Es la primera vez aplicando?
                        </label>
                        <select wire:model='lead.datos_id'
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" disabled>Seleccione un valor</option>
                            <option value="" disabled>------</option>
                            <option value="">Si</option>
                            <option value="">No</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4">
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Medio de Informacion
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="" type="text">
                        <x-input-error for="" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Responsable comercial
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="" type="text">
                        <x-input-error for="" />
                    </div>
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Fecha
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="" type="date">
                        <x-input-error for="" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4">
                </div>
                <div class="flex justify-end">
                    <button
                        class="p-2 my-6 mr-4 font-semibold text-white bg-blue-600 rounded-md shadow-md shadow-gray-500 hover:shadow-none hover:bg-blue-800">
                        Guardar y Agregar otro
                    </button>
                    <button
                        class="p-2 my-6 mr-6 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 hovehover:shadow-none hover:bg-green-800 ">
                        Guardar y Salir
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if ($paginacion == 3)
        <div id="form3">
            <div class="m-4 bg-white rounded-lg shadow-md shadow-gray-300">
                <div class="text-center">
                    <h1 class="p-10 text-3xl font-bold">
                        Formulario de HeadHunting
                    </h1>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Representante comercial --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="responsable_comercial">
                            Representante comercial
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.representante_comercial" type="text" placeholder="">
                        <x-input-error for="hlevped.representante_comercial" />
                    </div>
                    {{-- Fecha --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="fecha">
                            Fecha
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.fecha" type="date" placeholder="">
                        <x-input-error for="hlevped.fecha" />
                    </div>
                    {{-- Nombre del cliente --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="nombre_cliente">
                            Nombre del cliente
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.nombre_cliente" type="text" placeholder="">
                        <x-input-error for="hlevped.nombre_cliente" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Puesto --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="puesto">
                            Puestos
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.puesto" type="text" placeholder="">
                        <x-input-error for="hlevped.puesto" />
                    </div>
                    {{-- Empresa --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Empresa
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.empresa" type="text" placeholder="">
                        <x-input-error for="hlevped.empresa" />
                    </div>
                    {{-- Ubicación --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Ubicacion
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.ubicacion_empresa" type="text" placeholder="">
                        <x-input-error for="hlevped.ubicacion_empresa" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Tamaño de empresa --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Tamaño de empresa
                        </label>
                        <select name="" id="" wire:model.defer="hlevped.tamano_empresa"
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" disabled>Seleccione un valor</option>
                            <option value="" disabled>------</option>
                            <option value="Micro">Micro</option>
                            <option value="Pequeña">Pequeña</option>
                            <option value="Mediana">Mediana</option>
                            <option value="Grande">Grande</option>
                        </select>
                        <x-input-error for="hlevped.tamano_empresa" />
                    </div>
                    {{-- Primera vez o recompra --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            ¿Es la primera vez aplicando?
                        </label>
                        <select name="" id="" wire:model.defer="hlevped.primera_vez_o_recompra"
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" disabled>Seleccione un valor</option>
                            <option value="" disabled>------</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                        </select>
                        <x-input-error for="hlevped.primera_vez_o_recompra" />
                    </div>
                    {{-- Medios CESRH --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Medios CESRH
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.medios_cesrh" type="text" placeholder="">
                        <x-input-error for="hlevped.medios_cesrh" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Numero de vacantes --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Numero de vacantes
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.numero_vacantes" type="text" placeholder="">
                        <x-input-error for="hlevped.numero_vacantes" />
                    </div>
                    {{-- Operativas --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Operativas
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.operativas" type="text" placeholder="">
                        <x-input-error for="hlevped.operativas" />
                    </div>
                    {{-- Especializadas --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Especializadas
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.especializadas" type="text" placeholder="">
                        <x-input-error for="hlevped.especializadas" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Ejecutivas --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Ejecutivas
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.ejecutivas" type="text" placeholder="">
                        <x-input-error for="hlevped.ejecutivas" />
                    </div>
                    {{-- Correo del cliente --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Correo del cliente
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.correo_cliente" type="text" placeholder="">
                        <x-input-error for="hlevped.correo_cliente" />
                    </div>
                    {{-- Telefono --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Telefono
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.telefono" type="text" placeholder="">
                        <x-input-error for="hlevped.telefono" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Status --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Status
                        </label>
                        <select name="" id="" wire:model.defer="hlevped.status"
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" disabled>Seleccione un valor</option>
                            <option value="" disabled>------</option>
                            <option value="en_revision">En revisión</option>
                            <option value="declinada">Declinada</option>
                            <option value="aceptada">Aceptada</option>
                        </select>
                        <x-input-error for="hlevped.status" />
                    </div>

                    {{-- Lead --}}
                    {{-- <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Lead
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.leadCli_id" type="text" placeholder="">
                        <x-input-error for="hlevped.leadCli_id" />
                    </div> --}}
                </div>
                <div class="flex justify-end">
                    <button
                        class="p-2 my-6 mr-4 font-semibold text-white bg-blue-600 rounded-md shadow-md shadow-gray-500 hover:shadow-none hover:bg-blue-800">
                        Guardar y Agregar otro
                    </button>
                    <button
                        class="p-2 my-6 mr-6 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 hovehover:shadow-none hover:bg-green-800 ">
                        Guardar y Salir
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if ($paginacion == 4)
        <div id="form4">
            <div class="m-4 rounded-lg shadow-md shadow-gray-300 bg-white">
                <div class="text-center">
                    <h1 class="p-10 text-3xl font-bold">
                        Formulario de NOM035
                    </h1>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Nombre del Cliente --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="nombre_cliente">
                            Nombre del Cliente
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.nombre_cliente" type="text" placeholder="">
                        <x-input-error for="nomlevped035.nombre_cliente" />
                    </div>
                    {{-- Numero de Empresa --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Nombre de la Empresa
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.nombre_empresa" type="text" placeholder="">
                        <x-input-error for="nomlevped035.nombre_empresa" />
                    </div>
                    {{-- Giro de la Empresa --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Giro de la Empresa
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.giro_empresa" type="text" placeholder="">
                        <x-input-error for="nomlevped035.giro_empresa" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Ubicacion --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Ubicacion
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.ubicacion_empresa" type="text" placeholder="">
                        <x-input-error for="nomlevped035.ubicacion_empresa" />
                    </div>
                    {{-- Medio CESRH --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Medio CESRH
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.medio_cesrh" type="text" placeholder="">
                        <x-input-error for="nomlevped035.medio_cesrh" />
                    </div>
                    {{-- Responsable Comercial --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Responsable Comercial
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.responsable_comercial" type="text" placeholder="">
                        <x-input-error for="nomlevped035.responsable_comercial" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Telefono del Cliente --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Telefono del Cliente
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.telefono_cliente" type="text" placeholder="">
                        <x-input-error for="nomlevped035.telefono_cliente" />
                    </div>
                    {{-- Informacion NOM035 --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Información NOM035
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.035info_id" type="text" placeholder="">
                        <x-input-error for="nomlevped035.035info_id" />
                    </div>
                    {{-- Tipo de Servicio --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Tipo de Servicio
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.tipo_servicio" type="text" placeholder="">
                        <x-input-error for="nomlevped035.tipo_servicio" />
                    </div>
                </div>
                <div class="flex justify-center w-full px-2 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Fecha --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Fecha
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.fecha" type="date" placeholder="">
                        <x-input-error for="nomlevped035.fecha" />
                    </div>
                    {{-- Correo del Cliente --}}
                    <div class="mx-2 text-center w-60">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Correo del Cliente
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.correo_cliente" type="enail" placeholder="">
                        <x-input-error for="nomlevped035.correo_cliente" />
                    </div>
                </div>
                <div class="flex justify-end">
                    <button
                        class="p-2 my-6 mr-4 font-semibold text-white bg-blue-600 rounded-md shadow-md shadow-gray-500 hover:shadow-none hover:bg-blue-800">
                        Guardar y Agregar otro
                    </button>
                    <button
                        class="p-2 my-6 mr-6 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 hovehover:shadow-none hover:bg-green-800 ">
                        Guardar y Salir
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>
