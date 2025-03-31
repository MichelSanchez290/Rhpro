<div class="flex min-h-screen items-center justify-center py-3">
    <div class="grid bg-white rounded-lg shadow-xl w-full">
        <div class="flex justify-center py-4">
            <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5"
                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                    <path fill="#ffffff"
                        d="M88.7 223.8L0 375.8 0 96C0 60.7 28.7 32 64 32l117.5 0c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7L416 96c35.3 0 64 28.7 64 64l0 32-336 0c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224l400 0c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480L32 480c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z" />
                </svg>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="flex">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Editar documento</h1>
            </div>
        </div>

        <div class="relative mb-4">
            <div class="flex items-center justify-between">
                @if (session()->has('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => {
                        show = false;
                        window.location.href = '{{ route('mostrardoc') }}'
                    }, 5000)" x-show="show"
                        class="fixed top-4 left-4 max-w-xs w-full bg-green-500 text-white shadow-lg rounded-lg p-4 flex items-center space-x-3 transition-transform transform hover:scale-105 z-50">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                        </svg>
                        <div class="flex-1">
                            <p class="font-bold">{{ session('message') }}</p>
                            @if (session('message') == 'Documento Actualizado.')
                                <p class="text-sm">El documento ha sido actualizado correctamente.</p>
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
            <div class="grid grid-cols-1 mt-5">
                <label for="nombre_usuario" class="uppercase md:text-sm text-xs text-gray-500 font-semibold">
                    Usuario
                </label>
                <input type="text" id="nombre_usuario" value="{{ $nombre_usuario }}" disabled
                    class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none" />
            </div>

            <div class="grid grid-cols-1 mt-5">
                <label for="tipo_documento" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                    Tipo de documento
                </label>
                <select wire:model.defer="tipo_documento" id="tipo_documento"
                    class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    <option value="" selected>-- Selecciona una opción --</option>
                    <option value="Acta de nacimiento">Acta de nacimiento</option>
                    <option value="CURP">CURP</option>
                    <option value="RFC">RFC</option>
                    <option value="INE">INE</option>
                    <option value="Comprobante de domicilio">Comprobante de domicilio</option>
                    <option value="Comprobante de estudios">Comprobante de estudios</option>
                    <option value="CV actualizado">CV actualizado</option>
                    <option value="Constancia de capacitación">Constancia de capacitación</option>
                </select>

                <x-input-error for="tipo_documento" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="fecha_subida"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Fecha
                    </label>
                    <input wire:model.defer="fecha_subida" type="date" id="fecha_subida"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />


                    <x-input-error for="fecha_subida" />
                </div>

                <div class="grid grid-cols-1 mt-5">
                    <label for="numero" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Número de CRIP o Referencia
                    </label>
                    <input wire:model.defer="numero" type="text" id="numero" placeholder="Número"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />

                    <x-input-error for="numero" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="status" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Status
                    </label>
                    <select wire:model.defer="status" id="status"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>

                    <x-input-error for="status" />
                </div>

                <div class="grid grid-cols-1 mt-5">
                    <label for="original" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        ¿Cuentas con el documento original?
                    </label>
                    <select wire:model.defer="original" id="original"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                        <option value="No Aplica">No Aplica</option>
                    </select>

                    <x-input-error for="original" />
                </div>
            </div> 

            <div class="grid grid-cols-1 mt-5">
                <label for="comentarios" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                    Comentarios
                </label>

                <textarea wire:model.defer="comentarios" id="comentarios" rows="4" placeholder="Añade tus comentarios aquí"
                    class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent resize-y">
                </textarea>

                <x-input-error for="comentarios" />
            </div>

            <div class="flex flex-col items-center mt-5">
                <label for="subirPdf" class="uppercase text-lg md:text-xl text-gray-600 font-semibold mb-4">
                    Documento
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
                    <input type="file" id="fileInput" class="hidden" wire:model.defer="subirPdf"
                        accept=".pdf" />

                    <br>

                    @if ($subirPdf)
                        <img src="{{ asset('img/pdf_icon.jpeg') }}" alt="PDF Icon" width="100" height="100">
                    @endif
                </div>

                <!-- Mensaje de error -->
                <x-input-error for="subirPdf" />
            </div>

            <!-- Botones -->
            <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>
                <button type="button" wire:click="actualizarDocumento"
                    class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    Actualizar
                </button>

                <button type="button" onclick="window.history.back()"
                    class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
