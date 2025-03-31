<div>
    <div class="flex min-h-screen items-start justify-center pt-6">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32l288 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-288 0c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Registrar Puesto</h1>
                </div>
            </div>

            <form class="mt-5 mx-7">
                <h1 class="uppercase md:text-sm text-xs text-gray-900 text-light font-semibold"> 
                    Seleccione su Empresa, Sucursal y Departamento para asociarlo a un puesto
                </h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="empresa"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Empresa</label>
                        <select wire:model.live="empresa" id="empresa"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value=""> --- Seleccione una empresa --- </option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
    
                        <x-input-error for="empresa" />
                    </div>
    
                    <div class="grid grid-cols-1 mt-5">
                        <label for="sucursal"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Sucursal</label>
                        <select wire:model.live="sucursal" id="sucursal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value=""> --- Seleccione una sucursal --- </option>
                            @forelse ($sucursales as $sucursal)
    
                                @foreach($sucursal->sucursales as $mi_sucursal)
    
                                    <option value="{{ $mi_sucursal->id }}">{{ $mi_sucursal->nombre_sucursal }}
                                    </option>
                                @endforeach
    
                            @empty
                                <option value=""> Esta empresa no tiene sucursales </option>
                            @endforelse
                        </select>
    
                        <x-input-error for="sucursal" />
                    </div>
                </div>
                
                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <!--  -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="departamento"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Departamento</label>
                        <select wire:model.live="departamento" id="departamento"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value=""> --- Seleccione un departamento --- </option>
                            @forelse ($departamentos as $departamento)
    
                                @foreach($departamento->departamentos as $mi_depa)
    
                                    <option value="{{ $mi_depa->id }}">{{ $mi_depa->nombre_departamento }}
                                    </option>
                                @endforeach
    
                            @empty
                                <option value=""> Esta sucursal no tiene departamentos</option>
                            @endforelse
                        </select>
    
                        <x-input-error for="departamento" />
                    </div>

                    <!-- Nombre del puesto -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="nombre_puesto"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre del
                            Puesto</label>
                        <input wire:model.defer="puest.nombre_puesto" type="text" id="nombre_puesto"
                            placeholder="Nombre del puesto"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    
                            <x-input-error for="puest.nombre_puesto" />
                    </div>
                </div>

                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" wire:click="savePuesto"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Agregar
                    </button>

                    <button type="button" wire:click="redirigirPuest"
                        class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
