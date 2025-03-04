<div>
    <div class="w-full bg-white border-2 rounded-lg">
        <div class="text-center">
            <h1 class="mt-10 mb-5 text-3xl font-bold">
                Formulario de Lead
            </h1>
        </div>
        {{-- Nombre del lead --}}
        <div class="grid justify-center w-full grid-cols-4 gap-4 px-10 py-4">
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase ">
                    Nombre del lead
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.nombre_cliente" type="text" {{ $isDisabled ? 'disabled' : '' }}>
                <x-input-error for="lead.nombre_cliente" />
            </div>
            {{-- Medios CESRH --}}
            <div class="mx-2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase ">
                    Medios CESRH
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.medios_cesrh" type="text" {{ $isDisabled ? 'disabled' : '' }}>
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
            {{-- Nombre de empresa --}}
            <div class="mx-2 text-center ">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Nombre de empresa
                </label>
                <select wire:model="lead.crm_empresas_id" {{ $isDisabled ? 'disabled' : '' }}
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" disabled>Seleccione una empresa</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- Puesto --}}
        <div class="grid justify-center w-full grid-cols-3 gap-4 px-10 py-4">
            <div class="mx-2 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Puesto
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.puesto" type="text" {{ $isDisabled ? 'disabled' : '' }}>
                <x-input-error for="lead.puesto" />
            </div>
            {{-- Telefono --}}
            <div class="mx-2 mb-4 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Telefono
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.telefono" type="number" {{ $isDisabled ? 'disabled' : '' }}>
                <x-input-error for="lead.telefono" />
            </div>
            {{-- Correo --}}
            <div class="mx-2 text-center">
                <label class="mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Correo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.correo" type="email" {{ $isDisabled ? 'disabled' : '' }}>
                <x-input-error for="lead.correo" />
            </div>
        </div>
        {{-- Contacto alternativo --}}
        <div class="grid justify-center w-full grid-cols-1 gap-4 px-10 py-4">
            <div class="mx-4 text-center">
                <h2 class="block mb-2 text-xl font-bold tracking-wide text-cyan-700 uppercase">
                    En caso de estar ausente, ¿a quién podemos contactar?
                </h2>
            </div>
        </div>
        <div class="grid justify-center w-full grid-cols-2 gap-2 px-10 py-4 bg-white rounded-lg shadow-lg">
            {{-- Contacto Alternativo --}}
            <div class="mx-2 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Nombre de contacto alternativo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.nombre_contacto_2" type="text" {{ $isDisabled ? 'disabled' : '' }}>
                <x-input-error for="lead.nombre_contacto_2" />
            </div>
            <div class="mx-2 text-center">
                {{-- Puesto Alternativo --}}
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Puesto Alternativo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.puesto_contacto_2" type="text" {{ $isDisabled ? 'disabled' : '' }}>
                <x-input-error for="lead.puesto_contacto_2" />
            </div>
        </div>
        <div class="grid justify-center w-full grid-cols-2 gap-2 px-10 bg-white rounded-lg mb-7">
            {{-- Correo alternativo --}}
            <div class="mx-2 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Correo Alternativo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.correo_2" type="email" {{ $isDisabled ? 'disabled' : '' }}>
                <x-input-error for="lead.correo_2" />
            </div>
            {{-- Telefono --}}
            <div class="mx-2 text-center">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                    Telefono Alternativo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="lead.telefono_2" type="number" {{ $isDisabled ? 'disabled' : '' }}>
                <x-input-error for="lead.telefono_2" />
            </div>
        </div>
        {{-- Botones --}}
        <div class="flex items-center justify-center mb-5">
            <div x-data="{ show: true }" x-show="show" x-transition x-init="@this.on('message', () => {
                show = false;
            });">
                <button wire:click="saveLead()"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 m-2 active:bg-blue-700 active:shadow-inner active:shadow-gray-900">
                    Agregar
                </button>
                <a href="{{ url('/crm/crm-inicio') }}" x-data x-show="!show" x-transition
                    class="px-4 py-2 font-bold text-white bg-red-500 rounded btn hover:bg-red-700 m-2">
                    Ir a inicio
                </a>
            </div>
            <div class="flexed bottom-4 left-1/2 transform -translate-x-1/2  bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3"
                x-data="{ show: false }" x-show="show" x-transition x-init="@this.on('message', () => { show = true; });" role="alert">
                <p class="text-sm">Lead registado con éxito</p>
            </div>
        </div>
    </div>
    <div class="w-full bg-white border-2 rounded-lg mt-4">
        <div class="p-4">
            <div class="flex text-center">
                <button wire:click='uno'
                    class="flex-1 px-4 py-2 mx-2 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 active:shadow-none">
                    E-Smart
                </button>
                <a href="#form2" wire:click="dos"
                    class="flex-1 px-4 py-2 mx-2 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 active:shadow-none">
                    Training
                </a>
                <a href="#form3" wire:click="tres"
                    class="flex-1 px-4 py-2 mx-2 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 active:shadow-none">
                    HeadHunting
                </a>
                <a href="#form4" wire:click="cuatro"
                    class="flex-1 px-4 py-2 mx-2 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 active:shadow-none">
                    Nom 035
                </a>
                <a href="#form5" wire:click="quinto"
                    class="flex-1 px-4 py-2 mx-2 border-2 border-gray-900 rounded-md shadow-md shadow-gray-900 active:shadow-none">
                    Otros
                </a>
            </div>
        </div>
    </div>

    @if ($paginacion == 1)
        <div>
            @for ($i = 0; $i < $duplicados; $i++)
                <div class="m-4 bg-white rounded-lg shadow-md shadow-gray-300">
                    <div class="text-center">
                        <h1 class="p-10 text-3xl font-bold">
                            Formulario de E-Smart
                        </h1>
                    </div>
                    <div class="grid justify-center w-full grid-cols-3 gap-2 px-10 bg-white rounded-lg mb-7">
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Nombre del curso
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.nombre_curso" type="text">
                            <x-input-error for="university.nombre_curso" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Cuantos participantes son?
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.participantes" type="text">
                            <x-input-error for="university.participantes" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Departamentos participantes
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.departamentos_participan" type="text">
                            <x-input-error for="university.departamentos_participan" />
                        </div>
                    </div>
                    <div class="grid justify-center w-full grid-cols-4 gap-2 px-10 bg-white rounded-lg mb-7">
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Fecha habilitada
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.fecha_habilitada" type="date">
                            <x-input-error for="university.fecha_habilitada" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Dc3 Requerida?
                            </label>
                            <select wire:model.defer="university.dc3_requieren"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" disabled>---</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Que puestos participan?
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.puestos_participan" type="text">
                            <x-input-error for="university.puestos_participan" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Nuevo o Existente
                            </label>
                            <select wire:model.live='curso'
                                class="curso block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" disabled>------------</option>
                                <option value="existente">Existente</option>
                                <option value="nuevo">Nuevo</option>
                            </select>
                        </div>
                    </div>
                    @if ($curso == 'nuevo')
                        <div class="grid justify-center w-full grid-cols-3 gap-2 px-10 bg-white rounded-lg mb-7">
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Nombre del nuevo curso
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="university.nuevo_curso" type="text">
                                <x-input-error for="university.nuevo_curso" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Horas
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="university.horas_nuevo" type="number">
                                <x-input-error for="university.horas_nuevo" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Tipo de curso
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="university.tipo_curso" type="text">
                                <x-input-error for="university.tipo_curso" />
                            </div>
                        </div>
                    @endif
                    <div class="flex justify-center bg-white rounded-lg">
                        <button wire:click = "guardarEsmart()" wire:loading.attr="disabled"
                            class="p-2 my-6 mr-10 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 active:shadow-none active:bg-green-800 ">
                            Guardar y Agregar
                        </button>
                    </div>
                </div>
            @endfor
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
                <div class="grid justify-center w-full grid-cols-4 gap-4 px-10 py-4">
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Nombre del Curso
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="training.nombre_curso" type="text">
                        <x-input-error for="training.nombre_curso" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Modaliddad
                        </label>
                        <select wire:model.defer="training.modalidad"
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" disabled>---</option>
                            <option value="presencial">Presencial</option>
                            <option value="online">Online</option>
                        </select>
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Participantes
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="training.participantes" type="text">
                        <x-input-error for="training.participantes" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Cantidad de grupos
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="training.grupos" type="number">
                        <x-input-error for="training.grupos" />
                    </div>
                </div>
                <div class="grid justify-center w-full grid-cols-3 gap-4 px-10 py-4">
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Puestos participantes
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="training.puestos_participantes" type="text">
                        <x-input-error for="training.puestos_participantes" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            ¿Cuenta con experiencia?
                        </label>
                        <select wire:model.defer="training.experiencia"
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" disabled>---</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            ¿Cual?
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="training.cual" type="text">
                        <x-input-error for="training.cual" />
                    </div>
                </div>
                <div class="grid justify-center w-full grid-cols-3 gap-4 px-10 py-4">
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Objetivo del curso
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="training.objetivo_curso" type="text">
                        <x-input-error for="training.objetivo_curso" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Fecha tentativa
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="training.fecha_tentativa" type="date">
                        <x-input-error for="training.fecha_tentativa" />
                    </div>
                    <div class="mx-2 text-center">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                            Presupuesto asignado
                        </label>
                        <input
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model.defer="training.presupuesto" type="number">
                        <x-input-error for="training.presupuesto" />
                    </div>
                </div>
                <div class="flex justify-center bg-white rounded-lg">
                    <button wire:click = "guardarTraining" wire:loading.attr="disabled"
                        class="p-2 my-6 mr-10 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 active:shadow-none active:bg-green-800 ">
                        Guardar y Agregar
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
                    <div class="grid justify-center w-full px-10 py-4 bg-white rounded-lg shadow-lg">
                        {{-- Tipo de servicio --}}
                        <div class="mx-2">
                            <h2 class="mb-2 text-sm font-bold tracking-wide text-center text-cyan-700 uppercase ">
                                Tipo de servicio
                            </h2>
                            {{-- Servicios operativos --}}
                            <label class="mb-2 text-sm font-bold tracking-wide text-center text-gray-700 uppercase ">
                                <input type="checkbox" name="" id="" wire:model='mostrarOperativo'>
                                <span>Servicios operativos</span>
                                <x-input-error for="hh.tipo_servicio.operativos" />
                            </label>
                            {{-- Operativos --}}
                            @if ($mostrarOperativo)
                                <div class="mx-2">
                                    <input
                                        class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        wire:model.defer="hh.operativos" type="number">
                                    <x-input-error for="hh.operativos" />
                                </div>
                            @endif
                            {{-- Servicios Espescializados --}}
                            <label class="mb-2 text-sm font-bold tracking-wide text-center text-gray-700 uppercase ">
                                <input type="checkbox" name="" id=""
                                    wire:model='hh.tipo_servicio.especializados'>
                                <span>Servicios especializados</span>
                            </label>
                            <input name="Operativos" class="focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hh.tipo_servicio.operativos" type="checkbox">
                            <label for="Operativos">Operativos</label>
                            <x-input-error for="hh.tipo_servicio.operativos" />
                            <input name="especializados"
                                class="focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hh.tipo_servicio.especializados" type="checkbox">
                            <x-input-error for="hh.tipo_servicio.especializados" />
                            <label for="especializados">Especializados</label>
                            <input name="Ejecutivos" class="focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hh.tipo_servicio.ejecutivos" type="checkbox">
                            <label for="Ejecutivos">Ejecutivos</label>
                            <x-input-error for="hh.tipo_servicio.ejecutivos" />

                        </div>
                    </div>
                    <div class="grid justify-center w-full grid-cols-3 gap-4 px-10 py-4 bg-white rounded-lg shadow-lg">
                        {{-- Operativos --}}
                        <div class="mx-2">
                            <label
                                class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase ">
                                Operativos
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hh.operativos" type="number">
                            <x-input-error for="hh.operativos" />
                        </div>
                        {{-- Especializados --}}
                        <div class="mx-2">
                            <label
                                class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase ">
                                Especializados
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hh.especializados" type="number">
                            <x-input-error for="hh.especializados" />
                        </div>
                        {{-- Ejecutivos --}}
                        <div class="mx-2">
                            <label
                                class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase ">
                                Ejecutivos
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hh.ejecutivos" type="number">
                            <x-input-error for="hh.ejecutivos" />
                        </div>
                    </div>
                    <div class="grid justify-center w-full grid-cols-3 gap-4 px-10 py-4 bg-white rounded-lg shadow-lg">
                        {{-- Numero de pedido --}}
                        <div class="mx-2">
                            <label
                                class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase ">
                                Numero de pedido
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="hh.numero_pedido" type="text">
                            <x-input-error for="hh.numero_pedido" />
                        </div>
                        {{-- Total de Vacantes --}}
                        <div class="mx-2">
                            <label
                                class="block mb-2 text-xs font-bold tracking-wide text-center text-gray-700 uppercase ">
                                Total de Vacantes
                            </label>
                        </div>
                    </div>
                    {{-- Botones --}}
                    <div class="flex items-center justify-center">
                        <div x-data="{ show: true }" x-show="show" x-transition x-init="@this.on('message', () => {
                            show = false;
                        });">
                            <button wire:click="saveHead()"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 m-2">
                                Agregar
                            </button>
                            <a href="{{ url('/crm/crm-inicio') }}" x-data x-show="!show" x-transition
                                class="px-4 py-2 font-bold text-white bg-red-500 rounded btn hover:bg-red-700 m-2">
                                Ir a inicio
                            </a>
                        </div>
                        <div x-data="{ show: false }" x-show="show" x-transition x-init="@this.on('message', () => {
                            show = true;
                        });"
                            class="justify-center flexed bottom-4 left-1/2 transform -translate-x-1/2  bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3"
                            role="alert">
                            <p class="text-sm">Lead registado con éxito</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    @endif

    @if ($paginacion == 4)
        <div>
            @for ($i = 0; $i < $duplicados; $i++)
                <div class="m-4 bg-white rounded-lg shadow-md shadow-gray-300">
                    <div class="text-center">
                        <h1 class="p-10 text-3xl font-bold">
                            Nom 035
                        </h1>
                    </div>
                    <div class="grid justify-center w-full grid-cols-3 gap-2 px-10 bg-white rounded-lg mb-7">
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Nombre del curso
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.nombre_curso" type="text">
                            <x-input-error for="university.nombre_curso" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Cuantos participantes son?
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.participantes" type="text">
                            <x-input-error for="university.participantes" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Departamentos participantes
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.departamentos_participan" type="text">
                            <x-input-error for="university.departamentos_participan" />
                        </div>
                    </div>
                    <div class="grid justify-center w-full grid-cols-4 gap-2 px-10 bg-white rounded-lg mb-7">
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Fecha habilitada
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.fecha_habilitada" type="date">
                            <x-input-error for="university.fecha_habilitada" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Dc3 Requerida?
                            </label>
                            <select wire:model.defer="university.dc3_requieren"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" disabled>---</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Que puestos participan?
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.puestos_participan" type="text">
                            <x-input-error for="university.puestos_participan" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Nuevo o Existente
                            </label>
                            <select wire:model.live='curso'
                                class="curso block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" disabled>------------</option>
                                <option value="existente">Existente</option>
                                <option value="nuevo">Nuevo</option>
                            </select>
                        </div>
                    </div>
                    @if ($curso == 'nuevo')
                        <div class="grid justify-center w-full grid-cols-3 gap-2 px-10 bg-white rounded-lg mb-7">
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Nombre del nuevo curso
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="university.nuevo_curso" type="text">
                                <x-input-error for="university.nuevo_curso" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Horas
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="university.horas_nuevo" type="number">
                                <x-input-error for="university.horas_nuevo" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Tipo de curso
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="university.tipo_curso" type="text">
                                <x-input-error for="university.tipo_curso" />
                            </div>
                        </div>
                    @endif
                    <div class="flex justify-center bg-white rounded-lg">
                        <button wire:click = "guardarEsmart()" wire:loading.attr="disabled"
                            class="p-2 my-6 mr-10 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 active:shadow-none active:bg-green-800 ">
                            Guardar y Agregar
                        </button>
                    </div>
                </div>
            @endfor
        </div>
    @endif

    @if ($paginacion == 5)
        <div>
            @for ($i = 0; $i < $duplicados; $i++)
                <div class="m-4 bg-white rounded-lg shadow-md shadow-gray-300">
                    <div class="text-center">
                        <h1 class="p-10 text-3xl font-bold">
                            Formulario de E-Smart
                        </h1>
                    </div>
                    <div class="grid justify-center w-full grid-cols-3 gap-2 px-10 bg-white rounded-lg mb-7">
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Nombre del curso
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.nombre_curso" type="text">
                            <x-input-error for="university.nombre_curso" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Cuantos participantes son?
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.participantes" type="text">
                            <x-input-error for="university.participantes" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Departamentos participantes
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.departamentos_participan" type="text">
                            <x-input-error for="university.departamentos_participan" />
                        </div>
                    </div>
                    <div class="grid justify-center w-full grid-cols-4 gap-2 px-10 bg-white rounded-lg mb-7">
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Fecha habilitada
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.fecha_habilitada" type="date">
                            <x-input-error for="university.fecha_habilitada" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Dc3 Requerida?
                            </label>
                            <select wire:model.defer="university.dc3_requieren"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" disabled>---</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Que puestos participan?
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model.defer="university.puestos_participan" type="text">
                            <x-input-error for="university.puestos_participan" />
                        </div>
                        <div class="mx-2 text-center">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                Nuevo o Existente
                            </label>
                            <select wire:model.live='curso'
                                class="curso block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" disabled>------------</option>
                                <option value="existente">Existente</option>
                                <option value="nuevo">Nuevo</option>
                            </select>
                        </div>
                    </div>
                    @if ($curso == 'nuevo')
                        <div class="grid justify-center w-full grid-cols-3 gap-2 px-10 bg-white rounded-lg mb-7">
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Nombre del nuevo curso
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="university.nuevo_curso" type="text">
                                <x-input-error for="university.nuevo_curso" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Horas
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="university.horas_nuevo" type="number">
                                <x-input-error for="university.horas_nuevo" />
                            </div>
                            <div class="mx-2 text-center">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                    Tipo de curso
                                </label>
                                <input
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border-2 border-black rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.defer="university.tipo_curso" type="text">
                                <x-input-error for="university.tipo_curso" />
                            </div>
                        </div>
                    @endif
                    <div class="flex justify-center bg-white rounded-lg">
                        <button wire:click = "guardarEsmart()" wire:loading.attr="disabled"
                            class="p-2 my-6 mr-10 font-semibold text-white bg-green-600 rounded-md shadow-md shadow-gray-500 active:shadow-none active:bg-green-800 ">
                            Guardar y Agregar
                        </button>
                    </div>
                </div>
            @endfor
        </div>
    @endif
</div>
{{-- <div class="flex justify-end mr-10">
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
                        </button>
                    </div> --}}
