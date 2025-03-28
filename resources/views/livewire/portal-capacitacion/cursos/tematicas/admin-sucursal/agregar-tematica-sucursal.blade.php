<div class="font-sans bg-gradient-to-br min-h-screen flex justify-center items-center p-4">
    <div class="w-full max-w-md">
        <!-- Tarjeta principal con efecto neumorfismo -->
        <div class="relative bg-white rounded-3xl shadow-xl overflow-hidden transition-all duration-500 hover:shadow-2xl">
            <!-- Efecto de onda decorativa superior -->
            <div class="h-3 bg-gradient-to-r from-purple-500 via-indigo-500 to-blue-500"></div>
            
            <!-- Encabezado con gradiente y efecto 3D -->
            <div class="p-6 bg-gradient-to-r from-blue-600 to-indigo-700 relative">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white tracking-wide uppercase">
                        <span class="inline-block mr-2">🎨</span> Editar Temática
                    </h1>
                    <button onclick="window.location.href='{{ route('verTematicasSucursal') }}'"
                        class="text-white hover:text-indigo-200 transition-all duration-300 transform hover:rotate-90">
                        <i class="fa-solid fa-xmark text-2xl"></i>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-white/30"></div>
            </div>

            <!-- Contenido del formulario -->
            <div class="p-6 md:p-8">
                <form class="space-y-6" wire:submit.prevent="agregarTematica">
                    <!-- Campo de texto con icono y efectos -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Nombre de la tematica</label>
                        <div class="relative">
                            <input type="text" wire:model="tematica.nombre"
                                placeholder="Ej: Desarrollo Web Avanzado"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 shadow-sm hover:shadow-md placeholder-gray-400 pl-12">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <i class="fa-solid fa-book text-indigo-500 text-lg"></i>
                            </div>
                        </div>
                        @error('tematica.nombre')
                            <span class="text-red-500 text-xs mt-1 ml-1 flex items-center">
                                <i class="fa-solid fa-circle-exclamation mr-1 text-red-500"></i> {{ $message }}
                            </span> 
                        @enderror
                    </div>

                    
                    <!-- Botón con efecto 3D y gradiente -->
                    <div class="pt-4">
                        <button 
                            type="submit"
                            class="w-full bg-gradient-to-r from-indigo-600 to-blue-500 text-white font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 group">
                            <span class="flex items-center justify-center">
                                <i class="fa-solid fa-cloud-arrow-up mr-2 text-yellow-300 group-hover:animate-bounce"></i>
                                <span class="group-hover:text-indigo-100 transition-colors">Guardar Cambios</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Pie decorativo -->
            <div class="h-2 bg-gradient-to-r from-blue-100 via-indigo-100 to-purple-100"></div>
        </div>
    </div>

    <!-- Notificación mejorada -->
    @if (session()->has('message'))
        <div class="fixed top-5 right-5 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl shadow-xl flex items-center space-x-2 transition-all duration-500"
            style="z-index: 1000;"
            x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition>
            <i class="fa-solid fa-circle-check text-xl text-yellow-200 animate-pulse"></i>
            <span class="font-medium">{{ session('message') }}</span>
        </div>
    @endif
</div>