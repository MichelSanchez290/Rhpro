<div>
    <div cclass="flex min-h-screen items-start justify-center pt-6">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Editar Departamento</h1>
                </div>
            </div>

            <div class="relative mb-4">
                <div class="flex items-center justify-between">
                    @if (session()->has('message'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => {
                            show = false;
                            window.location.href = '{{ route('mostrardepa') }}'
                        }, 3000)" x-show="show"
                            class="fixed top-4 left-4 max-w-xs w-full bg-green-500 text-white shadow-lg rounded-lg p-4 flex items-center space-x-3 transition-transform transform hover:scale-105 z-50">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path fill="#ffffff"
                                    d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                            </svg>
                            <div class="flex-1">
                                <p class="font-bold">{{ session('message') }}</p>
                                @if (session('message') == 'Departamento Actualizado.')
                                    <p class="text-sm">El departamento ha sido actualizado correctamente</p>
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

                    <label for="sucursal_id"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Asociar Sucursal</label>
                    <select wire:model.defer="sucursal_id" id="sucursal_id"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="">Seleccione una Sucursal</option>
                        @foreach ($sucursales as $sucursal)
                            <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
                        @endforeach
                    </select>

                    <x-input-error for="sucursal_id" />
                </div>

                <!-- Nombre del Departamento -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="nombre_departamento"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre del
                        Departamento</label>
                    <input wire:model.defer="nombre_departamento" type="text" id="nombre_departamento"
                        placeholder="Nombre del departamento"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                
                    <x-input-error for="nombre_departamento" /> 
                </div>

                

                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" wire:click="actualizarDepartament"
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
</div>
