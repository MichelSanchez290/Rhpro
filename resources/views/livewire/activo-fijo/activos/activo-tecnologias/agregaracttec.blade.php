<div class="my-5">
    <!-- Main container for the form -->
    <div class="container mx-auto max-w-2xl py-4 px-6 sm:px-10 bg-white dark:bg-dark border-emerald-500 rounded-md shadow-lg relative mt-4 mb-6 border-2 border-[#752174] dark:border-indigo-600">

        <div class="my-3">
            <!-- Form title -->
            <h1 class="text-center text-2xl sm:text-3xl font-bold text-[#752174] dark:text-light">Registrar Tecnologia</h1>
            <form wire:submit.prevent="saveActivoTec">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Input field for 'Nombre' -->
                    <div class="my-2">
                        <label for="nombre" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Nombre del Producto</label>
                        <input type="text" wire:model="activo.nombre" class="block w-full border border-[#752174] dark:border-indigo-500 outline-[#752174] dark:outline-indigo-500 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="nombre" placeholder="Ingresa el nombre del activo">
                        @error('tipos.nombre') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Descripcion' -->
                    <div class="my-2">
                        <label for="descripcion" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Descripción del Producto</label>
                        <textarea wire:model="activo.descripcion" class="block w-full border border-[#752174] dark:border-indigo-500 outline-[#752174] dark:outline-indigo-500 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="descripcion" placeholder="Ingresa la descripción del activo"></textarea>
                        @error('tipos.descripcion') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Número de Serie' -->
                    <div class="my-2">
                        <label for="num_serie" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Número de Serie</label>
                        <input type="text" wire:model="activo.num_serie" class="block w-full border border-[#752174] dark:border-indigo-500 outline-[#752174] dark:outline-indigo-500 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="num_serie" placeholder="Ingresa el número de serie">
                        @error('activo.num_serie') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Número de Activo' -->
                    <div class="my-2">
                        <label for="num_activo" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Número de Activo</label>
                        <input type="text" wire:model="activo.num_activo" class="block w-full border border-[#752174] dark:border-indigo-500 outline-[#752174] dark:outline-indigo-500 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="num_activo" placeholder="Ingresa el número de activo">
                        @error('activo.num_activo') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Ubicación Física' -->
                    <div class="my-2">
                        <label for="ubicacion_fisica" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Ubicación Física</label>
                        <input type="text" wire:model="activo.ubicacion_fisica" class="block w-full border border-[#752174] dark:border-indigo-500 outline-[#752174] dark:outline-indigo-500 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="ubicacion_fisica" placeholder="Ingresa la ubicación física">
                        @error('activo.ubicacion_fisica') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Fecha de Adquisición' -->
                    <div class="my-2">
                        <label for="fecha_adquisicion" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Fecha de Adquisición</label>
                        <input type="date" wire:model="activo.fecha_adquisicion" class="block w-full border border-[#752174] dark:border-indigo-500 outline-[#752174] dark:outline-indigo-500 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="fecha_adquisicion">
                        @error('activo.fecha_adquisicion') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Fecha de Baja' -->
                    <div class="my-2">
                        <label for="fecha_baja" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Fecha de Baja</label>
                        <input type="date" wire:model="activo.fecha_baja" class="block w-full border border-[#752174] dark:border-indigo-500 outline-[#752174] dark:outline-indigo-500 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="fecha_baja">
                        @error('activo.fecha_baja') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Dropdown for 'Tipo de Activo' -->
                    <div class="my-2">
                        <label for="tipo" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Tipo de Activo</label>
                        <select wire:model="activo.tipo" class="block w-full border border-[#752174] dark:border-indigo-500 outline-[#752174] dark:outline-indigo-500 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="tipo">
                            <option value="">Seleccione un tipo</option>
                            @foreach ($tipos as $id => $nombre)
                                <option value="{{ $id }}">{{ $nombre }}</option>
                            @endforeach
                        </select>
                        @error('tipos.tipo') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input field for 'Precio de Adquisición' -->
                    <div class="my-2">
                        <label for="precio_adquisicion" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Precio de Adquisición</label>
                        <input type="number" wire:model="activo.precio_adquisicion" class="block w-full border border-[#752174] dark:border-indigo-500 outline-[#752174] dark:outline-indigo-500 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="precio_adquisicion" placeholder="Ingresa el precio de adquisición">
                        @error('activo.precio_adquisicion') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Dropdown for 'Años Estimados' -->
                    <div class="my-2">
                        <label for="anio" class="text-sm sm:text-md font-bold text-[#752174] dark:text-light">Años Estimados</label>
                        <select wire:model="activo.anio" class="block w-full border border-[#752174] dark:border-indigo-500 outline-[#752174] dark:outline-indigo-500 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-[#e58be0] dark:bg-darker text-white dark:text-gray-300" id="anio">
                            <option value="">Seleccione un año</option>
                            @foreach ($anios as $id => $valor)
                                <option value="{{ $id }}">{{ $valor }}</option>
                            @endforeach
                        </select>
                        @error('activo.aniosestimado') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="flex justify-center mt-4"> <!-- Adjusted margin-top -->
                    <button type="submit" class="bg-[#752174] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-lg font-bold hover:bg-[#913b8f] dark:hover:bg-indigo-500">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
