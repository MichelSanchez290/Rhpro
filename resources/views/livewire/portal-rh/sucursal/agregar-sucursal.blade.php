<div class="container mx-auto px-4">
    <div class="mt-6">
        <!-- Primera fila -->
        <div class="flex flex-wrap -mx-2 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="clave-sucursal">
                    Clave Sucursal
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="sucursal.clave_sucursal" type="text" placeholder="">
                <x-input-error for="sucursal.clave_sucursal" />
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre-sucursal">
                    Nombre Sucursal
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="sucursal.nombre_sucursal" type="text" placeholder="">
                <x-input-error for="sucursal.nombre_sucursal" />
            </div>
        </div>

        <!-- Segunda fila -->
        <div class="flex flex-wrap -mx-2 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="zona-economica">
                    Zona Económica
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="sucursal.zona_economica" type="text" placeholder="">
                <x-input-error for="sucursal.zona_economica" />
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="estado">
                    Estado
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="sucursal.estado" type="text" placeholder="">
                <x-input-error for="sucursal.estado" />
            </div>
        </div>

        <!-- Tercera fila -->
        <div class="flex flex-wrap -mx-2 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cuenta-contable">
                    Cuenta Contable
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="sucursal.cuenta_contable" type="text" placeholder="">
                <x-input-error for="sucursal.cuenta_contable" />
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="rfc">
                    RFC
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="sucursal.rfc" type="text" placeholder="">
                <x-input-error for="sucursal.rfc" />
            </div>
        </div>

        <!-- Cuarta fila -->
        <div class="flex flex-wrap -mx-2 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="correo">
                    Correo
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="sucursal.correo" type="email" placeholder="">
                <x-input-error for="sucursal.correo" />
            </div>

            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="telefono">
                    Teléfono
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="sucursal.telefono" type="text" placeholder="">
                <x-input-error for="sucursal.telefono" />
            </div>
        </div>

        <!-- Sexta fila -->
        <div class="flex flex-wrap -mx-2 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">
                    Status
                </label>
                <div class="relative">
                    <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        wire:model.defer="sucursal.status">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <x-input-error for="sucursal.status" />
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="registro_patronal_id">
                    Registro Patronal
                </label>
                <select id="registro_patronal_id" wire:model.defer="sucursal.registro_patronal_id" 
                    class="appearance-none block w-full bg-gray-200 border rounded py-3 px-4 mb-3">
                    <option value="">Seleccione un usuario</option>
                    @foreach ($regpatronales as $regpatronal)
                        <option value="{{ $regpatronal->id }}">{{ $regpatronal->registro_patronal }}</option>
                    @endforeach
                </select>
                <x-input-error for="sucursal.registro_patronal_id" />
            </div>
        </div>

        
        <!-- Sexta fila -->
        
        

        <!-- Botón -->
        <div class="flex items-center justify-center">
            <button wire:click="saveSucursal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Agregar
            </button>
        </div>
    </div>
</div>
