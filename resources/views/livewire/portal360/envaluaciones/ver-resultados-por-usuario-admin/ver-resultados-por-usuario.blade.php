<div class="p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="text-center border-b border-gray-300 pb-4">
            <h2 class="text-2xl font-bold text-gray-900">RESULTADOS EVALUACIÓN 360 - ADMINISTRADOR</h2>
            <p class="text-lg font-bold mt-2">{{ $calificadoNombre }}</p>
            <p class="text-sm text-gray-600">Evaluado por: {{ $calificadorNombre }}</p>
            <p class="text-sm text-gray-600">{{ $empresaNombre }} - {{ $sucursalNombre }}</p>
            <p class="text-sm text-gray-600">{{ $departamentoNombre }} - {{ $puestoNombre }}</p>
        </div>

        <!-- Estado de la evaluación -->
        <div class="mt-6 text-center">
            <h3 class="text-lg font-semibold text-gray-800">Estado de la Evaluación</h3>
            <p class="text-xl font-bold mt-2 @if($realizada) text-green-600 @else text-red-600 @endif">
                {{ $realizada ? 'Completada' : 'Pendiente' }}
            </p>
        </div>

        @if($realizada)
            <!-- Clasificación de Evaluaciones -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-800 text-center">Clasificación de Evaluaciones 360° por Niveles</h3>
                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-md">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-2 border">Rango</th>
                                <th class="px-4 py-2 border">Resultado</th>
                                <th class="px-4 py-2 border">Color</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td class="px-4 py-2 border">0-1</td>
                                <td class="px-4 py-2 border">Bajo</td>
                                <td class="px-4 py-2 border text-red-600 font-semibold">Rojo</td>
                            </tr>
                            <tr class="text-center">
                                <td class="px-4 py-2 border">1-2</td>
                                <td class="px-4 py-2 border">Regular</td>
                                <td class="px-4 py-2 border text-orange-500 font-semibold">Anaranjado</td>
                            </tr>
                            <tr class="text-center">
                                <td class="px-4 py-2 border">2-3</td>
                                <td class="px-4 py-2 border">Bueno</td>
                                <td class="px-4 py-2 border text-yellow-500 font-semibold">Amarillo</td>
                            </tr>
                            <tr class="text-center">
                                <td class="px-4 py-2 border">3-4</td>
                                <td class="px-4 py-2 border">Sobresaliente</td>
                                <td class="px-4 py-2 border text-green-600 font-semibold">Verde</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Promedio Final -->
            <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200 shadow-md">
                <div class="flex justify-between items-center">
                    <div class="text-xl font-bold text-gray-900">Promedio Final:</div>
                    <div class="flex items-center space-x-4">
                        <div class="text-2xl font-extrabold text-gray-800">
                            {{ number_format($promedioFinal, 2) }}
                        </div>
                        <span class="px-5 py-2 text-lg font-semibold text-white rounded-full shadow-md
                            @if($resultadoFinal == 'Bajo') bg-red-600
                            @elseif($resultadoFinal == 'Regular') bg-yellow-500
                            @elseif($resultadoFinal == 'Bueno') bg-blue-600
                            @elseif($resultadoFinal == 'Sobresaliente') bg-green-600
                            @else bg-gray-500
                            @endif">
                            {{ $resultadoFinal }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Gráfica de Desempeño -->
            <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200 shadow-md">
                @if(!request()->is('livewire/message/*'))
                    <h3 class="text-lg font-semibold text-gray-800 text-center">Gráfica de Desempeño por Pregunta</h3>
                    <div class="w-full max-w-4xl mx-auto" style="height: 500px;">
                        <canvas id="graficaDesempeno"></canvas>
                    </div>
                @else
                    <h3 class="text-lg font-semibold text-gray-800 text-center">Datos de Desempeño por Pregunta</h3>
                    <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-md mt-4">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-2 border">Pregunta</th>
                                <th class="px-4 py-2 border">Puntuación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datosGrafica as $dato)
                            <tr class="text-center">
                                <td class="px-4 py-2 border">{{ $dato['pregunta'] }}</td>
                                <td class="px-4 py-2 border">{{ $dato['puntuacion'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <!-- Botón Exportar PDF -->
            <div class="mt-6 text-center">
                <button wire:click="exportarPDF" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Exportar a PDF
                </button>
            </div>

            @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('livewire:init', function() {
                    const datosGrafica = @json($datosGrafica);

                    const preguntas = datosGrafica.map(item => item.pregunta);
                    const puntuaciones = datosGrafica.map(item => item.puntuacion);

                    const ctx = document.getElementById('graficaDesempeno').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: preguntas,
                            datasets: [{
                                label: 'Puntuación Promedio',
                                data: puntuaciones,
                                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                borderColor: 'rgb(75, 192, 192)',
                                borderWidth: 2,
                                barPercentage: 0.6,
                                categoryPercentage: 0.7
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            indexAxis: 'y',
                            scales: {
                                x: { beginAtZero: true, max: 4, title: { display: true, text: 'Puntuación' } },
                                y: { title: { display: true, text: 'Preguntas' } }
                            },
                            plugins: {
                                legend: { position: 'top' },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return `Puntuación: ${context.parsed.x.toFixed(2)}`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                });
            </script>
            @endpush
        @endif
    </div>
</div>