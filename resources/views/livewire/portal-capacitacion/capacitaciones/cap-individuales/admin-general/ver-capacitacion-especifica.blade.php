
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold text-gray-700">Detalles de la Capacitación</h2>

        <div class="mt-4 bg-white p-6 rounded-md shadow-md">
            <p><strong>Nombre:</strong> {{ $capacitacion->nombreCapacitacion }}</p>
            <p><strong>Fecha de Inicio:</strong> {{ $capacitacion->fechaIni }}</p>
            <p><strong>Fecha de Fin:</strong> {{ $capacitacion->fechaFin }}</p>
            <p><strong>Objetivo:</strong> {{ $capacitacion->objetivoCapacitacion }}</p>
            <p><strong>Ocupación Específica:</strong> {{ $capacitacion->ocupacion_especifica }}</p>
        </div>

        <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            🔙 Volver
        </a>
    </div>
