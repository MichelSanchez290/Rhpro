<!-- Container -->
<div class="flex flex-wrap min-h-screen w-full content-center justify-center py-10">

    <!-- Login component -->
    <div class="flex shadow-md">
      <!-- Formulario para agregar función específica -->
      <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 24rem; height: 32rem;">
        <div class="w-72">
          <!-- Heading -->
          <h1 class="text-xl font-semibold">Actualizar Función Específica</h1>
          <small class="text-gray-400">Por favor, complete el nombre de la función específica a actualizar</small>
  
          <!-- Form -->
          <form class="mt-4 space-y-4">
            <div>
              <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Función Específica</label>
              <input 
                type="text" 
                wire:model="nombre" 
                id="nombre" 
                placeholder="Ingrese la función específica" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
              />
            </div>
  
            <button 
                wire:click="store()" 
                type="button" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-black font-medium py-2.5 rounded-lg transition-colors"
            >
                Actualizar
            </button>
          </form>
        </div>
      </div>
  
      <!-- Login banner -->
      <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
        <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="{{ asset('img/tipos-de-empresas.jpg') }}">
      </div>
  
    </div>
  
  </div>
  

    @push('js')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      document.addEventListener('livewire:load', function() {
          Livewire.on('editBann', function(message) {
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


