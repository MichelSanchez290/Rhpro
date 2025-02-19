<div>
    <!-- Formulario para agregar una función específica -->
        <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
            <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Agregar Relación Externa</h2>
            
            <form class="space-y-4">
                <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                <input 
                    type="text" 
                    wire:model="externa.nombre"
                    id="nombre"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                />
                </div>
                <div>
                    <label for="razon_motivo" class="block text-sm font-medium text-gray-700 mb-1">Razon o motivo</label>
                    <input 
                        type="text" 
                        wire:model="externa.razon_motivo"
                        id="razon_motivo"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    />
                </div>
                <div>
                    <label for="frecuencia" class="block text-sm font-medium text-gray-700 mb-1">Frecuencia</label>
                    <select wire:model="externa.frecuencia" id="frecuencia" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                        <option value="">Seleccionar</option>
                        <option value="Alta">Alta</option>
                        <option value="Media">Media</option>
                        <option value="Baja">Baja</option>
                    </select>
                </div>
                
        
                <button 
                wire:click="agregarExterna()"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition-colors"
                >
                Guardar
                </button>
            </form>
            </div>
        </div>
        @if (session()->has('success') || session()->has('error'))
            <div class="fixed top-5 right-5 bg-green-600 text-white text-lg px-6 py-3 rounded-lg shadow-lg transition-opacity duration-500"
                style="z-index: 1000;"
                x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">

                @if (session()->has('success'))
                    ✅ {{ session('success') }}
                @endif

                @if (session()->has('error'))
                    ❌ {{ session('error') }}
                @endif
            </div>
        @endif
</div>