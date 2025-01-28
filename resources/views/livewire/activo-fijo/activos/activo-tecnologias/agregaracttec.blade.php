<div class="my-5">
    <!-- Main container for the form -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-xl py-4 px-6 rounded-t-lg shadow-md">
        <!-- Título con fondo degradado -->
        <h1 class="text-center text-2xl sm:text-3xl font-bold text-white">Registrar Tecnología</h1>
        <form wire:submit.prevent="saveActivoTec" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Input field for 'Nombre' -->
                <div class="my-2">
                    <label for="nombre" class="text-white font-bold text-xl">Nombre del Producto</label>
                    <input type="text" wire:model="activo.nombre" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-black" id="nombre" placeholder="Ingresa el nombre del activo">
                    @error('tipos.nombre') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input field for 'Descripcion' -->
                <div class="my-2">
                    <label for="descripcion" class="text-white font-bold text-xl">Descripción del Producto</label>
                    <textarea wire:model="activo.descripcion" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-black" id="descripcion" placeholder="Ingresa la descripción del activo"></textarea>
                    @error('tipos.descripcion') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input field for 'Número de Serie' -->
                <div class="my-2">
                    <label for="num_serie" class="text-white font-bold text-xl">Número de Serie</label>
                    <input type="text" wire:model="activo.num_serie" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-black" id="num_serie" placeholder="Ingresa el número de serie">
                    @error('activo.num_serie') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input field for 'Número de Activo' -->
                <div class="my-2">
                    <label for="num_activo" class="text-white font-bold text-xl">Número de Activo</label>
                    <input type="text" wire:model="activo.num_activo" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-black" id="num_activo" placeholder="Ingresa el número de activo">
                    @error('activo.num_activo') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input field for 'Ubicación Física' -->
                <div class="my-2">
                    <label for="ubicacion_fisica" class="text-white font-bold text-xl">Ubicación Física</label>
                    <input type="text" wire:model="activo.ubicacion_fisica" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-black" id="ubicacion_fisica" placeholder="Ingresa la ubicación física">
                    @error('activo.ubicacion_fisica') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input field for 'Fecha de Adquisición' -->
                <div class="my-2">
                    <label for="fecha_adquisicion" class="text-white font-bold text-xl">Fecha de Adquisición</label>
                    <input type="date" wire:model="activo.fecha_adquisicion" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-gray-500" id="fecha_adquisicion">
                    @error('activo.fecha_adquisicion') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input field for 'Fecha de Baja' -->
                <div class="my-2">
                    <label for="fecha_baja" class="text-white font-bold text-xl">Fecha de Baja</label>
                    <input type="date" wire:model="activo.fecha_baja" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-gray-500" id="fecha_baja">
                    @error('activo.fecha_baja') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Dropdown for 'Tipo de Activo' -->
                <div class="my-2">
                    <label for="tipo" class="text-white font-bold text-xl">Tipo de Activo</label>
                    <select wire:model="activo.tipo" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-gray-500" id="tipo">
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
                    <label for="precio_adquisicion" class="text-white font-bold text-xl">Precio de Adquisición</label>
                    <input type="number" wire:model="activo.precio_adquisicion" class="block w-full border-2 px-2 py-2 text-sm sm:text-md rounded-md my-2 bg-white-500 text-black" id="precio_adquisicion">
                    @error('activo.precio_adquisicion') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-4">
                <button type="submit" class="bg-[#752174] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-lg font-bold hover:bg-[#913b8f] dark:hover:bg-indigo-500">Guardar</button>
            </div>
        </form>
    </div>
</div>