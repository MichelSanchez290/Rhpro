<!-- Container -->
<div class="flex flex-wrap min-h-screen w-full content-center justify-center py-10">

    <!-- Formulario para agregar relación interna -->
    <div class="flex shadow-md">
        <!-- Formulario -->
        <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 24rem; height: 32rem;">
            <div class="w-72">
                <!-- Heading -->
                <h1 class="text-xl font-semibold">Agregar Relación Interna</h1>
                <small class="text-gray-400">Por favor, complete los campos requeridos</small>

                <!-- Form -->
                <form class="mt-4 space-y-4">
                    <div>
                        <label for="puesto" class="block text-sm font-medium text-gray-700 mb-1">Puesto</label>
                        <input 
                            type="text" 
                            wire:model="interna.puesto" 
                            id="puesto" 
                            placeholder="Ingrese el puesto" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                        />
                    </div>

                    <div>
                        <label for="razon_motivo" class="block text-sm font-medium text-gray-700 mb-1">Razón o motivo</label>
                        <input 
                            type="text" 
                            wire:model="interna.razon_motivo" 
                            id="razon_motivo" 
                            placeholder="Ingrese la razón o motivo" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                        />
                    </div>

                    <div>
                        <label for="frecuencia" class="block text-sm font-medium text-gray-700 mb-1">Frecuencia</label>
                        <select 
                            wire:model="interna.frecuencia" 
                            id="frecuencia" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                        >
                            <option value="">Seleccionar</option>
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>

                    <button 
                        wire:click="agregarInterna()" 
                        type="button" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-black font-medium py-2.5 rounded-lg transition-colors"
                    >
                        Guardar
                    </button>
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
    document.addEventListener('livewire:load', function() {
        Livewire.on('showAnimatedToast', function(message) {
            var toastMixin = Swal.mixin({
                toast: true,
                icon: 'success',
                title: message,
                animation: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            toastMixin.fire();
        });
    });
</script>
@endpush
