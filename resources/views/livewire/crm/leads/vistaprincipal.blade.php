<div>
    <div class="w-full bg-white border-2 rounded-lg">
        <div class="text-center">
            <h1 class="mt-10 mb-5 text-3xl font-bold">
                Formulario de Lead
            </h1>
        </div>
        <div class="grid justify-center w-full grid-cols-3 gap-4 px-10 py-4 bg-white rounded-lg shadow-lg">
            {{-- Nombre del lead --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase ">
                    Nombre del lead
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.nombre_cliente" type="text">
                <x-input-error for="lead.nombre_cliente" />
            </div>
            {{-- Medios CESRH --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase ">
                    Medios CESRH
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.medios_cesrh" type="text">
                <x-input-error for="lead.medios_cesrh" />
            </div>
            {{-- Numero del lead --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase">
                    Numero de lead
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.numero_lead" type="number" disabled readonly>
                <x-input-error for="lead.numero_lead" />
            </div>
            {{-- Fecha y Hora --}}
            {{-- <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase">
                    Fecha
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.fecha_y_hora" type="datetime" disabled readonly>
                <x-input-error for="lead.fecha_y_hora" />
            </div> --}}
        </div>
        <div class="grid justify-center w-full grid-cols-2 gap-4 px-10 py-4 bg-white rounded-lg shadow-lg">
            {{-- Nombre de empresa --}}
            <div class="mx-2 text-center ">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Nombre de empresa
                </label>
                <select wire:model="lead.crm_empresas_id"
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Seleccione una empresa</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Puesto --}}
            <div class="mx-2 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Puesto
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.puesto" type="text">
                <x-input-error for="lead.puesto" />
            </div>
            {{-- Contacto Alternativo --}}
            <div class="mx-2 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Contacto Alternativo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.nombre_contacto_2" type="text">
                <x-input-error for="lead.nombre_contacto_2" />
            </div>
            {{-- Puesto Alternativo --}}
            <div class="mx-2 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Puesto Alternativo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.puesto_contacto_2" type="text">
                <x-input-error for="lead.puesto_contacto_2" />
            </div>
        </div>
        <div class="grid justify-center w-full grid-cols-2 gap-4 px-10 py-4 bg-white rounded-lg mb-7">
            {{-- Correo --}}
            <div class="mx-2 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Correo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.correo" type="email">
                <x-input-error for="lead.correo" />
            </div>
            {{-- Correo alternativo --}}
            <div class="mx-2 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Correo Alternativo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.correo_2" type="email">
                <x-input-error for="lead.correo_2" />
            </div>
            {{-- Telefono --}}
            <div class="mx-2 mb-4 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Telefono
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.telefono" type="number">
                <x-input-error for="lead.telefono" />
            </div>
            {{-- Telefono --}}
            <div class="mx-2 mb-4 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Telefono Alternativo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.telefono_2" type="number">
                <x-input-error for="lead.telefono_2" />
            </div>
        </div>
        {{-- Botones --}}
        <div class="flex items-center justify-center">
            <div x-data="{show:true}" x-show="show" x-transition x-init="@this.on('message',() => {
                show=false;
                });">
                <button  wire:click="saveLead()"
                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 m-2">
                    Agregar
                </button>
                <a href="{{ url('/crm/crm-inicio') }}" x-data x-show="!show" x-transition
                    class="px-4 py-2 font-bold text-white bg-red-500 rounded btn hover:bg-red-700 m-2">
                    Ir a inicio
                </a>
            </div>

            <div x-data="{show:false}" x-show="show" x-transition x-init="@this.on('message',() => {
                show=true;
                });"
             class="justify-center flexed bottom-4 left-1/2 transform -translate-x-1/2  bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
                <p class="text-sm">Lead registado con éxito</p>
            </div>
        </div>
    </div>
    <div class="w-full bg-white border-2 rounded-lg mt-4">
        <div class="p-4">
            <div class="flex text-center">
                <button onclick="Livewire.dispatch('openModal', { component: 'crm.leads.modal.seleccion ' })"
                    wire:click='uno'
                    class="flex-1 px-4 py-2 mx-2 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 active:shadow-none">
                    E-Smart
                </button>
                {{-- <a href="#form1" wire:click="uno"
                    class="flex-1 px-4 py-2 mx-2 transition-all duration-300 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 hover:shadow-none">
                    E-Smart
                </a> --}}
                <a href="#form2" wire:click="dos"
                    class="flex-1 px-4 py-2 mx-2 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 active:shadow-none">
                    Training
                </a>
                <a href="#form3" onclick="Livewire.dispatch('openModal', { component: 'crm.leads.modal.seleccion ' })"
                    wire:click="tres"
                    class="flex-1 px-4 py-2 mx-2 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 active:shadow-none">
                    HeadHunting
                </a>
                <a href="#form4" wire:click="cuatro"
                    class="flex-1 px-4 py-2 mx-2 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 active:shadow-none">
                    Nom 035
                </a>
            </div>
        </div>
    </div>

    @if ($paginacion == 1)
        <div>
            @for ($i = 0; $i < $duplicados; $i++)
                <div>
                    <div class="m-4 bg-white rounded-lg shadow-md shadow-gray-300">
                        <div class="text-center">
                            <h1 class="p-10 text-3xl font-bold">
                                Formulario de E-Smart
                            </h1>
                        </div>
                        <div class="grid justify-center w-full grid-cols-4 gap-4 px-10 py-4">
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Nombre Cliente
                                </label>
                                <input disabled
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="lead.nombre_contacto" type="text">
                                <x-input-error for="lead.nombre_contacto" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Nombre de empresa
                                </label>
                                <input disabled
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="lead.nombre_empresa" type="text">
                                <x-input-error for="lead.nombre_empresa" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Telefono
                                </label>
                                <input disabled
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="lead.telefono" type="number">
                                <x-input-error for="lead.telefono" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Correo
                                </label>
                                <input disabled
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="lead.correo" type="text">
                                <x-input-error for="lead.correo" />
                            </div>
                        </div>
                        <div class="grid justify-center w-full grid-cols-4 gap-4 px-10 py-4">
                            {{-- Tamaño de la empresa --}}
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Tamaño de la empresa
                                </label>
                                <select wire:model='esmart.{{ $i }}.tamaño_empresa'
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
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    ¿Es la primera vez aplicando?
                                </label>
                                <select wire:model='esmart.{{ $i }}.primera_o_recompra'
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="" disabled>Seleccione un valor</option>
                                    <option value="" disabled>------</option>
                                    <option value="si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            {{-- Responsable Comercial --}}
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Responsable comercial
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="esmart.{{ $i }}.responsable_comercial"
                                    type="text">
                                <x-input-error for="esmart.{{ $i }}.responsable_comercial" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    ¿Por cual medio se entero?
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="esmart.{{ $i }}.medio_cesrh" type="text">
                                <x-input-error for="esmart.{{ $i }}.medio_cesrh" />
                            </div>
                        </div>
                        <div class="grid justify-center w-full grid-cols-3 gap-4 px-10 py-4">
                            {{-- Fecha --}}
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Giro de la empresa
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="esmart.{{ $i }}.giro_empresa" type="text">
                                <x-input-error for="esmart.{{ $i }}.giro_empresa" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Ubicacion
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="esmart.{{ $i }}.ubicacion_empresa" type="text">
                                <x-input-error for="esmart.{{ $i }}.ubicacion_empresa" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Fecha
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="esmart.{{ $i }}.fecha" type="date">
                                <x-input-error for="esmart.{{ $i }}.fecha" />
                            </div>
                        </div>
                        <div class="flex justify-end mr-10">
                            <button wire:click="eliminarEsmart({{ $i }})" type="button"
                                class="break-inside bg-[#D20939] hover:bg-[#B00730] active:bg-[#900528] rounded-xl p-4 mb-4 transition-colors duration-200 relative">
                                <div class="flex items-center gap-2">
                                    <!-- Icono normal -->
                                    <i class="far fa-trash-alt text-white fa-xl" wire:loading.remove
                                        wire:target="eliminarEsmart({{ $i }})"></i>
                                    <!-- Spinner de carga -->
                                    <span class="text-white" wire:loading
                                        wire:target="eliminarEsmart({{ $i }})">
                                        <i class="fas fa-spinner fa-spin fa-xl"></i>
                                    </span>

                                    <!-- Texto normal -->
                                    <span class="text-base font-medium text-white" wire:loading.remove
                                        wire:target="eliminarEsmart({{ $i }})">
                                        Eliminar
                                    </span>

                                    <!-- Texto durante carga -->
                                    <span class="text-base font-medium text-white" wire:loading
                                        wire:target="eliminarEsmart({{ $i }})">
                                        Eliminando...
                                    </span>
                                </div>
                            </button>\
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        @if ($i > 0)
            <div class="flex justify-center bg-white rounded-lg">
                <button wire:click = "guardarEsmart" wire:loading.attr="disabled"
                    class="p-2 my-6 mr-10 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 active:shadow-none active:bg-green-800 ">
                    Guardar y Salir
                </button>
            </div>
        @else
            <div class="bg-white rounded-lg mt-4">
                <h1 class="text-center text-6xl font-bold p-10">
                    Agregue formularios
                </h1>
            </div>
        @endif
    @endif

    @if ($paginacion == 2)
        <div id="form2">
            <div class="m-4 bg-white rounded-lg shadow-md shadow-gray-300">
                <div class="text-center">
                    <h1 class="p-10 text-3xl font-bold">
                        Formulario de Training
                    </h1>
                </div>
                <div class="grid justify-center w-full grid-cols-4 gap-4 px-10 py-4">
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Nombre del Lead
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.nombre_contacto" type="text">
                        <x-input-error for="lead.nombre_contacto" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Nombre de empresa
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.nombre_empresa" type="text">
                        <x-input-error for="lead.nombre_empresa" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Correo
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.correo" type="text">
                        <x-input-error for="lead.correo" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Telefono
                        </label>
                        <input disabled
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="lead.telefono" type="number">
                        <x-input-error for="lead.telefono" />
                    </div>
                </div>
                <div class="grid justify-center w-full grid-cols-3 px-10 py-4">
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Giro de la empresa
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="" type="text">
                        <x-input-error for="" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Ubicacion
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="" type="text">
                        <x-input-error for="" />
                    </div>
                    <div class="mx-2 text-center">
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
                <div class="grid justify-center w-full grid-cols-3 px-10">
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Medio de Informacion
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="" type="text">
                        <x-input-error for="" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Responsable comercial
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="" type="text">
                        <x-input-error for="" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Fecha
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="" type="date">
                        <x-input-error for="" />
                    </div>
                </div>
                <div class="flex justify-end">
                    <button
                        class="p-2 my-6 mr-10 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 active:shadow-none active:bg-green-800 ">
                        Guardar y Salir
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if ($paginacion == 3)
        <div id="form3">
            <div class="m-4 bg-white rounded-lg shadow-md shadow-gray-300">
                @for ($i = 0; $i < $duplicados; $i++)
                    <div class="text-center">
                        <h1 class="p-10 text-3xl font-bold">
                            Formulario de HeadHunting
                        </h1>
                    </div>
                    <div class="flex justify-center w-full px-10 py-4 bg-white rounded-lg shadow-lg">
                        {{-- Representante comercial --}}
                        {{-- <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="responsable_comercial">
                                Representante comercial
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.representante_comercial" type="text" placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.representante_comercial" />
                        </div> --}}
                        {{-- Fecha --}}
                        {{-- <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="fecha">
                                Fecha
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.fecha" type="date" placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.fecha" />
                        </div> --}}
                        {{-- Nombre del cliente --}}
                        {{-- <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="nombre_cliente">
                                Nombre del cliente
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.nombre_cliente" type="text" placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.nombre_cliente" />
                        </div> --}}
                        {{-- Puesto --}}
                        {{-- <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="puesto">
                                Puestos
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.puesto" type="text" placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.puesto" />
                        </div> --}}
                    </div>
                    <div class="flex justify-center w-full px-10 py-4 bg-white rounded-lg shadow-lg">
                        {{-- Empresa --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Empresa
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.empresa" type="text"
                                placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.empresa" />
                        </div>
                        {{-- Ubicación --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Ubicacion
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.ubicacion_empresa" type="text"
                                placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.ubicacion_empresa" />
                        </div>
                        {{-- Tamaño de empresa --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Tamaño de empresa
                            </label>
                            <select name="" id=""
                                wire:model.defer="hlevped.{{ $i }}.tamano_empresa"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" disabled>Seleccione un valor</option>
                                <option value="" disabled>------</option>
                                <option value="Micro">Micro</option>
                                <option value="Pequeña">Pequeña</option>
                                <option value="Mediana">Mediana</option>
                                <option value="Grande">Grande</option>
                            </select>
                            <x-input-error for="hlevped.{{ $i }}.tamano_empresa" />
                        </div>
                        {{-- Primera vez o recompra --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                ¿Es la primera vez aplicando?
                            </label>
                            <select name="" id=""
                                wire:model.defer="hlevped.{{ $i }}.primera_vez_o_recompra"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" disabled>Seleccione un valor</option>
                                <option value="" disabled>------</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                            <x-input-error for="hlevped.{{ $i }}.primera_vez_o_recompra" />
                        </div>
                    </div>
                    <div class="flex justify-center w-full px-10 py-4 bg-white rounded-lg shadow-lg">
                        {{-- Medios CESRH --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Medios CESRH
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.medios_cesrh" type="text"
                                placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.medios_cesrh" />
                        </div>
                        {{-- Numero de vacantes --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Numero de vacantes
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.numero_vacantes" type="number"
                                placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.numero_vacantes" />
                        </div>
                        {{-- Operativas --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Operativas
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.operativas" type="text"
                                placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.operativas" />
                        </div>
                        {{-- Especializadas --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Especializadas
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.especializadas" type="text"
                                placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.especializadas" />
                        </div>
                    </div>
                    <div class="flex justify-center w-full px-10 py-4 bg-white rounded-lg shadow-lg">
                        {{-- Ejecutivas --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Ejecutivas
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.ejecutivas" type="text"
                                placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.ejecutivas" />
                        </div>
                        {{-- Correo del cliente --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Correo del cliente
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.correo_cliente" type="email"
                                placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.correo_cliente" />
                        </div>
                        {{-- Telefono --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Telefono
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hlevped.{{ $i }}.telefono" type="number"
                                placeholder="">
                            <x-input-error for="hlevped.{{ $i }}.telefono" />
                        </div>
                        {{-- Status --}}
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="razonsocial">
                                Status
                            </label>
                            <select name="" id=""
                                wire:model.defer="hlevped.{{ $i }}.status"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" disabled>Seleccione un valor</option>
                                <option value="" disabled>------</option>
                                <option value="en_revision">En revisión</option>
                                <option value="declinada">Declinada</option>
                                <option value="aceptada">Aceptada</option>
                            </select>
                            <x-input-error for="hlevped.{{ $i }}.status" />
                        </div>
                    </div>
                    {{-- Leads --}}
                    {{-- <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Lead id
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="hlevped.{{ $i }}.leadCli_id" type="text" placeholder="" readonly disabled>
                        <x-input-error for="hlevped.{{ $i }}.leadCli_id" />
                    </div> --}}
                    <div class="flex justify-end">
                        <button
                            class="p-2 my-6 mr-4 font-semibold text-white bg-blue-600 rounded-md shadow-md shadow-gray-500 hover:shadow-none hover:bg-blue-800">
                            Guardar y Agregar otro
                        </button>
                        <button
                            class="p-2 my-6 mr-6 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 hovehover:shadow-none hover:bg-green-800 "
                            wire:click="saveHead">
                            Guardar y Salir
                        </button>
                    </div>
                @endfor
            </div>
        </div>
    @endif

    @if ($paginacion == 4)
        <div id="form4">
            <div class="m-4 bg-white rounded-lg shadow-md shadow-gray-300">
                <div class="text-center">
                    <h1 class="p-10 text-3xl font-bold">
                        Formulario de NOM035
                    </h1>
                </div>
                <div class="flex justify-center w-full px-10 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Nombre del Cliente --}}
                    <div class="mx-2 text-center">
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
                    <div class="mx-2 text-center">
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
                    <div class="mx-2 text-center">
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
                <div class="flex justify-center w-full px-10 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Ubicacion --}}
                    <div class="mx-2 text-center">
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
                    <div class="mx-2 text-center">
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
                    <div class="mx-2 text-center">
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
                <div class="flex justify-center w-full px-10 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Telefono del Cliente --}}
                    <div class="mx-2 text-center">
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
                    <div class="mx-2 text-center">
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
                    <div class="mx-2 text-center">
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
                <div class="flex justify-center w-full px-10 py-4 bg-white rounded-lg shadow-lg">
                    {{-- Fecha --}}
                    <div class="mx-2 text-center">
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
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="razonsocial">
                            Correo del Cliente
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="nomlevped035.correo_cliente" type="enail" placeholder="">
                        <x-input-error for="nomlevped035.correo_cliente" />
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
        </div>
    @endif
</div>
{{-- <script>
    function confirmarEliminacion(index) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "¡Listo!",
                    text: "Eliminaste correctamente.",
                    icon: "success"
                });
            }
        });
    }
</script> --}}
