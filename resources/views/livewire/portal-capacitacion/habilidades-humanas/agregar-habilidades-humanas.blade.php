<div>
    <!-- Formulario para agregar una función específica -->
        <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
            <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Agregar Habilidades Humanas</h2>
            
            <form class="space-y-4">
                <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <input 
                    type="text" 
                    wire:model="humana.descripcion"
                    id="descripcion"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                />
                </div>
                <div>
                    <label for="nivel" class="block text-sm font-medium text-gray-700 mb-1">Nivel</label>
                    <select wire:model="humana.nivel" id="nivel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                        <option value="">Seleccionar</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                
        
                <button 
                wire:click="agregarHumana()"
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
    

