<div>

    <!-- Título con fondo degradado y sombra -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-xl py-4 px-6 rounded-t-lg shadow-lg flex items-center justify-between">
        <span>Activo de Mobiliario</span>
        <div class="flex items-center space-x-4">
            <!-- Botón Agregar -->
            <button onclick="window.location.href='{{ route('agregaractmob') }}'"
                class="text-white font-bold p-2 rounded-md flex items-center justify-center hover:bg-purple-700 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Contenedor de la tabla con fondo blanco y sombras -->
    <div class="bg-white rounded-b-lg shadow-2xl p-6 mt-2">
        <livewire:activomob-table/>
    </div>
</div>
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            // Listener para SweetAlert cuando se elimina correctamente
            Livewire.on('tipoActivoEliminado', (message) => {
                Swal.fire('Eliminado!', message, 'success')
                    .then(() => location.reload());
            });

            // Listener para errores
            Livewire.on('errorEliminacion', (message) => {
                Swal.fire('Error', message, 'error');
            });
        });

        function confirmDelete(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esta acción.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('eliminarTipoActivo', id);
                }
            });
        }
    </script>
@endpush
