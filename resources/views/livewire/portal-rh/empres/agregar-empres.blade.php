<div class="flex min-h-screen items-center justify-center py-3">
    <div class="grid bg-white rounded-lg shadow-xl w-full">
        <div class="flex justify-center py-4">
            <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="15"
                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                    <path fill="#ffffff"
                        d="M48 0C21.5 0 0 21.5 0 48L0 464c0 26.5 21.5 48 48 48l96 0 0-80c0-26.5 21.5-48 48-48s48 21.5 48 48l0 80 96 0c26.5 0 48-21.5 48-48l0-416c0-26.5-21.5-48-48-48L48 0zM64 240c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32zm112-16l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32zM80 96l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32zM272 96l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16z" />
                </svg>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="flex">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Registrar Empresa</h1>
            </div>
        </div>

        <div class="relative mb-4">
            <div class="flex items-center justify-between">
                @if (session()->has('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => {
                        show = false;
                        window.location.href = '{{ route('mostrarempresas') }}'
                    }, 3000)" x-show="show"
                        class="fixed top-4 left-4 max-w-xs w-full bg-green-500 text-white shadow-lg rounded-lg p-4 flex items-center space-x-3 transition-transform transform hover:scale-105 z-50">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                        </svg>
                        <div class="flex-1">
                            <p class="font-bold">{{ session('message') }}</p>
                            @if (session('message') == 'Empresa Agregada.')
                                <p class="text-sm">La Empresa ha sido agregada correctamente</p>
                            @endif
                        </div>
                        <button @click="show = false" class="text-white hover:text-gray-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endif

            </div>
        </div>

        <form class="mt-5 mx-7">
            <!-- Nombre -->
            <div class="grid grid-cols-1">
                <label for="nombre"
                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                <input wire:model.defer="empresa.nombre" type="text" id="nombre"
                    placeholder="Nombre de la empresa"
                    class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                <x-input-error for="empresa.nombre" />
            </div>

            <!-- Razón Social y RFC -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label for="razon_social"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Razón
                        Social</label>
                    <input wire:model.defer="empresa.razon_social" type="text" id="razon_social"
                        placeholder="Razón social"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                    <x-input-error for="empresa.razon_social" />
                </div>

                <div class="grid grid-cols-1">
                    <label for="rfc"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                    <input wire:model.defer="empresa.rfc" type="text" id="rfc" placeholder="RFC"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                    <x-input-error for="empresa.rfc" />
                </div>
            </div>

            <!-- Nombre Comercial -->
            <div class="grid grid-cols-1 mt-5">
                <label for="nombre_comercial"
                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre
                    Comercial</label>
                <input wire:model.defer="empresa.nombre_comercial" type="text" id="nombre_comercial"
                    placeholder="Nombre comercial"
                    class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                <x-input-error for="empresa.nombre_comercial" />
            </div>

            <!-- País de Origen -->
            <div class="grid grid-cols-1 mt-5">
                <label for="pais_origen"
                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">País de
                    Origen</label>
                <input wire:model.defer="empresa.pais_origen" type="text" id="pais_origen"
                    placeholder="País de origen"
                    class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                <x-input-error for="empresa.pais_origen" />
            </div>

            <!-- Representante Legal -->
            <div class="grid grid-cols-1 mt-5">
                <label for="representante_legal"
                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                    Representante Legal
                </label>
                <input wire:model.defer="empresa.representante_legal" type="text" id="representante_legal"
                    placeholder="Representante legal"
                    class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                <x-input-error for="empresa.representante_legal" />
            </div>

            <div class="flex flex-col md:flex-row gap-5 mt-5">
                <!-- URL Constancia -->
                <div class="flex flex-col items-center w-full md:w-1/2">
                    <label for="pdfConstancia" class="uppercase text-lg md:text-xl text-gray-600 font-semibold mb-4">
                        Constancia Situación Fiscal
                    </label>

                    <!-- Área de carga de archivos -->
                    <div class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center"
                        onclick="document.getElementById('fileInput').click()" ondragover="event.preventDefault()"
                        ondrop="handleDrop(event)">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>

                        <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Adjuntar archivo</h2>
                        <p class="mt-2 text-gray-500 tracking-wide">Seleccione o arrastre su archivo aquí</p>

                        <!-- Input oculto, activado al hacer clic -->
                        <input type="file" id="fileInput" class="hidden" wire:model.defer="pdfConstancia"
                            accept=".pdf" />

                        <br>

                        @if ($pdfConstancia)
                            <img src="{{ asset('img/pdf_icon.jpeg') }}" alt="PDF Icon" width="100"
                                height="100">
                        @endif
                    </div>

                    <!-- Mensaje de error -->
                    <x-input-error for="pdfConstancia" class="text-red-600 text-sm mt-2" />
                </div>

                <!-- Logo de la empresa -->
                <div class="flex flex-col items-center w-full md:w-1/2">
                    <label for="subirLogo" class="uppercase text-lg md:text-xl text-gray-600 font-semibold mb-4">
                        Logo de la empresa
                    </label>

                    <!-- Área de carga de archivos -->
                    <div class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-green-400 bg-white p-6 text-center"
                        onclick="document.getElementById('logoInput').click()" ondragover="event.preventDefault()"
                        ondrop="handleDropTwo(event)">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>

                        <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Adjuntar archivo PNG o JPG
                        </h2>
                        <p class="mt-2 text-gray-500 tracking-wide">Seleccione o arrastre su archivo aquí</p>

                        <!-- Input oculto, activado al hacer clic -->
                        <input type="file" id="logoInput" class="hidden" wire:model="subirLogo"
                            accept=".png,.jpg,.jpeg" />

                        <br>

                        @if ($subirLogo)
                            <img src="{{ $subirLogo->temporaryUrl() }}" width="100" height="100"
                                alt="Logo de la empresa" class="mt-2">
                        @endif
                    </div>

                    <!-- Mensaje de error -->
                    <x-input-error for="subirLogo" class="text-red-600 text-sm mt-2" />
                </div>
            </div>

            <!-- Botones -->
            <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>

                <button type="button" wire:click="saveEmpres"
                    class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    Agregar Empresa
                </button>

                <button type="button" wire:click="redirigir"
                    class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function handleDrop(event) {
        event.preventDefault();
        const fileInput = document.getElementById('fileInput');
        if (event.dataTransfer.files.length > 0) {
            fileInput.files = event.dataTransfer.files;
            fileInput.dispatchEvent(new Event('change')); // Dispara el evento de cambio
        }
    }

    function handleDropTwo(event) {
        event.preventDefault();
        const logoInput = document.getElementById('logoInput');
        if (event.dataTransfer.files.length > 0) {
            logoInput.files = event.dataTransfer.files;
            logoInput.dispatchEvent(new Event('change')); // Dispara el evento de cambio
        }
    }
</script>
