<div class="container mx-auto px-4 mt-6">
    <div class="flex flex-wrap -mx-2 mb-6">
        <!-- Clave Sucursal -->
        <div class="w-full md:w-1/2 px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="clave_sucursal">
                Clave Sucursal
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                wire:model.defer="clave_sucursal" type="text" placeholder="Clave Sucursal">
            <x-input-error for="clave_sucursal" />
        </div>

        <!-- Nombre Sucursal -->
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre_sucursal">
                Nombre Sucursal
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                wire:model.defer="nombre_sucursal" type="text" placeholder="Nombre Sucursal">
            <x-input-error for="nombre_sucursal" />
        </div>
    </div>

    <!-- Segunda fila -->
    <div class="flex flex-wrap -mx-2 mb-6">
        <!-- Zona Económica -->
        <div class="w-full md:w-1/2 px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="zona_economica">
                Zona Económica
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                wire:model.defer="zona_economica" type="text" placeholder="Zona Económica">
            <x-input-error for="zona_economica" />
        </div>

        <!-- Estado -->
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="estado">
                Estado
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                wire:model.defer="estado" type="text" placeholder="Estado">
            <x-input-error for="estado" />
        </div>
    </div>

    <!-- Tercera fila -->
    <div class="flex flex-wrap -mx-2 mb-6">
        <!-- Correo -->
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="correo">
                Correo
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                wire:model.defer="correo" type="email" placeholder="Correo Electrónico">
            <x-input-error for="correo" />
        </div>

        <!-- Teléfono -->
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="telefono">
                Teléfono
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                wire:model.defer="telefono" type="text" placeholder="Teléfono">
            <x-input-error for="telefono" />
        </div>
    </div>


    <!-- Cuarta fila -->
    <div class="flex flex-wrap -mx-2 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">
                Status
            </label>
            <div class="relative">
                <select
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="status">
                    <option value="" selected>-- Selecciona una opción --</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <x-input-error for="status" />
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="registro_patronal_id">
                Registro Patronal
            </label>
            <select id="registro_patronal_id" wire:model.defer="registro_patronal_id" 
                class="appearance-none block w-full bg-gray-200 border rounded py-3 px-4 mb-3">
                <option value="">Seleccione un usuario</option>
                @foreach ($regpatronales as $regpatronal)
                    <option value="{{ $regpatronal->id }}">{{ $regpatronal->registro_patronal }}</option>
                @endforeach
            </select>
            <x-input-error for="registro_patronal_id" />
        </div>
    </div>



    <!-- Botón -->
    <div class="flex items-center justify-center">
        <button wire:click="actualizarSucursal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Actualizar
        </button>
    </div>
</div>

@push('js')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('editBann', function(message) {
                Swal.fire({
                    icon: 'success',
                    title: message,
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000,
                });
            });
        });
    </script>
@endpush
