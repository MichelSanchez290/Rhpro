<div class="my-5">
    <!-- Main container for the form -->
    <div class="container mx-auto max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl shadow-md dark:shadow-white py-4 px-6 sm:px-10 bg-white dark:bg-gray-800 border-emerald-500 rounded-md relative">

        <!-- Back button -->
        {{-- <a href="#" class="absolute top-3 right-3 px-2 py-1 bg-red-500 rounded-md text-white text-xs sm:text-sm shadow-md">Regresar</a> --}}

        <div class="my-3">
            <!-- Form title -->
            <h1 class="text-center text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Registrar Tecnologia</h1>
            <form wire:submit.prevent="editar">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Input field for 'Nombre' -->
                    <div class="my-2">
                        <label for="nombre" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Nombre del Producto</label>
                        <input type="text" wire:model="nombre" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="nombre" placeholder="Ingresa el nombre del activo">
                        @error('nombre') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Descripcion' -->
                    <div class="my-2">
                        <label for="descripcion" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Descripción del Producto</label>
                        <textarea wire:model="descripcion" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="descripcion" placeholder="Ingresa la descripción del activo"></textarea>
                        @error('descripcion') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Número de Serie' -->
                    <div class="my-2">
                        <label for="num_serie" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Número de Serie</label>
                        <input type="text" wire:model="numser" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="num_serie" placeholder="Ingresa el número de serie">
                        @error('numser') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Número de Activo' -->
                    <div class="my-2">
                        <label for="num_activo" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Número de Activo</label>
                        <input type="text" wire:model="numact" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="num_activo" placeholder="Ingresa el número de activo">
                        @error('numact') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Ubicación Física' -->
                    <div class="my-2">
                        <label for="ubicacion_fisica" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Ubicación Física</label>
                        <input type="text" wire:model="ubicacion" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="ubicacion_fisica" placeholder="Ingresa la ubicación física">
                        @error('ubicacion') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Fecha de Adquisición' -->
                    <div class="my-2">
                        <label for="fecha_adquisicion" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Fecha de Adquisición</label>
                        <input type="date" wire:model="fechaad" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="fecha_adquisicion">
                        @error('fechaad') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Fecha de Baja' -->
                    <div class="my-2">
                        <label for="fecha_baja" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Fecha de Baja</label>
                        <input type="date" wire:model="fechaba" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="fecha_baja">
                        @error('fechaba') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Dropdown for 'Tipo de Activo' -->
                    <div class="my-2">
                        <label for="tipo" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Tipo de Activo</label>
                        <select wire:model="tipo" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="tipo">
                            <option value="">Seleccione un tipo</option>
                            @foreach ($tipos as $id => $nombre)
                                <option value="{{ $id }}">{{ $nombre }}</option>
                            @endforeach
                        </select>
                        @error('tipo') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Precio de Adquisición' -->
                    <div class="my-2">
                        <label for="precio_adquisicion" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Precio de Adquisición</label>
                        <input type="number" wire:model="precioad" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="precio_adquisicion" placeholder="Ingresa el precio de adquisición">
                        @error('precioad') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Dropdown for 'Años Estimados' -->
                    <div class="my-2">
                        <label for="anio" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Años Estimados</label>
                        <select wire:model="anio" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="anio">
                            <option value="">Seleccione un año</option>
                            @foreach ($anios as $id => $valor)
                                <option value="{{ $id }}">{{ $valor }}</option>
                            @endforeach
                        </select>
                        @error('anio') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Save button -->
                <div class="flex justify-center my-4">
                    <button type="submit" class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md text-sm sm:text-lg shadow-md">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

