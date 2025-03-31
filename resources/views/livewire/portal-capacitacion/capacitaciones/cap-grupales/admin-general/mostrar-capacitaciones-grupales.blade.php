<div class="max-w-4xl px-10 my-6 py-8 bg-white rounded-lg shadow-md mx-auto relative">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-800 text-center w-full">
            📚<span class="bg-gradient-to-r from-blue-500 to-blue-400 text-transparent bg-clip-text">
                 Capacitaciones Grupales
            </span>
            <span class="block text-sm text-gray-500 mt-2 uppercase tracking-widest">
                Mejora tus habilidades con cada curso
            </span>
        </h1>
    </div>

    <div class="flex justify-between items-center mb-4">
        <button onclick="window.location.href='{{ route('agregarCapacitacionesGru') }}'"
            class="bg-green-500 text-white px-2 py-1 rounded-lg shadow-md hover:bg-green-600 
            flex items-center gap-2 transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-plus"></i>
            Agregar Capacitación
        </button>
    </div>

    @if (session()->has('error'))
        <div class="text-red-500 bg-red-100 p-2 rounded-md text-center">
            {{ session('error') }}
        </div>
    @endif

    <!-- Filtros de Empresa y Sucursal -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
        <!-- Select Empresa -->
        <div>
            <label for="empresa_id" class="block text-sm font-medium text-gray-700">Empresa</label>
            <select id="empresa_id" wire:model.live="empresa_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
                <option value="">Selecciona una empresa</option>
                @foreach ($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Select Sucursal -->
        <div>
            <label for="sucursal_id" class="block text-sm font-medium text-gray-700">Sucursal</label>
            <select id="sucursal_id" wire:model.live="sucursal_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"
                @if (!$empresa_id) disabled @endif>
                <option value="">Selecciona una sucursal</option>
                @foreach ($sucursales as $sucursal)
                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Mostrar capacitaciones solo si se ha seleccionado empresa y sucursal -->
    @if ($empresa_id && $sucursal_id)
        @if ($capacitaciones->isEmpty())
            <p class="mt-2 text-gray-600 text-center">No hay capacitaciones disponibles para esta empresa y sucursal.
            </p>
        @else
            @foreach ($capacitaciones as $capacitacion)
            <div class="mt-8 p-6 border border-gray-200 rounded-xl shadow-lg hover:shadow-xl transition-all bg-white">
                <!-- Encabezado con fechas y status -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-3">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span><strong>Inicio:</strong> {{ $capacitacion->fechaIni }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span><strong>Fin:</strong> {{ $capacitacion->fechaFin }}</span>
                        </div>
                    </div>
                    
                    <!-- Status integrado -->
                    <div class="px-3 py-1 rounded-full text-sm font-semibold 
                        {{ 
                            $capacitacion->status == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : 
                            ($capacitacion->status == 'en proceso' ? 'bg-blue-100 text-blue-800' : 
                            ($capacitacion->status == 'finalizado' ? 'bg-green-100 text-green-800' : 
                            'bg-red-100 text-red-800')) 
                        }}">
                        {{ ucfirst($capacitacion->status) }}
                    </div>
                </div>
            
                <!-- Título y grupo -->
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $capacitacion->nombreCapacitacion }}</h2>
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-gray-100 text-gray-800 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span>{{ $capacitacion->nombreGrupo }}</span>
                    </div>
                </div>
            
                <!-- Detalles -->
                <div class="space-y-3 mb-6">
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-gray-700"><strong>Objetivo:</strong> {{ $capacitacion->objetivo_capacitacion }}</p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <p class="text-gray-700"><strong>Curso:</strong> {{ $capacitacion->curso->nombre }}</p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-700"><strong>Ocupación:</strong> {{ $capacitacion->ocupacion_especifica }}</p>
                    </div>
                </div>
            
                <!-- Botones de acción - Versión destacada -->
                <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                    <div class="flex space-x-3"> <!-- Aumenté el espacio entre botones -->
                        <!-- Eliminar -->
                        <div x-data="{ show: false }" class="relative">
                            <button wire:click="confirmDelete({{ $capacitacion->id }})" @mouseover="show = true"
                                @mouseleave="show = false"
                                class="p-3 rounded-xl bg-red-50 hover:bg-red-100 text-red-500 transition-all duration-300 shadow-sm hover:shadow-md">
                                <i class="fas fa-trash-alt text-xl"></i> <!-- Icono más grande -->
                            </button>
                            <div x-show="show"
                                class="absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-sm rounded py-1.5 px-3 whitespace-nowrap">
                                Eliminar Capacitación
                            </div>
                        </div>

                        <!-- Editar -->
                        <div x-data="{ show: false }" class="relative">
                            <button
                                onclick="window.location.href='{{ route('editarCapacitacionesGru', Crypt::encrypt($capacitacion->id)) }}'"
                                @mouseover="show = true" @mouseleave="show = false"
                                class="p-3 rounded-xl bg-blue-50 hover:bg-blue-100 text-blue-500 transition-all duration-300 shadow-sm hover:shadow-md">
                                <i class="fas fa-edit text-xl"></i> <!-- Icono más grande -->
                            </button>
                            <div x-show="show"
                                class="absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-sm rounded py-1.5 px-3 whitespace-nowrap">
                                Editar Capacitación
                            </div>
                        </div>

                        <!-- Agregar trabajadores -->
                        <div x-data="{ show: false }" class="relative">
                            <button
                                onclick="window.location.href='{{ route('agregarTrabajadorCapacitacionGrupal', Crypt::encrypt($capacitacion->id)) }}'"
                                @mouseover="show = true" @mouseleave="show = false"
                                class="p-3 rounded-xl bg-pink-50 hover:bg-pink-100 text-pink-500 transition-all duration-300 shadow-sm hover:shadow-md">
                                <i class="fa-solid fa-user-plus text-xl"></i> <!-- Icono más grande -->
                            </button>
                            <div x-show="show"
                                class="absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-sm rounded py-1.5 px-3 whitespace-nowrap">
                                Agregar Trabajadores
                            </div>
                        </div>

                        <!-- Editar trabajadores -->
                        <div x-data="{ show: false }" class="relative">
                            <button
                                onclick="window.location.href='{{ route('editarTrabajadorCapacitacionGrupal', Crypt::encrypt($capacitacion->id)) }}'"
                                @mouseover="show = true" @mouseleave="show = false"
                                class="p-3 rounded-xl bg-green-50 hover:bg-green-100 text-green-500 transition-all duration-300 shadow-sm hover:shadow-md">
                                <i class="fa-solid fa-user-pen text-xl"></i> <!-- Icono más grande -->
                            </button>
                            <div x-show="show"
                                class="absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-sm rounded py-1.5 px-3 whitespace-nowrap">
                                Editar Trabajadores
                            </div>
                        </div>

                        <!-- Ver evidencias -->
                        <div x-data="{ show: false }" class="relative">
                            <button
                                onclick="window.location.href='{{ route('verEvidenciasGruGeneral', Crypt::encrypt($capacitacion->id)) }}'"
                                @mouseover="show = true" @mouseleave="show = false"
                                class="p-3 rounded-xl bg-indigo-50 hover:bg-indigo-100 text-indigo-600 transition-all duration-300 shadow-sm hover:shadow-md">
                                <i class="fa-solid fa-eye text-xl"></i> <!-- Icono más grande -->
                            </button>
                            <div x-show="show"
                                class="absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-sm rounded py-1.5 px-3 whitespace-nowrap">
                                Ver evidencias
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        @endif
    @endif

    <!-- Modal de confirmación -->
    <div id="modalConfirm"
        class="{{ $showModal ? '' : 'hidden' }} fixed z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
        <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
            <div class="flex justify-end p-2">
                <button wire:click="$set('showModal', false)" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6 pt-0 text-center">
                <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">¿Estás seguro de que deseas eliminar esta
                    capacitación?</h3>
                <button wire:click="deleteCapacitacion"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                    Eliminar
                </button>
                <button wire:click="$set('showModal', false)"
                    class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function validateAndExport() {
        var selectedYear = document.querySelector('select[wire\\:model="selectedYear"]').value;
        var errorMessage = document.getElementById('year-error');

        if (!selectedYear) {
            errorMessage.classList.remove('hidden');
        } else {
            errorMessage.classList.add('hidden');
            // Proceed with the export function
            @this.call('exportarTodasCapacitaciones');
        }
    }
</script>
