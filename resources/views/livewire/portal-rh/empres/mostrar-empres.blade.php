<div class="p-6 ">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Gestión de Empresas</h1>
        <button wire:click="redirigir" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
            Agregar Empresa
        </button>
    </div>

    <div >
        <livewire:portalrh.empres.empres-table/>
    </div>
    
    

</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"> </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('confirmDeleteEmpres', (data) => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "No podrás deshacer esta acción.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('deleteEmpres', data); // Emitir evento para eliminar
                        Swal.fire(
                            "Eliminado",
                            "La empresa ha sido eliminada correctamente.",
                            "success"
                        );
                    }
                });
            });
        });
    </script>
    

@endpush