<div class="p-6 overflow-x-auto">
    <div class="flex justify-between items-center mb-6">
        <button wire:click="redirigirpreguntaAdministrador()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
            Agregar Preguntas
        </button>
    </div>

    <div class="w-full">
        <livewire:portal360.preguntas.preguntasadministrador.mostrar-preguntas-administrador-table />
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