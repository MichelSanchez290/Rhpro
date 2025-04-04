<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100">
            <!-- Encabezado -->
            <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
                <h2 class="text-xl font-bold text-gray-900">Gestión de Empresa</h2>
            </div>

            <!-- Tabla PowerGrid -->
            <div class="overflow-x-auto rounded-lg">
                <livewire:portal360.empresa.empresaadministrador.mostrar-empresa-administrador-table class="table-borderless" />
            </div>
        </div>
    </div>
</div>