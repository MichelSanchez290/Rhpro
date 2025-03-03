<div class="max-w-4xl mx-auto p-6 bg-white shadow-xl rounded-lg mt-10">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Registrar Capacitación Individual</h1>

    <form wire:submit.prevent="asignarCapacitacion">
        <div class="space-y-6">
            <!-- Fecha de Inicio -->
            <div class="form-group">
                <label for="fechaIni" class="block text-sm font-medium text-gray-600">Fecha de Inicio</label>
                <input type="date" id="fechaIni" wire:model="fechaIni" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                @error('fechaIni') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <!-- Fecha de Fin -->
            <div class="form-group">
                <label for="fechaFin" class="block text-sm font-medium text-gray-600">Fecha de Fin</label>
                <input type="date" id="fechaFin" wire:model="fechaFin" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                @error('fechaFin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Nombre de la Capacitación -->
            <div class="form-group">
                <label for="nombreCapacitacion" class="block text-sm font-medium text-gray-600">Nombre de la Capacitación</label>
                <input type="text" id="nombreCapacitacion" wire:model="nombreCapacitacion" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                @error('nombreCapacitacion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Objetivo de la Capacitación -->
            <div class="form-group">
                <label for="objetivoCapacitacion" class="block text-sm font-medium text-gray-600">Objetivo de la Capacitación</label>
                <textarea id="objetivoCapacitacion" wire:model="objetivoCapacitacion" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out"></textarea>
                @error('objetivoCapacitacion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="cursos_id" class="block text-sm font-medium text-gray-600">Curso</label>
                <select id="cursos_id" wire:model="cursos_id" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                    <option value="">Selecciona un curso</option> <!-- Opción por defecto -->
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                    @endforeach
                </select>
                @error('cursos_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            

            <!-- Botón de submit -->
            <div class="form-group">
                <button type="submit" class="w-full py-3 bg-indigo-600 text-white rounded-lg shadow-lg hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:scale-105">
                    Registrar Capacitación
                </button>
            </div>
        </div>
    </form>

    <!-- Mensaje de confirmación -->
    <div x-data="{ show: @json(session()->has('message')) }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed top-5 right-5 bg-green-600 text-white text-lg px-6 py-3 rounded-lg shadow-lg transition-opacity duration-500" style="z-index: 1000;">
        ✅ {{ session('message') }}
    </div>
</div>
