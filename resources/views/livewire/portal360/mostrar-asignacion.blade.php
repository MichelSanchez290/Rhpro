<div class="p-6 ">
    <div class="flex justify-between items-center mb-6">
        <button wire:click="redirigirAsignacion()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
            Agregar Asignación 
        </button>
    </div>

    <div>
        <livewire:portal360.asignacion-table/>
    </div>
</div>