<div>
    <div class="container px-4 mx-auto mt-6">
        <!-- Primera fila -->
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="nombre">
                    Nombre
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="empresa.nombre" type="text" placeholder="">
                <x-input-error for="empresa.nombre" />
            </div>
        </div>
        <!-- Tercera fila -->
        <div class="flex flex-wrap mb-6 -mx-2">
            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="tamano_empresa">
                    Tamaño de empresa
                </label>
                <select
                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        wire:model.defer="empresa.tamano_empresa">
                        <option value="" disabled>Seleccione un valor</option>
                        <option value="" disabled>------</option>
                        <option value="Micro">Micro</option>
                        <option value="Pequeña">Pequeña</option>
                        <option value="Mediana">Mediana</option>
                        <option value="Grande">Grande</option>
                    </select>
            </div>
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="logotipo">
                    Sitio Web
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model.defer="empresa.pagina_web" type="text" placeholder="">
                <x-input-error for="empresa.pagina_web" />
            </div>
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="logotipo">
                    Clasificacion
                </label>
                <select
                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        wire:model.defer="empresa.clasificacion">
                        <option value="" disabled>Seleccione un valor</option>
                        <option value="">------</option>
                        <option value="A+++">A+++</option>
                        <option value="A++">A++</option>
                        <option value="A+">A+</option>
                    </select>
                <x-input-error for="empresa.clasificacion" />
            </div>
        </div>

        <!-- Cuarta fila -->
        <div class="grid gap-6 mb-6 md:grid-cols-2">

            <div class="image-container">
                <label
                    class="flex flex-col items-center w-full max-w-lg p-6 mx-auto text-center bg-white border-2 border-blue-400 border-dashed cursor-pointer rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <h2 class="mt-4 text-xl font-medium tracking-wide text-gray-700">Logo</h2>
                    <p class="mt-2 tracking-wide text-gray-500">Carge su archivo PNG o JPG</p>
                    <input type="file" class="hidden" wire:model="imgagen" accept="image/png, image/jpeg" />
                    <br>
                    @if (empty($imgagen))
                    @else
                        <img src="{{ $imgagen->temporaryUrl() }}" width="100" height="100" alt="Logo" />
                    @endif
                    <x-input-error for="imgagen" />
                </label>
            </div>
        </div>
        <!-- Botón -->
        <div class="flex items-center justify-center">
            <button wire:click="saveEmpresa()"
                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                Agregar
            </button>
            <a href="{{ url('/crm/crm-mostrarEmpresa') }}"
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
