<div
    class="max-w-2xl mx-auto p-8 bg-white shadow-xl rounded-2xl mt-10 transform transition-all duration-500 hover:scale-105">
    <!-- Encabezado con diseño mejorado -->
    <div
        class="py-6 px-14 bg-gradient-to-tr from-blue-500 to-blue-300 rounded-tl-2xl rounded-tr-2xl text-center space-y-2">
        <h2 class="text-white text-2xl font-bold uppercase">📌 REGISTRAR CAPACITACIÓN GRUPAL</h2>
        <h4 class="text-white font-semibold">MEJORA TUS HABILIDADES CON CADA CURSO 😊</h4>
    </div>

<!-- Modal de alerta para duplicados -->
@if($mostrarAlertaDuplicado)
<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-yellow-600">
                    <i class="fas fa-exclamation-triangle mr-2"></i> Capacitación similar encontrada
                </h3>
                <button wire:click="$set('mostrarAlertaDuplicado', false)" 
                        class="text-gray-500 hover:text-gray-700 text-xl">
                    &times;
                </button>
            </div>
            
            <div class="mb-6">
                <p class="text-gray-700 mb-4">
                    Ya existe una capacitación con el mismo nombre para esta empresa y sucursal
                </p>
                
                <p class="mt-4 text-gray-700">
                    ¿Deseas crear una nueva capacitación con el mismo nombre?
                </p>
            </div>
            
            <div class="flex justify-end space-x-3">
                <button wire:click="$set('mostrarAlertaDuplicado', false)" 
                        class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                    Cancelar
                </button>
                <button wire:click="continuarConRegistro" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Sí, crear de todas formas
                </button>
            </div>
        </div>
    </div>
</div>
@endif


    <form wire:submit.prevent="agregarCapacitacionGrupal" class="space-y-6 mt-6">
        <!-- Empresa y Sucursal en la misma fila -->
        <div class="flex space-x-4">
            <!-- Empresa -->
            <div class="w-1/2">
                <label class="block text-sm font-medium text-gray-700">🏢 Empresa</label>
                <select wire:model.live="empresa_id"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300
                    @if(isset($camposBloqueados['empresa_id'])) bg-gray-100 cursor-not-allowed @endif"
                    @if(isset($camposBloqueados['empresa_id'])) disabled @endif>
                    <option value="">Selecciona una empresa</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}" @if($empresa->id == $empresa_id) selected @endif>
                            {{ $empresa->nombre }}</option>
                    @endforeach
                </select>
                @error('empresa_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Sucursal -->
            <div class="w-1/2">
                <label class="block text-sm font-medium text-gray-700">📍 Sucursal</label>
                <select wire:model.live="sucursal_id" id="sucursalSelect"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300
                    {{ !$empresa_id ? 'opacity-50 cursor-not-allowed' : '' }}
                     @if(isset($camposBloqueados['sucursal_id'])) bg-gray-100 cursor-not-allowed @endif"
                    @if(isset($camposBloqueados['sucursal_id']) || !$empresa_id) disabled @endif
                    @if (!$empresa_id) disabled @endif onchange="validarSucursal()">
                    <option value="">Selecciona una sucursal</option>
                    @foreach ($sucursales as $sucursal)
                        <option value="{{ $sucursal->id }}" @if($sucursal->id == $sucursal_id) selected @endif>
                            {{ $sucursal->nombre_sucursal }}</option>
                    @endforeach
                </select>
                @error('sucursal_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Nombre del Grupo -->
        <div>
            <label class="block text-sm font-medium text-gray-700">👥 Nombre del Grupo</label>
            <input type="text" wire:model="nombreGrupo"
                class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
            @error('nombreGrupo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nombre de la Capacitación -->
        <div>
            <label class="block text-sm font-medium text-gray-700">📚 Nombre de la Capacitación</label>
            <input type="text" wire:model="nombreCapacitacion"
                class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300
                @if(isset($camposBloqueados['nombreCapacitacion'])) bg-gray-100 cursor-not-allowed @endif"
                @if($competenciaRequerida) readonly @endif
                @if(isset($camposBloqueados['nombreCapacitacion'])) readonly @endif>
                
                @error('nombreCapacitacion')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Fechas -->
        <div class="flex space-x-4">
            <div class="w-1/2">
                <label class="block text-sm font-medium text-gray-700">📅 Fecha de Inicio</label>
                <input type="date" wire:model="fechaIni"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                @error('fechaIni')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-1/2">
                <label class="block text-sm font-medium text-gray-700">📅 Fecha de Fin</label>
                <input type="date" wire:model="fechaFin"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                @error('fechaFin')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Curso -->
        <div>
            <label class="block text-sm font-medium text-gray-700">🎓 Curso</label>
            <select wire:model.live="cursos_id"
                class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300
                {{ !$sucursal_id ? 'opacity-50 cursor-not-allowed' : '' }}"
                @if (!$sucursal_id) disabled @endif>
                <option value="">Selecciona un curso</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                @endforeach
            </select>
            @error('cursos_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Objetivo de la Capacitación -->
        <div>
            <label class="block text-sm font-medium text-gray-700">🎯 Objetivo de la Capacitación</label>
            <textarea wire:model="objetivo_capacitacion"
                class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300"></textarea>
            @error('objetivo_capacitacion')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">🗃️ Ocupación Específica:</label>
            <input type="text" wire:model="ocupacion_especifica"
                class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
            @error('ocupacion_especifica')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">❓ Status</label>
            <select wire:model.live="status"
                class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                <option value="">Selecciona un estado</option>
                <option value="Pendiente">Pendiente</option>
                <option value="En proceso">En proceso</option>
                <option value="Finalizado">Finalizado</option>
                <option value="Cancelado">Cancelado</option>
            </select>
            @error('status')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="flex space-x-4">
            <!-- Botón de registrar -->
            <button type="submit"
                class="w-1/2 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                Registrar Capacitación
            </button>

            <button onclick="window.location.href='{{ route('verCapacitacionesGru') }}'"
                class="w-1/2 py-3 bg-gray-400 text-white font-semibold rounded-lg shadow-md hover:bg-gray-500 transition duration-300 transform hover:scale-105">
                Cancelar
            </button>
        </div>
    </form>
</div>
