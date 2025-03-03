@section('css')
    <!--Select2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--single {
            border: 4px solid rgb(3, 168, 221);
            height: 47px;
            line-height: 28px;
            border-radius: 10px;
        }

        .select2 {
            width: 100%;
        }
    </style>
@endsection

@section('js')
    <!-- Asegúrate de cargar primero jQuery y luego Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializa Select2 en los selects
            $('#empresa').select2({
                width: '100%' // Asegúrate de que ocupe todo el ancho
            });

            $('#sucursall').select2({
                width: '100%' // Asegúrate de que ocupe todo el ancho
            });

            // Cambios en el select de empresa
            $('#empresa').on('change', function() {
                @this.set('empresaSeleccionada', this.value);
            });

            // Cambios en el select de sucursal
            $('#sucursall').on('change', function() {
                @this.set('sucursal_id', this.value);
            });
        });
    </script>
@endsection

<div>
    <div class="h-screen overflow-y-auto">
        <div class="my-5">
            <!-- Título con degradado y sombra más pronunciada -->
            <div
                class="bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] text-white font-bold text-xl py-4 px-6 rounded-t-lg shadow-lg">
                <h1 class="text-center text-2xl sm:text-3xl font-bold text-white">Asignar Activo</h1>
            </div>
            <div class="bg-white rounded-b-lg p-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Select de Empresa -->
                    <div class="my-2">
                        <div class="py-2 my-2">
                            <label for="empresa" class="text-gray-700 font-bold text-xl">Empresa</label>
                        </div>
                        <select id="empresa"
                            class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black"
                            wire:model="empresaSeleccionada">
                            <option value="">Selecciona la empresa</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="empresaSeleccionada" />
                    </div>

                    <!-- Select de Sucursal -->
                    <div class="my-2">
                        <div class="py-2 my-2">
                            <label for="nombre" class="text-gray-700 font-bold text-xl">Sucursal</label>
                        </div>
                        <select id="sucursall"
                            class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black"
                            wire:model="sucursal_id">
                            <option value="">Selecciona la sucursal</option>
                            @foreach ($sucursalesFiltradas as $su)
                                <option value="{{ $su->id }}">{{ $su->nombre_sucursal }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="sucursal_id" />
                    </div>

                    <!-- Select de Activo de Tecnología -->
                    <div class="my-2">
                        <div class="py-2 my-2">
                            <label for="activo" class="text-gray-700 font-bold text-xl">Activo Oficina</label>
                        </div>
                        <select wire:model.live="activoSeleccionado" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black">
                            <option value="">Seleccione un activo</option>
                            @foreach ($activosFiltrados as $activo)
                                <option value="{{ $activo->id }}">{{ $activo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Select de Usuario -->
                    <div class="my-2">
                        <div class="py-2 my-2">
                            <label for="usuario" class="text-gray-700 font-bold text-xl">Usuario</label>
                        </div>
                        <select wire:model.live="usuarioSeleccionado" id="usuario" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black">
                            <option value="">Seleccione un usuario</option>
                            @foreach ($usuariosFiltrados as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Campo para observaciones -->
                    <div class="my-2 sm:col-span-2 pb-2 pt-3">
                        <div class="py-2 my-2">
                            <label for="observaciones" class="text-gray-700 font-bold text-xl">Observaciones</label>
                        </div>
                        <input type="text" id="observaciones" wire:model="observaciones"
                            class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black">
                        <x-input-error for="observaciones" />
                    </div>

                    <!-- Carga de Imágenes -->
                    <div class="my-2 sm:col-span-2">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <!-- Imagen 1 -->
                            <div class="image-container">
                                <label
                                    class="mx-auto cursor-pointer flex w-full flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Imagen 1</h2>
                                    <p class="mt-2 text-gray-500 tracking-wide">Carge su archivo PNG o JPG</p>
                                    <input type="file" class="hidden" wire:model="subirfoto1" />
                                    <br>
                                    @if ($subirfoto1)
                                        <img src="{{ $subirfoto1->temporaryUrl() }}" width="100" height="100"
                                            alt="Imagen 1" />
                                    @endif
                                    <x-input-error for="subirfoto1" />
                                </label>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Botón de Guardar -->
                <div class="flex justify-center mt-4 py-3">
                    <button wire:click="asignarActivo"
                        class="bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] text-white px-6 py-2 rounded-lg shadow-lg font-bold hover:bg-[#1763A6]">Asignar</button>
                </div>
            </div>
        </div>
    </div>
</div>

