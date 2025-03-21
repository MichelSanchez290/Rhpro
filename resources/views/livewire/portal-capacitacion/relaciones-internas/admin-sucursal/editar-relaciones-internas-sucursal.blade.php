<div class="font-sans">
    <div class="relative min-h-screen flex justify-center items-center bg-gray-200">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full sm:w-3/4 md:w-6/5 lg:w-3/2 flex flex-col items-center relative py-12">
            <h1 class="text-xl sm:text-2xl font-bold text-gray-800 text-center uppercase tracking-wide
               bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-transparent bg-clip-text
               drop-shadow-lg pb-2 border-b-4 border-blue-400 inline-block">
               Actaulizar Relacion Interna
            </h1>
            
            <button onclick="window.location.href='{{ route('mostrarRelacionesInternasSucursal') }}'"
                class="absolute top-4 right-4 text-gray-700 hover:text-red-500 focus:text-red-500 
                p-3 rounded-full transition-all duration-300 transform hover:scale-110 focus:scale-110 z-50">
                <i class="fa-solid fa-circle-xmark text-2xl"></i>
            </button>

            <div class="relative sm:max-w-sm w-full mt-12">
                <div class="card bg-blue-200 shadow-lg w-full h-full rounded-3xl absolute transform -rotate-6 z-0"></div>
                <div class="card bg-blue-600 shadow-lg w-full h-full rounded-3xl absolute transform rotate-6 z-0"></div>
                
                <div class="relative w-full rounded-3xl px-6 py-4 bg-gray-100 shadow-md z-10">
                    <label class="block mt-3 text-base text-gray-700 text-center font-semibold">
                        Relación Interna 
                    </label>
                    
                    <form class="mt-10">

                        <div class="mt-4">
                            <label class="block text-gray-700 mb-1">Puesto</label>
                            <input 
                                type="text" 
                                wire:model="puesto" 
                                class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg 
                                hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                            @error('puesto')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label class="block text-gray-700 mb-1">Razón o motivo</label>
                            <input 
                                type="text" 
                                wire:model="razon_motivo" 
                                class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg 
                                hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                            @error('razon_motivo')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-7">
                            <label class="block text-gray-700 mb-1">Nivel</label>
                            <select wire:model="frecuencia" id="nivel" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-md bg-gray-100 text-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-300 hover:border-blue-400 hover:shadow-lg">
                                <option value="">Seleccionar</option>
                                <option value="Alta">Alta</option>
                                <option value="Media">Media</option>
                                <option value="Baja">Baja</option>
                            </select>
                            @error('frecuencia')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-7">
                            <button 
                                wire:click="store()"
                                class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl 
                                hover:shadow-inner focus:outline-none transition duration-500 ease-in-out 
                                transform hover:scale-105">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
