<div class="h-screen overflow-y-auto">
    <div class="my-5">
        <!-- Título con degradado y sombra más pronunciada -->
        <div
            class="bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] text-white font-bold text-xl py-4 px-6 rounded-t-lg shadow-lg">
            <h1 class="text-center text-2xl sm:text-3xl font-bold text-white">Registrar Activo de Uniforme</h1>
        </div>

        <!-- Formulario con fondo blanco y sombra más pronunciada -->
        <div class="bg-white rounded-b-lg shadow-2xl p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- codigo del Producto -->
                <div class="my-2">
                    <label for="descripcion" class="text-gray-700 font-bold text-xl">Descripcion del uniforme</label>
                    <input type="text" wire:model="activo.descripcion"
                        class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black"
                        id="descripcion" placeholder="Ingresa la descripcion del activo">
                    @error('tipos.descripcion')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Nombre del Producto -->
                <div class="my-2">
                    <label for="talla" class="text-gray-700 font-bold text-xl">Talla</label>
                    <input type="text" wire:model="activo.talla"
                        class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black"
                        id="talla" placeholder="Ingresa la talla">
                    @error('tipos.talla')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Ubicación Física -->
                <div class="my-2">
                    <label for="cantidad" class="text-gray-700 font-bold text-xl">Cantidad</label>
                    <input type="number" wire:model="activo.cantidad"
                        class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black"
                        id="cantidad" placeholder="Ingresa la cantidad">
                    @error('activo.cantidad')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="my-2">
                    <label for="estado" class="text-gray-700 font-bold text-xl">Estado</label>
                    <input type="text" wire:model="activo.estado"
                        class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black"
                        id="estado" placeholder="Ingresa el estado">
                    @error('activo.estado')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="my-2">
                    <label for="disponible" class="text-gray-700 font-bold text-xl">Disponible</label>
                    <input type="number" wire:model="activo.disponible"
                        class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black"
                        id="tipo" placeholder="">
                    @error('activo.disponible')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fecha de Adquisición -->
                <div class="my-2">
                    <label for="fecha_adquisicion" class="text-gray-700 font-bold text-xl">Fecha de Adquisición</label>
                    <input type="date" wire:model="activo.fecha_adquisicion"
                        class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-gray-500"
                        id="fecha_adquisicion">
                    @error('activo.fecha_adquisicion')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Tipo de Activo -->
                <div class="my-2">
                    <label for="tipo" class="text-gray-700 font-bold text-xl">Tipo de Activo</label>
                    <select wire:model="activo.tipo_activo_id"
                        class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-gray-500"
                        id="tipo">
                        <option value="">Seleccione un tipo</option>
                        @foreach ($tipos as $id => $nombre)
                            <option value="{{ $id }}">{{ $nombre }}</option>
                        @endforeach
                    </select>
                    @error('activo.tipo_activo_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Número de Activo -->
                <div class="my-2">
                    <label for="color" class="text-gray-700 font-bold text-xl">Color</label>
                    <input type="text" wire:model="activo.color"
                        class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black"
                        id="tipo" placeholder="Ingresa el color">
                    @error('activo.color')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="my-2 sm:col-span-2">
                    <label for="observaciones" class="text-gray-700 font-bold text-xl">Observaciones</label>
                    <textarea wire:model="activo.observaciones" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 text-black" id="observaciones" placeholder=""></textarea>
                    @error('tipos.observaciones') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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

                        <!-- Imagen 2 -->
                        <div class="image-container">
                            <label
                                class="mx-auto cursor-pointer flex w-full flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Imagen 2</h2>
                                <p class="mt-2 text-gray-500 tracking-wide">Carge su archivo PNG o JPG</p>
                                <input type="file" class="hidden" wire:model="subirfoto2" />
                                <br>
                                @if ($subirfoto2)
                                    <img src="{{ $subirfoto2->temporaryUrl() }}" width="100" height="100"
                                        alt="Imagen 2" />
                                @endif
                                <x-input-error for="subirfoto2" />
                            </label>
                        </div>

                        <!-- Imagen 3 -->
                        <div class="image-container">
                            <label
                                class="mx-auto cursor-pointer flex w-full flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Imagen 3</h2>
                                <p class="mt-2 text-gray-500 tracking-wide">Carge su archivo PNG o JPG</p>
                                <input type="file" class="hidden" wire:model="subirfoto3" />
                                <br>
                                @if ($subirfoto3)
                                    <img src="{{ $subirfoto3->temporaryUrl() }}" width="100" height="100"
                                        alt="Imagen 3" />
                                @endif
                                <x-input-error for="subirfoto3" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón de Guardar -->
            <div class="flex justify-center mt-4">
                <button wire:click="saveActivoUni()"
                    class="bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] text-white px-6 py-2 rounded-lg shadow-lg font-bold hover:bg-[#1763A6]">Guardar</button>
            </div>
        </div>
    </div>
</div>
