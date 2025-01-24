<div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Gestión de Encuestas</h1>

    @if($encuestas->isEmpty())
        <p class="text-gray-600">No hay encuestas disponibles.</p>
    @else
        <!-- Tabla o componente de PowerGrid -->
        <livewire:dx035.encuestas.encuesta-table />
    @endif
</div>
