<div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Gestión de Encuestas</h1>

    <!-- PowerGrid para mostrar las encuestas -->
    <livewire:dx035.encuestas.encuesta-table />

    <!-- Modal de confirmación para eliminar -->
    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-semibold mb-4">¿Estás seguro de que deseas eliminar esta encuesta?</h2>
                <div class="flex justify-end">
                    <button wire:click="deleteEncuesta" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2">Eliminar</button>
                    <button wire:click="$set('showModal', false)" class="bg-gray-500 text-white px-4 py-2 rounded-md">Cancelar</button>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Scripts al final del archivo -->
<script>
    // Función para copiar la clave al portapapeles
    function copiarClave(clave) {
        navigator.clipboard.writeText(clave).then(() => {
            alert('Clave copiada: ' + clave);
        }).catch((error) => {
            alert('Error al copiar la clave: ' + error);
        });
    }
</script>
