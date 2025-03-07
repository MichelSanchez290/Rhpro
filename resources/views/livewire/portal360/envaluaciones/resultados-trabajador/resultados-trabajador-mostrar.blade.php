<div>
    <div class="p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="text-center border-b border-gray-300 pb-4">
                <h2 class="text-2xl font-bold text-gray-900">REPORTE DE RESULTADOS EVALUACIÓN 360 GRADOS</h2>
                <!-- Mostrar el nombre del calificado -->
                <p class="text-lg font-bold mt-2">{{ $this->calificadoNombre }}</p>
                <!-- Mostrar la empresa -->
                <p class="text-sm text-gray-600">{{ $this->empresaNombre }}</p>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-800 text-center">Clasificación de Evaluaciones 360° por Niveles</h3>
                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-md">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-2 border">Rango de evaluaciones</th>
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

            <div class="overflow-x-auto rounded-md mt-6">
                <livewire:portal360.envaluaciones.resultadostrabajador.resultados-trabajador-table class="table-borderless" />
            </div>

            <!-- Sección para mostrar el promedio final -->
            <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200 shadow-md">
                <div class="flex justify-between items-center">
                    <div class="text-xl font-bold text-gray-900">Promedio Final:</div>
                    <div class="flex items-center space-x-4">
                        <!-- Número del promedio -->
                        <div class="text-2xl font-extrabold text-gray-800">
                            {{ number_format($this->promedioFinal, 2) }}
                        </div>
                        <!-- Etiqueta de resultado -->
                        <span class="px-5 py-2 text-lg font-semibold text-white rounded-full shadow-md
                            @if($this->resultadoFinal == 'Bajo') bg-red-600
                            @elseif($this->resultadoFinal == 'Regular') bg-yellow-500
                            @elseif($this->resultadoFinal == 'Bueno') bg-blue-600
                            @elseif($this->resultadoFinal == 'Sobresaliente') bg-green-600
                            @else bg-gray-500
                            @endif">
                            {{ $this->resultadoFinal }}
                        </span>
                    </div>
                </div>
            </div>
            <!-- En esta parte puedes poner la grafica de puntuacion final  -->
            <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200 shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 text-center">Gráfica de Desempeño por Pregunta</h3>
                <canvas id="graficaDesempeno"></canvas>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        const datosGrafica = @json($this->datosGrafica);

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
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 4
                    }
                }
            }
        });
    });
</script>
@endpush