<div class="">
    <div class="mt-6 container mx-auto px-4">
        <!-- Primera fila -->
        <div class="flex flex-wrap -mx-2 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre">
                    Nombre
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="nombre" type="text" placeholder="Nombre de la empresa">
                <x-input-error for="nombre" />
            </div>

            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="razon_social">
                    Razón Social
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="razon_social" type="text" placeholder="Razón social">
                <x-input-error for="razon_social" />
            </div>
        </div>

        <!-- Segunda fila -->
        <div class="flex flex-wrap -mx-2 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="rfc">
                    RFC
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="rfc" type="text" placeholder="RFC de la empresa">
                <x-input-error for="rfc" />
            </div>

            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre_comercial">
                    Nombre Comercial
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="nombre_comercial" type="text" placeholder="Nombre comercial">
                <x-input-error for="nombre_comercial" />
            </div>
        </div>

        <!-- Tercera fila -->
        <div class="flex flex-wrap -mx-2 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pais_origen">
                    País de Origen
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="pais_origen" type="text" placeholder="País de origen">
                <x-input-error for="pais_origen" />
            </div>

            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="representante_legal">
                    Representante Legal
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="representante_legal" type="text" placeholder="Representante legal">
                <x-input-error for="representante_legal" />
            </div>
        </div>

        <!-- Cuarta fila -->
        <div class="flex flex-wrap -mx-2 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="url_constancia_situacion_fiscal">
                    URL Constancia de Situación Fiscal
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                    wire:model.defer="url_constancia_situacion_fiscal" type="url" placeholder="https://...">
                <x-input-error for="url_constancia_situacion_fiscal" />
            </div>
        </div>

        <!-- Botón -->
        <div class="flex items-center justify-center">
            <button wire:click="actualizarEmpres()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Actualizar
            </button>
        </div>
    </div>
</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    timerProgressBar: true,
                });
            });
        });
    </script>
@endpush
