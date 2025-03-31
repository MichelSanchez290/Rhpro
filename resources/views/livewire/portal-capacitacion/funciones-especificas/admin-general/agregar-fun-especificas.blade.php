<div class="font-sans bg-gradient-to-br from-gray-100 to-gray-300 min-h-screen flex justify-center items-center p-6">
    <div class="relative w-full sm:w-5/6 md:w-4/5 lg:w-3/4 xl:w-2/3">
        <!-- Contenedor principal -->
        <div class="relative bg-white p-8 md:p-12 rounded-2xl shadow-xl">
            <!-- Botón de salir -->
            <div class="absolute top-6 right-6">
                <button onclick="window.location.href='{{ route('mostrarFuncionesEspecificas') }}'"
                    class="text-gray-700 hover:text-red-500 transition-all duration-300 transform hover:scale-110">
                    <i class="fa-solid fa-circle-xmark text-3xl"></i>
                </button>
            </div>

            <!-- Título centrado que abarca ambos lados -->
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-300 md:text-4xl lg:text-5xl dark:text-gray">Agregar <span class="text-blue-600 dark:text-blue-500">Funciones Especificas</span></h1>

            <!-- Contenedor para el formulario y la imagen -->
            <div class="flex flex-col md:flex-row justify-between items-center space-y-8 md:space-y-0 md:space-x-8">
                <!-- Parte izquierda: Formulario -->
                <div class="w-full md:w-1/2">
                    <form class="space-y-6 w-full" wire:submit.prevent="agregarFuncion">
                        <!-- Selección de Empresa -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Empresa</label>
                            <select wire:model.live="empresa_id"
                                class="mt-1 block w-full h-12 rounded-xl shadow-sm px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                <option value="">Seleccione una empresa</option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                @endforeach
                            </select>
                            @error('empresa_id')
                                <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Selección de Sucursal -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Sucursal</label>
                            <select wire:model.live="sucursal_id"
                                class="mt-1 block w-full h-12 rounded-xl shadow-sm px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                <option value="">Seleccione una sucursal</option>
                                @foreach ($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
                                @endforeach
                            </select>
                            @error('sucursal_id')
                                <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nombre de la Función -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nombre de la Función</label>
                            <textarea wire:model.live="funcion.nombre" placeholder="Nombre de la función"
                                class="mt-1 block w-full h-24 rounded-xl shadow-sm px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </textarea>
                            @error('funcion.nombre')
                                <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Botón de Guardar -->
                        <div class="pt-6">
                            <button type="submit"
                                class="w-full py-3 rounded-xl text-white font-semibold shadow-lg 
                                       bg-gradient-to-r from-blue-600 to-blue-600 hover:from-blue-700 hover:to-blue-700 
                                       focus:outline-none transition-all duration-300 transform hover:scale-105">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Parte derecha: Imagen -->
                <div class="w-full md:w-1/2 flex justify-center items-center">
                    <img src="https://media-public.canva.com/Gonl0/MAEjf8Gonl0/1/tl.png" alt="Imagen representativa"
                        class="rounded-xl shadow-lg w-full h-auto max-w-md">
                </div>
            </div>
        </div>
    </div>

    <!-- Notificación de éxito -->
    @if (session()->has('message'))
        <div class="fixed top-5 right-5 bg-green-600 text-white text-lg px-6 py-3 rounded-lg shadow-lg transition-opacity duration-500"
            style="z-index: 1000;" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            ✅ {{ session('message') }}
        </div>
    @endif
</div>
