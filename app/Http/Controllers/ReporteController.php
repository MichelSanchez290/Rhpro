<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dx035\Encuesta;
use App\Models\Dx035\Respuesta;
use App\Models\Dx035\TrabajadorEncuesta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;


use App\Models\Dx035\DatoTrabajador;
use Illuminate\Support\Facades\Log;


class ReporteController extends Controller
{

    public function generarPDF($encuestaId)
    {
        try {
            // Obtener los datos de la encuesta y los trabajadores
            $encuesta = Encuesta::findOrFail($encuestaId);
            $trabajadores = DatoTrabajador::where('encuestas_id', $encuestaId)->get();

            // Generar las gráficas
            $graficas = [
                'participacion' => $this->generarGraficaParticipacion($encuesta),
                'genero' => $this->generarGraficaGenero($trabajadores),
                // Otras gráficas...
            ];

            // Renderizar la vista del PDF
            $pdf = Pdf::loadView('reporte.estadistico', [
                'encuesta' => $encuesta,
                'graficas' => $graficas, // Asegúrate de pasar la variable $graficas
            ]);

            // Descargar el PDF
            return $pdf->stream('reporte_estadistico.pdf');
        } catch (\Exception $e) {
            Log::error('Error al generar el PDF:', ['error' => $e->getMessage()]);
            return back()->with('error', 'Error al generar el PDF: ' . $e->getMessage());
        }
    }

    public function generarReporte($encuestaId)
    {
        try {
            // Obtener los datos de la encuesta y los trabajadores
            $encuesta = Encuesta::findOrFail($encuestaId);
            $trabajadores = DatoTrabajador::where('encuestas_id', $encuestaId)->get();

            // Generar las gráficas
            $graficas = [
                'participacion' => $this->generarGraficaParticipacion($encuesta),
                'genero' => $this->generarGraficaGenero($trabajadores),
                // Otras gráficas...
            ];

            // Renderizar la vista del PDF
            $pdf = Pdf::loadView('reporte.estadistico', [
                'encuesta' => $encuesta,
                'graficas' => $graficas, // Asegúrate de pasar la variable $graficas
            ]);

            // Descargar el PDF
            return $pdf->stream('reporte_estadistico.pdf');
        } catch (\Exception $e) {
            Log::error('Error al generar el reporte:', ['error' => $e->getMessage()]);
            throw $e; // Re-lanza la excepción para que Livewire la maneje
        }
    }

    // Métodos para generar gráficas de pastel
    private function generarGraficaParticipacion($encuesta)
    {
        $contestadas = $encuesta->EncuestasContestadas;
        $sinContestar = $encuesta->NumeroEncuestas - $contestadas;

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => ['Contestadas', 'Sin Contestar'],
                'datasets' => [
                    [
                        'data' => [$contestadas, $sinContestar],
                        'backgroundColor' => ['#36a2eb', '#ff6384'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaGenero($trabajadores)
    {
        $hombres = $trabajadores->where('Sexo', 'Masculino')->count();
        $mujeres = $trabajadores->where('Sexo', 'Femenino')->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => ['Hombres', 'Mujeres'],
                'datasets' => [
                    [
                        'data' => [$hombres, $mujeres],
                        'backgroundColor' => ['#36a2eb', '#ff6384'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaEdad($trabajadores)
    {
        $edades = $trabajadores->groupBy('Edad')->map->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $edades->keys()->toArray(),
                'datasets' => [
                    [
                        'data' => $edades->values()->toArray(),
                        'backgroundColor' => ['#ff9f40', '#4bc0c0', '#9966ff', '#ffcd56'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaEstadoCivil($trabajadores)
    {
        $estadosCiviles = $trabajadores->groupBy('EstadoCivil')->map->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $estadosCiviles->keys()->toArray(),
                'datasets' => [
                    [
                        'data' => $estadosCiviles->values()->toArray(),
                        'backgroundColor' => ['#ff9f40', '#4bc0c0', '#9966ff', '#ffcd56'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaEstudios($trabajadores)
    {
        $estudios = $trabajadores->groupBy('Estudios')->map->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $estudios->keys()->toArray(),
                'datasets' => [
                    [
                        'data' => $estudios->values()->toArray(),
                        'backgroundColor' => ['#ff9f40', '#4bc0c0', '#9966ff', '#ffcd56'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaDepartamento($trabajadores)
    {
        $departamentos = $trabajadores->groupBy('Departamento')->map->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $departamentos->keys()->toArray(),
                'datasets' => [
                    [
                        'data' => $departamentos->values()->toArray(),
                        'backgroundColor' => ['#ff9f40', '#4bc0c0', '#9966ff', '#ffcd56'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaPuesto($trabajadores)
    {
        $puestos = $trabajadores->groupBy('TipoPuesto')->map->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $puestos->keys()->toArray(),
                'datasets' => [
                    [
                        'data' => $puestos->values()->toArray(),
                        'backgroundColor' => ['#ff9f40', '#4bc0c0', '#9966ff', '#ffcd56'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaContratacion($trabajadores)
    {
        $contrataciones = $trabajadores->groupBy('Contratacion')->map->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $contrataciones->keys()->toArray(),
                'datasets' => [
                    [
                        'data' => $contrataciones->values()->toArray(),
                        'backgroundColor' => ['#ff9f40', '#4bc0c0', '#9966ff', '#ffcd56'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaJornada($trabajadores)
    {
        $jornadas = $trabajadores->groupBy('JornadaTrabajo')->map->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $jornadas->keys()->toArray(),
                'datasets' => [
                    [
                        'data' => $jornadas->values()->toArray(),
                        'backgroundColor' => ['#ff9f40', '#4bc0c0', '#9966ff', '#ffcd56'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaRotacion($trabajadores)
    {
        $rotaciones = $trabajadores->groupBy('RotacionTurnos')->map->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $rotaciones->keys()->toArray(),
                'datasets' => [
                    [
                        'data' => $rotaciones->values()->toArray(),
                        'backgroundColor' => ['#ff9f40', '#4bc0c0', '#9966ff', '#ffcd56'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaExperiencia($trabajadores)
    {
        $experiencias = $trabajadores->groupBy('Experiencia')->map->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $experiencias->keys()->toArray(),
                'datasets' => [
                    [
                        'data' => $experiencias->values()->toArray(),
                        'backgroundColor' => ['#ff9f40', '#4bc0c0', '#9966ff', '#ffcd56'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaTiempoPuesto($trabajadores)
    {
        $tiemposPuesto = $trabajadores->groupBy('TiempoPuesto')->map->count();

        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $tiemposPuesto->keys()->toArray(),
                'datasets' => [
                    [
                        'data' => $tiemposPuesto->values()->toArray(),
                        'backgroundColor' => ['#ff9f40', '#4bc0c0', '#9966ff', '#ffcd56'],
                    ],
                ],
            ],
        ];

        return $this->generarGraficaBase64($chartConfig);
    }

    private function generarGraficaBase64($chartConfig)
    {
        $jsonConfig = json_encode($chartConfig, JSON_UNESCAPED_UNICODE);
        $response = Http::get('https://quickchart.io/chart', ['c' => $jsonConfig]);

        if ($response->successful()) {
            return "data:image/png;base64," . base64_encode($response->body());
        } else {
            throw new \RuntimeException('Error en la respuesta de QuickChart.io: ' . $response->status());
        }
    }
}
