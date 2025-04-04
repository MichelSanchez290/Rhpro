<div class="bg-gray-100 min-h-screen p-6">
    <div class="bg-white p-6 shadow-lg rounded-lg mx-auto max-w-7xl">
        <h2 class="text-3xl font-bold text-gray-900 text-center" style="font-family: Arial, sans-serif;">
            REPORTE GENERAL DE RESULTADOS EVALUACIÓN 360 GRADOS
        </h2>
        <p class="text-base font-semibold text-gray-600 text-center mt-2">{{ $encuestaNombre }}</p> <!-- Nombre de la encuesta -->
        <p class="text-base font-semibold text-gray-600 text-center mt-2">{{ $calificadoNombre }}</p>
        <p class="text-base font-semibold text-gray-600 text-center mt-[-8px]">{{ $empresaNombre }}</p>
        <p class="text-base font-semibold text-gray-600 text-center mt-[-8px]">{{ $sucursalNombre }}</p>

        <div class="mb-6 mt-6">
            <h3 class="text-lg font-semibold text-gray-800 text-center mb-4">Clasificación de Evaluaciones 360° por Niveles</h3>
            <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-200 shadow-md rounded-md">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="px-4 py-2 border">Rango</th>
                            <th class="px-4 py-2 border">Resultado</th>
                            <th class="px-4 py-2 border">Color</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td class="px-4 py-2 border">0-1</td>
                            <td class="px-4 py-2 border">Bajo</td>
                            <td class="px-4 py-2 border text-red-600 font-semibold">Rojo</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border">1-2</td>
                            <td class="px-4 py-2 border">Regular</td>
                            <td class="px-4 py-2 border text-orange-500 font-semibold">Anaranjado</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border">2-3</td>
                            <td class="px-4 py-2 border">Bueno</td>
                            <td class="px-4 py-2 border text-yellow-500 font-semibold">Amarillo</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border">3-4</td>
                            <td class="px-4 py-2 border">Sobresaliente</td>
                            <td class="px-4 py-2 border text-green-600 font-semibold">Verde</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if (count($resultados) > 0)
        @foreach($resultados as $pregunta => $resultadosPregunta)
        <div class="mb-6">
            <h4 class="text-lg font-semibold text-gray-800 text-center mb-4">{{ $pregunta }}</h4>
            <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-200 shadow-md rounded-md">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="px-4 py-2 border">Nombre del colaborador</th>
                            <th class="px-4 py-2 border">Departamento</th>
                            <th class="px-4 py-2 border">Resultados</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($resultadosPregunta as $resultado)
                        <tr>
                            <td class="px-4 py-2 border">{{ $resultado['nombre'] }}</td>
                            <td class="px-4 py-2 border">{{ $resultado['departamento'] }}</td>
                            <td class="px-4 py-2 border">
                                @if($resultado['nombre'] === 'Promedio final')
                                <span class="font-bold">{{ $resultado['resultado'] }}</span>
                                @else
                                {{ $resultado['resultado'] }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
        @else
        <div class="text-center text-gray-600">
            No hay respuestas disponibles para este usuario.
        </div>
        @endif
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Resultados Generales</h2>
            <div>
                <button
                    wire:click="exportarPDF"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow">
                    Exportar a PDF
                </button>
                <button
                    wire:click="exportarExcel"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow">
                    Exportar a Excel
                </button>
            </div>
        </div>
    </div>
</div>