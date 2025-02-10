<div class="p-6 ">
    <div class="flex justify-between items-center mb-6">
        <button wire:click="redirigirpregunta()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
            Agregar Preguntas
        </button>
    </div>

    <div>
        <livewire:portal360.pregunta-table />
    </div>

</div>


<script>
    $wire.on('eliminarPregunta', (event) => {
        Swal.fire({
            title: "¿Está seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Sí, bórralo!"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.confirmarEliminacion(event.id);
            }
        });
    });
</script>