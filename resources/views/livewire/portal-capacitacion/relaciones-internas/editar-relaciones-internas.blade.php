<!-- Container -->
<div class="flex flex-wrap min-h-screen w-full content-center justify-center py-10">

    <!-- Formulario para agregar relación interna -->
    <div class="flex shadow-md">
        <!-- Formulario -->
        <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 24rem; height: 32rem;">
            <div class="w-72">
                <!-- Heading -->
                <h1 class="text-xl font-semibold">Actaulizar Relación Interna</h1>
                <small class="text-gray-400">Por favor, complete los campos requeridos</small>

                <!-- Form -->
                <form class="mt-4 space-y-4">
                    <div>
                        <label for="puesto" class="block text-sm font-medium text-gray-700 mb-1">Puesto</label>
                        <input 
                            type="text" 
                            wire:model="puesto" 
                            id="puesto" 
                            placeholder="Ingrese el puesto" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                        />
                    </div>

                    <div>
                        <label for="razon_motivo" class="block text-sm font-medium text-gray-700 mb-1">Razón o motivo</label>
                        <input 
                            type="text" 
                            wire:model="razon_motivo" 
                            id="razon_motivo" 
                            placeholder="Ingrese la razón o motivo" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                        />
                    </div>

                    <div>
                        <label for="frecuencia" class="block text-sm font-medium text-gray-700 mb-1">Frecuencia</label>
                        <select 
                            wire:model="frecuencia" 
                            id="frecuencia" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                        >
                            <option value="">Seleccionar</option>
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>

                    <div class="flex justify-between space-x-4">
                        <!-- Actualizar Button -->
                        <div 
                            wire:click="store()" 
                            class="bg-blue-600 hover:bg-blue-700 text-black font-medium py-2.5 rounded-lg transition-colors duration-150 group flex items-center justify-center border-2 border-b-4 border-blue-800 cursor-pointer active:bg-blue-500"
                        >
                            <span class="px-3">Actualizar</span>
                            <div :class="isLoading ? 'opacity-100 scale-100 duration-200 w-auto pr-3' : 'opacity-0 scale-0 duration-100 w-0 p-0'">
                                <i class="fad fa-spinner-third animate-spin"></i>
                            </div>
                        </div>
                    
                        <!-- Cancelar Button -->
                        <div 
                            wire:click="cancelarAccion()" 
                            class="bg-gray-400 hover:bg-gray-500 text-black font-medium py-2.5 rounded-lg transition-colors duration-150 group flex items-center justify-center border-2 border-b-4 border-gray-500 cursor-pointer active:bg-gray-300"
                        >
                            <span class="px-3">Cancelar</span>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>

        <!-- Imagen lateral -->
        <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
            <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="{{ asset('img/tipos-de-empresas.jpg') }}">
        </div>
    </div>
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    window.addEventListener('alertSuccess', (event) => {
        Swal.fire({
  title: "Drag me!",
  icon: "success",
  draggable: true
});
    });
});

</script>
@endpush