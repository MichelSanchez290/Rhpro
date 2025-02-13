<div>
    <div class="container px-4 mx-auto mt-6">
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Nombre de Contacto
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.nombre_contacto" type="text" placeholder="">
                <x-input-error for="leadcliente.nombre_contacto" />
            </div>
        </div>
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Usuario
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.users_id" type="text" placeholder="">
                <x-input-error for="leadcliente.users_id" />
                {{-- <select id="estado" name="estado"
                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.users_id">
                    <option value="{{ $user->id }}"disabled>-------</option>
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    <option value="{{ $user->id }}" selected="true">{{ $user->name }}</option>
                </select> --}}
            </div>
        </div>
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Numero de cliente
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.numero_cliente" type="text" placeholder="">
                <x-input-error for="leadcliente.numero_cliente" />
            </div>
        </div>
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Fecha
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.fecha" type="date" placeholder="" min="1900-01-01"
                    max="2099-12-31">
                <x-input-error for="leadcliente.fecha" />
            </div>
        </div>
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Hora
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.hora" type="time" placeholder="" step=1>
                <x-input-error for="leadcliente.hora" />
            </div>
        </div>
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Razon Social
                </label>
                <select id="estado" name="estado"
                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.datos_id">
                    <option disabled>Seleccione una opcion</option>
                    <option>-----------------------------------</option>
                    @foreach ($dato as $datos)
                        <option value="{{ $datos->id }}">{{ $datos->razon_social }}</option>
                    @endforeach
                </select>
                <x-input-error for="leadcliente.datos_id" />
            </div>
        </div>
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Puesto
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.puesto" type="text" placeholder="">
                <x-input-error for="leadcliente.puesto" />
            </div>
        </div>
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Correo
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.correo" type="text" placeholder="">
                <x-input-error for="leadcliente.correo" />
            </div>
        </div>
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Telefono
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.telefono" type="text" placeholder="">
                <x-input-error for="leadcliente.telefono" />
            </div>
        </div>
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="razonsocial">
                    Tipo
                </label>
                <select id="estado" name="estado"
                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="leadcliente.tipo">
                    <option disabled>Seleccione una opcion</option>
                    <option>-----------------------------------</option>
                    <option value="lead" selected>Lead</option>
                </select>
                <x-input-error for="leadcliente.tipo" />
            </div>
        </div>
        <!-- Botón -->
        <div class="flex items-center justify-center">
            <button wire:click="saveLeadCliente()"
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

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('showAnimatedToast', function(message) {
                var toastMixin = Swal.mixin({
                    toast: true,
                    icon: 'success',
                    title: message,
                    animation: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                toastMixin.fire();
            });
        });
    </script>
@endpush
