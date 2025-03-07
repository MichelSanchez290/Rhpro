<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ChartService
{
    public function generateChart($data)
    {
        // Verificar que las claves requeridas estén presentes
        if (!isset($data['type']) || !isset($data['labels']) || !isset($data['values'])) {
            throw new \InvalidArgumentException('El arreglo $data debe contener las claves "type", "labels" y "values".');
        }

        // Convertir etiquetas y valores a UTF-8
        $labels = array_map(function ($label) {
            return mb_convert_encoding($label, 'UTF-8', 'auto');
        }, $data['labels']);

        $values = array_map(function ($value) {
            return mb_convert_encoding($value, 'UTF-8', 'auto');
        }, $data['values']);

        // Configuración de la gráfica
        $chartConfig = [
            'type' => $data['type'],
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => $data['label'] ?? 'Dataset', // Usar un valor por defecto si 'label' no está definido
                        'data' => $values,
                        'backgroundColor' => $data['backgroundColor'] ?? ['rgba(75, 192, 192, 0.2)'], // Valor por defecto
                    ]
                ]
            ]
        ];

        // Enviar la configuración a QuickChart.io
        $response = Http::post('https://quickchart.io/chart/create', [
            'chart' => $chartConfig
        ]);

        // Obtener la URL de la imagen generada
        return $response->json('url');
    }

    public function generateChartBase64($labels, $data)
    {
        // Configuración del gráfico
        $chartConfig = [
            'type' => 'bar', // Tipo de gráfica
            'data' => [
                'labels' => $labels, // Etiquetas (ejemplo: ['Respuestas Positivas', 'Respuestas Negativas'])
                'datasets' => [
                    [
                        'label' => 'Respuestas', // Etiqueta del conjunto de datos
                        'data' => $data, // Valores (ejemplo: [20, 30])
                        'backgroundColor' => ['#1a8901', '#0c3fb5'], // Colores
                    ],
                ],
            ],
            'options' => [
                'title' => [
                    'display' => true,
                    'text' => 'Comparativa de Respuestas', // Título del gráfico
                    'fontSize' => 20,
                ],
                'legend' => [
                    'display' => true,
                ],
            ],
        ];

        // Codifica la configuración en JSON
        $jsonConfig = json_encode($chartConfig);

        // Realiza la petición a la API de QuickChart.io
        $response = Http::get('https://quickchart.io/chart', [
            'c' => $jsonConfig,
        ]);

        // Verifica si la respuesta fue exitosa
        if ($response->successful()) {
            // Devuelve la imagen como base64
            return "data:image/png;base64," . base64_encode($response->body());
        }

        return null; // Si falla, devuelve null
    }
}
