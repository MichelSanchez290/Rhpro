<div class="max-w-2xl mx-auto p-8 bg-white shadow-xl rounded-2xl mt-10 transform transition-all duration-500 hover:scale-105">
    <!-- Encabezado con diseño mejorado -->
    <div class="py-6 px-14 bg-gradient-to-tr from-blue-500 to-blue-300 rounded-tl-2xl rounded-tr-2xl text-center space-y-2">
        <h2 class="text-white text-2xl font-bold uppercase">📌 ACTUALIZAR CAPACITACIÓN INDIVIDUAL</h2>
        <h4 class="text-white font-semibold">MEJORA TUS HABILIDADES CON CADA CURSO 😊</h4>
    </div>

    <form wire:submit.prevent="actualizarCapacitacion" class="space-y-6 mt-6">
        <div>
            <label class="block text-sm font-medium text-gray-700">📚 Nombre de la Capacitación</label>
            <input type="text" wire:model="nombreCapacitacion"
                class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
            @error('nombreCapacitacion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Fechas -->
        <div class="flex space-x-4">
            <div class="w-1/2">
                <label class="block text-sm font-medium text-gray-700">📅 Fecha de Inicio</label>
                <input type="date" wire:model="fechaIni"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                @error('fechaIni') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="w-1/2">
                <label class="block text-sm font-medium text-gray-700">📅 Fecha de Fin</label>
                <input type="date" wire:model="fechaFin"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                @error('fechaFin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Curso -->
        <div>
            <label class="block text-sm font-medium text-gray-700">🎓 Curso</label>
            <select wire:model.live="cursos_id"
                class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                <option value="">Selecciona un curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                @endforeach
            </select>
            @error('cursos_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Objetivo de la Capacitación -->
        <div>
            <label class="block text-sm font-medium text-gray-700">🎯 Objetivo de la Capacitación</label>
            <textarea wire:model="objetivoCapacitacion"
                class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300"></textarea>
            @error('objetivoCapacitacion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">🗃️ Ocupación Específica:</label>
            <input type="text" wire:model="ocupacion_especifica" 
                class="w-full p-3 mt-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
            @error('ocupacion_especifica') <span class="text-danger">{{ $message }}</span> @enderror
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
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
                Actualizar Capacitación
            </button>

            <button onclick="window.history.back()"
                class="w-1/2 py-3 bg-gray-400 text-white font-semibold rounded-lg shadow-md hover:bg-gray-500 transition duration-300 transform hover:scale-105">
                Cancelar
            </button>
        
        </div>
    </form>
</div>
