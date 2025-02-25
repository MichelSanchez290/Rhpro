<div class="font-sans">
    <div class="relative min-h-screen flex justify-center items-center bg-gray-200">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full sm:w-3/4 md:w-6/5 lg:w-3/2 flex flex-col items-center relative py-12">
            <h1 class="text-xl sm:text-2xl font-bold text-gray-800 text-center uppercase tracking-wide
               bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-transparent bg-clip-text
               drop-shadow-lg pb-2 border-b-4 border-blue-400 inline-block">
                Agregar Habilidades Técnicas
            </h1>
            
            <button onclick="window.location.href='{{ route('mostrarHabilidadesTecnicas') }}'"
                class="absolute top-4 right-4 text-gray-700 hover:text-red-500 focus:text-red-500 
                p-3 rounded-full transition-all duration-300 transform hover:scale-110 focus:scale-110 z-50">
                <i class="fa-solid fa-circle-xmark text-2xl"></i>
            </button>

            <div class="relative sm:max-w-sm w-full mt-12">
                <div class="card bg-blue-200 shadow-lg w-full h-full rounded-3xl absolute transform -rotate-6 z-0"></div>
                <div class="card bg-blue-600 shadow-lg w-full h-full rounded-3xl absolute transform rotate-6 z-0"></div>
                
                <div class="relative w-full rounded-3xl px-6 py-4 bg-gray-100 shadow-md z-10">
                    <label class="block mt-3 text-base text-gray-700 text-center font-semibold">
                        Habilidades Técnicas
                    </label>
                    
                    <form class="mt-10">
                        <div>
                            <input 
                                type="text" 
                                wire:model="tecnica.descripcion"
                                placeholder="Descripción" 
                                class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg 
                                hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                        </div>

                        <div class="mt-7">
                            <label for="nivel" class="block text-sm font-medium text-gray-700 mb-1">Nivel</label>
                            <select wire:model="tecnica.nivel" id="nivel" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-md bg-gray-100 text-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-300 hover:border-blue-400 hover:shadow-lg">
                                <option value="">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="mt-7">
                            <button 
                                wire:click="agregarTecnica()"
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
