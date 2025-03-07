<div>
    <!-- Formulario para agregar una función específica -->
        <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
            <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Agregar Responsabilidades Universales</h2>
            
            <form class="space-y-4">
                <div>
                <label for="sistema" class="block text-sm font-medium text-gray-700 mb-1">Sistema</label>
                <input 
                    type="text" 
                    wire:model="universal.sistema"
                    id="sistema"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                />
                </div>

                <div>
                    <label for="responsalidad" class="block text-sm font-medium text-gray-700 mb-1">Responsabilidad</label>
                    <input 
                        type="text" 
                        wire:model="universal.responsalidad"
                        id="responsalidad"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    />
                </div>

                <button 
                wire:click="agregarUniversal()"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition-colors"
                >
                Guardar
                </button>
            </form>
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
    

