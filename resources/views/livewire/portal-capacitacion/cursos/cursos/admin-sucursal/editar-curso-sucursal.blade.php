<div class="font-sans bg-gradient-to-br min-h-screen flex justify-center items-center p-4">
    <div class="w-full max-w-2xl">
        <!-- Tarjeta principal con efecto vidrio (glassmorphism) -->
        <div class="backdrop-blur-lg bg-white/80 rounded-2xl shadow-2xl overflow-hidden transition-all duration-500 hover:shadow-3xl">
            <!-- Encabezado con gradiente -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 p-6 relative">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white tracking-wide uppercase">
                        <span class="inline-block mr-2 animate-bounce">✨</span> Editar Curso
                    </h1>
                    <button onclick="window.location.href='{{ route('verCursosSucursal') }}'"
                        class="text-white hover:text-indigo-200 transition-all duration-300 transform hover:rotate-90">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-white/30"></div>
            </div>

            <!-- Formulario con espacio mejorado -->
            <form class="p-6 md:p-8 space-y-6" wire:submit.prevent="store">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Nombre del Curso -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Nombre del Curso</label>
                        <div class="relative">
                            <input type="text" wire:model="nombre"
                                placeholder="Ej: Desarrollo Web Avanzado"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 shadow-sm hover:shadow-md placeholder-gray-400 pl-12">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <i class="fa-solid fa-book text-indigo-500 text-lg"></i>
                            </div>
                        </div>
                        @error('curso.nombre')
                            <span class="text-red-500 text-xs mt-1 ml-1 flex items-center">
                                <i class="fa-solid fa-circle-exclamation mr-1 text-red-500"></i> {{ $message }}
                            </span> 
                        @enderror
                    </div>

                    <!-- Horas -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Horas</label>
                        <div class="relative">
                            <input type="text" wire:model="horas"
                                placeholder="Ej: 40"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 shadow-sm hover:shadow-md placeholder-gray-400 pl-12">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <i class="fa-regular fa-clock text-blue-500 text-lg"></i>
                            </div>
                        </div>
                        @error('curso.horas')
                            <span class="text-red-500 text-xs mt-1 ml-1 flex items-center">
                                <i class="fa-solid fa-circle-exclamation mr-1 text-red-500"></i> {{ $message }}
                            </span> 
                        @enderror
                    </div>

                    <!-- Precio -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Precio</label>
                        <div class="relative">
                            <input type="text" wire:model="precio"
                                placeholder="Ej: 2999"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 shadow-sm hover:shadow-md placeholder-gray-400 pl-12">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <i class="fa-solid fa-tag text-green-500 text-lg"></i>
                            </div>
                        </div>
                        @error('curso.precio')
                            <span class="text-red-500 text-xs mt-1 ml-1 flex items-center">
                                <i class="fa-solid fa-circle-exclamation mr-1 text-red-500"></i> {{ $message }}
                            </span> 
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Status</label>
                        <div class="relative">
                            <select wire:model="tipoestatus"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 shadow-sm hover:shadow-md appearance-none bg-white pl-12">
                                <option value="">Seleccione</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <i class="fa-solid fa-circle-check text-purple-500 text-lg"></i>
                            </div>
                        </div>
                        @error('curso.tipoestatus')
                            <span class="text-red-500 text-xs mt-1 ml-1 flex items-center">
                                <i class="fa-solid fa-circle-exclamation mr-1 text-red-500"></i> {{ $message }}
                            </span> 
                        @enderror
                    </div>

                    <!-- Temática -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Temática</label>
                        <div class="relative">
                            <select wire:model.live="tematicas_id"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 shadow-sm hover:shadow-md appearance-none bg-white pl-12">
                                <option value="">Seleccione</option>
                                @foreach($tematicas as $tematica)
                                    <option value="{{ $tematica->id }}">{{ $tematica->nombre }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <i class="fa-solid fa-tags text-orange-500 text-lg"></i>
                            </div>
                        </div>
                        @error('tematica_id')
                            <span class="text-red-500 text-xs mt-1 ml-1 flex items-center">
                                <i class="fa-solid fa-circle-exclamation mr-1 text-red-500"></i> {{ $message }}
                            </span> 
                        @enderror
                    </div>

                    <!-- Modalidad -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Modalidad</label>
                        <div class="relative">
                            <select wire:model.live="modalidad" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 shadow-sm hover:shadow-md appearance-none bg-white pl-12">
                                <option value="">Seleccione</option>
                                <option value="Presencial">Presencial</option>
                                <option value="Virtual">Virtual</option>
                                <option value="Mixta">Mixta</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <i class="fa-solid fa-laptop-house text-cyan-500 text-lg"></i>
                            </div>
                        </div>
                        @error('curso.modalidad')
                            <span class="text-red-500 text-xs mt-1 ml-1 flex items-center">
                                <i class="fa-solid fa-circle-exclamation mr-1 text-red-500"></i> {{ $message }}
                            </span> 
                        @enderror
                    </div>
                </div>

                <!-- Botón de envío con efecto de gradiente -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-indigo-600 to-blue-500 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-101 active:scale-98 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 group">
                        <span class="flex items-center justify-center">
                            <i class="fa-solid fa-floppy-disk mr-2 text-yellow-300 group-hover:animate-bounce"></i> 
                            <span class="group-hover:text-yellow-100 transition-colors">Guardar Curso</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Notificación mejorada -->
    @if (session()->has('message'))
        <div class="fixed top-5 right-5 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl shadow-xl flex items-center space-x-2 transition-all duration-500"
            style="z-index: 1000;"
            x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition>
            <i class="fa-solid fa-circle-check text-xl text-yellow-200"></i>
            <span class="font-medium">{{ session('message') }}</span>
        </div>
    @endif
</div>