<div class="p-6 overflow-x-auto">
    <div class="flex justify-between items-center mb-6">
        <button wire:click="redirigirpreguntaSucursal()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
            Agregar Preguntas
        </button>
    </div>

    <div class="w-full">
        <livewire:portal360.preguntas.preguntassucursal.preguntas-sucursal-table />
    </div>
</div>


<!-- Scripts para SweetAlert2 -->
<script>
    // Script para la confirmación de eliminación
    document.addEventListener('livewire:initialized', function() {
        Livewire.on('confirmarEliminarPreguntaSucursal', (data) => {
            Swal.fire({
                title: "¿Está seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, bórralo!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminarPreguntaSucursal', { id: data.id });
                }
            });
        });
    });

    // Scripts para mostrar mensajes de éxito o error
    document.addEventListener('livewire:initialized', function() {
        Livewire.on('swal-success', (data) => {
            Swal.fire({
                title: "¡Éxito!",
                text: data.message,
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        });

        Livewire.on('swal-error', (data) => {
            Swal.fire({
                title: "Error",
                text: data.message,
                icon: "error",
                confirmButtonText: "Aceptar"
            });
        });
    });
</script>
