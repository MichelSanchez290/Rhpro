<div class="bg-gray-100 min-h-screen p-6">
    <div class="bg-white p-6 shadow-lg rounded-lg mx-auto max-w-7xl">
        <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Resultados de la Evaluación</h3>
        <p class="text-base font-semibold text-gray-600 text-center mt-[-8px]">{{ $empresaNombre }}</p>
        <p class="text-base font-semibold text-gray-600 text-center mt-[-8px]">{{ $sucursalNombre }}</p>
        <div class="mb-6">
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

        <!-- Resultados de la Evaluación -->
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200 shadow-md rounded-md">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-4 py-2 border">Calificador</th>
                        <th class="px-4 py-2 border">Calificado</th>
                        <th class="px-4 py-2 border">Pregunta</th>
                        <th class="px-4 py-2 border">Respuesta</th>
                        <th class="px-4 py-2 border">Puntuación</th>
                        <th class="px-4 py-2 border">Departamento</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if (count($resultados) > 0)
                    @foreach($resultados as $resultado)
                    <tr>
                        <td class="px-4 py-2 border">{{ $resultado['calificador'] }}</td>
                        <td class="px-4 py-2 border">{{ $resultado['calificado'] }}</td>
                        <td class="px-4 py-2 border">{{ $resultado['pregunta'] }}</td>
                        <td class="px-4 py-2 border">{{ $resultado['respuesta'] }}</td>
                        <td class="px-4 py-2 border">{{ $resultado['puntuacion'] }}</td>
                        <td class="px-4 py-2 border">{{ $resultado['departamento'] }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="px-4 py-2 border text-center">No hay respuestas disponibles.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>