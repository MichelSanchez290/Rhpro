<div>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <button wire:click="redirigirEncpreSucursal()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
                Agregar Pregunta y Encuesta
            </button>
        </div>
        <livewire:portal360.encpre.encuestapreguntaencpresucursal.encuesta-pregunta-sucursal-table/>
    </div>
</div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        Livewire.on('confirmarEliminarEncriptSucursal', (data) => {
            Swal.fire({
                title: "¿Está seguro?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {   
                    Livewire.dispatch('eliminarEncpreSucursal', { id: data.id });
                }
            });
        });

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
                icon: "error"
            });
        });
    });
</script>
