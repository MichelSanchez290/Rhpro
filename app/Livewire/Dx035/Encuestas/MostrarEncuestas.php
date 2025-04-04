<?php

namespace App\Livewire\Dx035\Encuestas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dx035\Encuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitacionEncuesta;
use App\Models\Dx035\Respuesta;
use App\Models\Dx035\DatoTrabajador;

use App\Models\Dx035\PreguntaBase;

use Barryvdh\DomPDF\Facade\Pdf;
use IcehouseVentures\LaravelChartjs\Builder;
use ChartJsNodeCanvas\ChartJsNodeCanvas;
use App\Services\ChartService;
use App\Http\Controllers\ReporteController;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\SucursalDepartamento;
use App\Models\PortalRH\EmpresaSucursal;
use App\Models\PortalRH\Departamento;

class MostrarEncuestas extends Component
{
    use WithPagination;

    public $showModal = false;
    public $encuestaToDelete;
    public $search = '';
    public $emails;
    public $mensaje;
    public $avances = [];
    // $user = Auth::user();
    // $nombreEmpresa = $user->empresa->nombre; // Obtén el nombre de la empresa

    public $tipoReporte;
    public $diagnostico;

    public $prueba;

    public $showLoading = false;
    public $showSuccess = false;

    protected $listeners = [
        'confirmDelete' => 'confirmDelete',
        'deleteEncuesta' => 'deleteEncuesta',
        'copiarClave' => 'copiarClave',
        'compartirEnlace' => 'compartirEnlace',
        'mostrar-loading' => 'mostrarLoading',
        'mostrar-exito' => 'mostrarExito',
    ];

    public function confirmDelete($id)
    {
        $this->encuestaToDelete = $id;
        $this->showModal = true;
    }

    public function calcularAvance($encuesta)
    {
        return ($encuesta->EncuestasContestadas / $encuesta->NumeroEncuestas) * 100;
    }

    public function deleteEncuesta($id)
    {
        \Log::info("Intentando eliminar la encuesta con ID: $id"); // Log para depuración

        try {
            $encuesta = Encuesta::findOrFail($id);
            $encuesta->delete();

            \Log::info("Encuesta eliminada correctamente"); // Log para depuración

            // Mostrar un mensaje de éxito
            session()->flash('message', 'Encuesta eliminada correctamente.');

            // Cerrar el modal
            $this->showModal = false;

            // Redirigir a la tabla de encuestas
            return redirect()->route('encuesta.index');
        } catch (\Exception $e) {
            \Log::error("Error al eliminar la encuesta: " . $e->getMessage()); // Log para depuración
            session()->flash('error', 'Hubo un error al eliminar la encuesta.');
            $this->showModal = false;
        }
    }

    public function copiarClave($clave)
    {
        $this->dispatchBrowserEvent('copiar-clave', ['clave' => $clave]);
    }

    public function compartirEnlace($clave)
    {
        $enlace = route('survey.show', ['key' => $clave]);
        $this->dispatchBrowserEvent('compartir-enlace', ['enlace' => $enlace]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function enviarInvitacion()
    {
        $emails = array_map('trim', explode(',', $this->emails));

        foreach ($emails as $email) {
            Mail::to($email)->send(new InvitacionEncuesta($this->mensaje, $this->encuestaToShare));
        }

        session()->flash('message', 'Invitaciones enviadas correctamente.');
        return redirect()->route('encuesta.index');
    }

    private function limpiarDatos($dato)
    {
        if ($dato === null || $dato === '') {
            return ''; // Devuelve una cadena vacía si el valor es null o vacío
        }

        if ($dato instanceof \Illuminate\Support\Collection) {
            // Si es una colección, limpia cada elemento
            return $dato->map(function ($item) {
                return $this->limpiarDatos($item);
            });
        }

        if (is_array($dato)) {
            // Si es un array, limpia cada elemento
            return array_map([$this, 'limpiarDatos'], $dato);
        }

        // Elimina caracteres no válidos de manera más agresiva
        $dato = preg_replace('/[^\x20-\x7E]/u', '', $dato);

        // Convierte a UTF-8 si no lo está
        if (!mb_check_encoding($dato, 'UTF-8')) {
            $dato = mb_convert_encoding($dato, 'UTF-8', 'auto');
        }

        return $dato;
    }


    private function generarGrafica($labels, $data, $backgroundColor, $borderColor, $type = 'bar')
    {
        // Depuración: Verifica los datos
        logger('Labels antes de la conversión:', $labels);
        logger('Data antes de la conversión:', $data);

        // Limpia los datos
        $labels = $this->limpiarDatos($labels);
        $data = $this->limpiarDatos($data);

        // Asegúrate de que los datos estén en UTF-8
        $labels = array_map(function ($label) {
            if (!mb_check_encoding($label, 'UTF-8')) {
                $label = mb_convert_encoding($label, 'UTF-8', 'auto');
            }
            return $label;
        }, $labels);

        $data = array_map(function ($value) {
            if (!mb_check_encoding($value, 'UTF-8')) {
                $value = mb_convert_encoding($value, 'UTF-8', 'auto');
            }
            return $value;
        }, $data);

        // Depuración: Verifica los datos después de la conversión
        logger('Labels después de la conversión:', $labels);
        logger('Data después de la conversión:', $data);

        // Configuración de la gráfica
        $chartConfig = [
            'type' => $type,
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'Respuestas',
                        'data' => $data,
                        'backgroundColor' => $backgroundColor,
                        'borderColor' => $borderColor,
                        'borderWidth' => 1,
                    ],
                ],
            ],
            'options' => [
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                    ],
                ],
            ],
        ];

        // Codificar la configuración en JSON
        $chartConfigJson = json_encode($chartConfig, JSON_UNESCAPED_UNICODE);

        if ($chartConfigJson === false) {
            throw new \RuntimeException('Error al codificar la configuración de la gráfica: ' . json_last_error_msg());
        }

        // Generar la URL de la gráfica
        $chartUrl = 'https://quickchart.io/chart?c=' . urlencode($chartConfigJson);

        return $chartUrl;
    }


    private function generarGraficaBase64($chartConfig, $nombreArchivo)
    {
        try {
            // Codificar la configuración de la gráfica en JSON
            $jsonConfig = json_encode($chartConfig, JSON_UNESCAPED_UNICODE);

            if ($jsonConfig === false) {
                throw new \RuntimeException('Error al codificar la configuración de la gráfica: ' . json_last_error_msg());
            }

            // Realizar la petición a QuickChart.io
            $response = Http::get('https://quickchart.io/chart', [
                'c' => $jsonConfig,
            ]);

            // Verificar si la respuesta fue exitosa
            if ($response->successful()) {
                // Guardar la imagen en el servidor
                $rutaArchivo = storage_path('app/public/' . $nombreArchivo . '.png');
                file_put_contents($rutaArchivo, $response->body());

                // Devolver la ruta pública del archivo
                return asset('storage/' . $nombreArchivo . '.png');
            } else {
                throw new \RuntimeException('Error en la respuesta de QuickChart.io: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica base64:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function generateChartBase64()
    {
        try {
            // Verifica si $this->diagnostico está definido y no es nulo
            if (!isset($this->diagnostico)) {
                throw new \RuntimeException('La propiedad $diagnostico no está definida.');
            }

            // Asegúrate de que $this->diagnostico sea una colección o un array
            if (!is_array($this->diagnostico) && !$this->diagnostico instanceof \Illuminate\Support\Collection) {
                throw new \RuntimeException('La propiedad $diagnostico no es una colección o un array.');
            }

            // Extrae el primer valor de la colección
            $iniValue = $this->diagnostico->first(); // Extrae el primer valor de la colección
            $finValue = $this->final->first(); // Extrae el primer valor de la colección

            // Configuración del gráfico
            $chartConfig = [
                'type' => 'bar',
                'data' => [
                    'labels' => ['Examen Diagnóstico', 'Examen Final'],
                    'datasets' => [
                        [
                            'label' => 'Puntajes',
                            'data' => [$iniValue, $finValue, 100],
                            'backgroundColor' => ['#1a8901', '#0c3fb5'],
                        ],
                    ],
                ],
                'options' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Comparativa de Exámenes',
                        'fontSize' => 20,
                    ],
                    'legend' => [
                        'display' => true,
                    ],
                ],
            ];

            // Codifica la configuración en JSON
            $jsonConfig = json_encode($chartConfig, JSON_UNESCAPED_UNICODE);

            if ($jsonConfig === false) {
                throw new \RuntimeException('Error al codificar la configuración de la gráfica: ' . json_last_error_msg());
            }

            // Realiza la petición a la API de quickchart.io
            $response = Http::get('https://quickchart.io/chart', [
                'c' => $jsonConfig,
            ]);

            // Verifica si la respuesta fue exitosa
            if ($response->successful()) {
                // Devuelve la imagen como base64 sin codificarla nuevamente
                return "data:image/png;base64," . base64_encode($response->body());
            } else {
                throw new \RuntimeException('Error en la respuesta de QuickChart.io: ' . $response->status());
            }
        } catch (\Exception $e) {
            logger('Error al generar la gráfica:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function generarPDF()
    {
        try {
            // Genera la imagen base64 de la gráfica
            $chartBase64 = $this->generateChartBase64();

            // Renderiza la vista con los datos
            $pdf = Pdf::loadView('reporte.estadistico', [
                'chartBase64' => $chartBase64,
                // Otros datos que necesites pasar a la vista
            ]);

            // Configura opciones de Dompdf
            $pdf->setOption('defaultFont', 'Arial');
            $pdf->setOption('isHtml5ParserEnabled', true);
            $pdf->setOption('isRemoteEnabled', true);
            $pdf->setOption('defaultEncoding', 'UTF-8');

            // Descarga el PDF
            return $pdf->stream("reporte.pdf");
        } catch (\Exception $e) {
            logger('Error al generar el PDF:', ['error' => $e->getMessage()]);
            return back()->with('error', 'Error al generar el PDF: ' . $e->getMessage());
        }
    }

    private function generarGraficaParticipacion($encuesta)
    {
        try {
            // Contar las encuestas contestadas y no contestadas
            $contestadas = $encuesta['EncuestasContestadas'];
            $sinContestar = $encuesta['NumeroEncuestas'] - $contestadas;

            // Configuración de la gráfica de pastel
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
                'options' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Índice de Participación',
                        'fontSize' => 20,
                    ],
                    'legend' => [
                        'display' => true,
                    ],
                ],
            ];

            // Guardar la gráfica localmente y obtener la ruta
            return $this->guardarGraficaLocal($chartConfig, 'participacion_' . $encuesta['id']);
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de participación:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function guardarGraficaLocal($chartConfig, $nombreArchivo)
    {
        try {
            // Codificar la configuración de la gráfica en JSON
            $jsonConfig = json_encode($chartConfig, JSON_UNESCAPED_UNICODE);

            if ($jsonConfig === false) {
                throw new \RuntimeException('Error al codificar la configuración de la gráfica: ' . json_last_error_msg());
            }

            // Realizar la petición a QuickChart.io
            $response = Http::get('https://quickchart.io/chart', [
                'c' => $jsonConfig,
            ]);

            // Verificar si la respuesta fue exitosa
            if ($response->successful()) {
                // Crear la carpeta si no existe
                $carpeta = storage_path('app/public/graficas');
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }

                // Guardar la imagen en el servidor
                $rutaArchivo = $carpeta . '/' . $nombreArchivo . '.png';
                file_put_contents($rutaArchivo, $response->body());

                // Devolver la ruta pública del archivo
                return asset('storage/graficas/' . $nombreArchivo . '.png');
            } else {
                throw new \RuntimeException('Error en la respuesta de QuickChart.io: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Error al guardar la gráfica localmente:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function generarReporte($encuestaId)
    {
        try {
            Log::debug('Iniciando generación de reporte para la encuesta:', ['encuestaId' => $encuestaId]);

            // Obtener la encuesta y convertirla a array
            $encuesta = Encuesta::findOrFail($encuestaId)->toArray();

            // Verificar que NumeroEncuestas esté presente
            if (!isset($encuesta['NumeroEncuestas'])) {
                Log::error('El campo NumeroEncuestas no está presente en la encuesta.');
                throw new \Exception('El campo NumeroEncuestas no está presente en la encuesta.');
            }

            // Calcular días totales
            $fechaInicio = \Carbon\Carbon::parse($encuesta['FechaInicio']);
            $fechaFinal = \Carbon\Carbon::parse($encuesta['FechaFinal']);
            $encuesta['diasTotales'] = $fechaInicio->diffInDays($fechaFinal);

            // Limpiar los datos de la encuesta
            $encuesta = $this->limpiarDatos($encuesta);

            Log::debug('Encuesta encontrada y convertida a array:', ['encuesta' => $encuesta]);

            // Generar las gráficas
            $graficas = [
                'participacion' => $this->generarGraficaParticipacion($encuesta),
                'genero' => $this->generarGraficaGenero($encuestaId),
                'edades' => $this->generarGraficaEdades($encuestaId),
                'estadoCivil' => $this->generarGraficaEstadoCivil($encuestaId),
                'tipoPuesto' => $this->generarGraficaTipoPuesto($encuestaId),
                'contratacion' => $this->generarGraficaContratacion($encuestaId),
                'tipoPersonal' => $this->generarGraficaTipoPersonal($encuestaId),
                'jornadaLaboral' => $this->generarGraficaJornadaLaboral($encuestaId),
                'rotacionTurnos' => $this->generarGraficaRotacionTurnos($encuestaId),
                'experiencia' => $this->generarGraficaExperiencia($encuestaId),
                'tiempoPuesto' => $this->generarGraficaTiempoPuesto($encuestaId),
            ];

            // Verificar que las gráficas se generaron correctamente
            foreach ($graficas as $nombre => $grafica) {
                if (is_null($grafica)) {
                    Log::error("Error: La gráfica '$nombre' no se generó correctamente.");
                    throw new \Exception("Error al generar la gráfica '$nombre'.");
                }
            }

            Log::debug('Gráficas generadas:', ['graficas' => $graficas]);

            // Renderizar la vista del PDF
            $pdf = Pdf::loadView('reporte.estadistico', [
                'encuesta' => $encuesta,
                'graficas' => $graficas,
            ]);

            // Configurar opciones de Dompdf
            $pdf->setOption('defaultFont', 'DejaVu Sans'); // Fuente compatible con UTF-8
            $pdf->setOption('isHtml5ParserEnabled', true);
            $pdf->setOption('isRemoteEnabled', true); // Habilitar la carga de recursos remotos
            $pdf->setOption('defaultEncoding', 'UTF-8');
            $pdf->setOption('isPhpEnabled', true);

            Log::debug('Opciones de Dompdf configuradas');

            // Guardar el PDF en un archivo temporal
            $tempFilePath = tempnam(sys_get_temp_dir(), 'reporte_') . '.pdf';
            $pdf->save($tempFilePath);

            // Descargar el archivo
            return response()->download($tempFilePath, 'reporte_' . $encuesta['id'] . '.pdf')->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Error al generar el reporte:', ['error' => $e->getMessage()]);

            // Manejar el error sin usar emit
            return response()->json(['error' => 'Ocurrió un error al generar el reporte.'], 500);
        }
    }

    private function generarGraficaPastel($labels, $data, $nombreArchivo)
    {
        try {
            // Configuración de la gráfica de pastel
            $chartConfig = [
                'type' => 'pie',
                'data' => [
                    'labels' => $labels,
                    'datasets' => [
                        [
                            'data' => $data,
                            'backgroundColor' => ['#36a2eb', '#ff6384', '#4bc0c0', '#ff9f40', '#9966ff'],
                        ],
                    ],
                ],
                'options' => [
                    'title' => [
                        'display' => true,
                        'text' => '',
                        'fontSize' => 20,
                    ],
                    'legend' => [
                        'display' => true,
                    ],
                ],
            ];

            // Guardar la gráfica localmente y obtener la ruta
            return $this->guardarGraficaLocal($chartConfig, $nombreArchivo);
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de pastel:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function generarGraficaGenero($encuestaId)
    {
        try {
            // Contar la distribución de género directamente desde la base de datos
            $hombres = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->where('Sexo', 'Masculino')
                ->count();

            $mujeres = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->where('Sexo', 'Femenino')
                ->count();

            // Depuración: Verificar el conteo de géneros
            logger('Conteo de géneros:', ['hombres' => $hombres, 'mujeres' => $mujeres]);

            // Configuración de la gráfica de género
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
                'options' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Distribución de Género',
                        'fontSize' => 20,
                    ],
                    'legend' => [
                        'display' => true,
                    ],
                ],
            ];

            // Guardar la gráfica localmente y obtener la ruta
            return $this->guardarGraficaLocal($chartConfig, 'genero_' . $encuestaId);
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de género:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function generarGraficaEdades($encuestaId)
    {
        try {
            // Obtener los datos de edades
            $edades = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->selectRaw('Edad, COUNT(*) as total')
                ->groupBy('Edad')
                ->get();

            // Preparar los datos para la gráfica
            $labels = $edades->pluck('Edad')->toArray();
            $data = $edades->pluck('total')->toArray();

            // Generar la gráfica de pastel
            return $this->generarGraficaPastel($labels, $data, 'edades_' . $encuestaId, 'Distribución de Edades');
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de edades:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function generarGraficaEstadoCivil($encuestaId)
    {
        try {
            // Obtener los datos de estado civil
            $estadoCivil = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->selectRaw('EstadoCivil, COUNT(*) as total')
                ->groupBy('EstadoCivil')
                ->get();

            // Preparar los datos para la gráfica
            $labels = $estadoCivil->pluck('EstadoCivil')->toArray();
            $data = $estadoCivil->pluck('total')->toArray();

            // Generar la gráfica de pastel
            return $this->generarGraficaPastel($labels, $data, 'estado_civil_' . $encuestaId, 'Distribución de Estado Civil');
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de estado civil:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function generarGraficaTipoPuesto($encuestaId)
    {
        try {
            // Obtener los datos de tipo de puesto
            $tipoPuesto = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->selectRaw('TipoPuesto, COUNT(*) as total')
                ->groupBy('TipoPuesto')
                ->get();

            // Preparar los datos para la gráfica
            $labels = $tipoPuesto->pluck('TipoPuesto')->toArray();
            $data = $tipoPuesto->pluck('total')->toArray();

            // Generar la gráfica de pastel
            return $this->generarGraficaPastel($labels, $data, 'tipo_puesto_' . $encuestaId, 'Distribución por Tipo de Puesto');
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de tipo de puesto:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function generarGraficaContratacion($encuestaId)
    {
        try {
            // Obtener los datos de contratación
            $contratacion = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->selectRaw('Contratacion, COUNT(*) as total')
                ->groupBy('Contratacion')
                ->get();

            // Preparar los datos para la gráfica
            $labels = $contratacion->pluck('Contratacion')->toArray();
            $data = $contratacion->pluck('total')->toArray();

            // Generar la gráfica de pastel
            return $this->generarGraficaPastel($labels, $data, 'contratacion_' . $encuestaId, 'Distribución por Contratación');
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de contratación:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function generarGraficaTipoPersonal($encuestaId)
    {
        try {
            // Obtener los datos de tipo de personal
            $tipoPersonal = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->selectRaw('TipoPersonal, COUNT(*) as total')
                ->groupBy('TipoPersonal')
                ->get();

            // Preparar los datos para la gráfica
            $labels = $tipoPersonal->pluck('TipoPersonal')->toArray();
            $data = $tipoPersonal->pluck('total')->toArray();

            // Generar la gráfica de pastel
            return $this->generarGraficaPastel($labels, $data, 'tipo_personal_' . $encuestaId, 'Distribución por Tipo de Personal');
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de tipo de personal:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function generarGraficaJornadaLaboral($encuestaId)
    {
        try {
            // Obtener los datos de jornada laboral
            $jornadaLaboral = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->selectRaw('JornadaTrabajo, COUNT(*) as total')
                ->groupBy('JornadaTrabajo')
                ->get();

            // Preparar los datos para la gráfica
            $labels = $jornadaLaboral->pluck('JornadaTrabajo')->toArray();
            $data = $jornadaLaboral->pluck('total')->toArray();

            // Generar la gráfica de pastel
            return $this->generarGraficaPastel($labels, $data, 'jornada_laboral_' . $encuestaId, 'Distribución por Jornada Laboral');
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de jornada laboral:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function generarGraficaRotacionTurnos($encuestaId)
    {
        try {
            // Obtener los datos de rotación de turnos
            $rotacionTurnos = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->selectRaw('RotacionTurnos, COUNT(*) as total')
                ->groupBy('RotacionTurnos')
                ->get();

            // Preparar los datos para la gráfica
            $labels = $rotacionTurnos->pluck('RotacionTurnos')->toArray();
            $data = $rotacionTurnos->pluck('total')->toArray();

            // Generar la gráfica de pastel
            return $this->generarGraficaPastel($labels, $data, 'rotacion_turnos_' . $encuestaId, 'Distribución por Rotación de Turnos');
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de rotación de turnos:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function generarGraficaExperiencia($encuestaId)
    {
        try {
            // Obtener los datos de experiencia
            $experiencia = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->selectRaw('Experiencia, COUNT(*) as total')
                ->groupBy('Experiencia')
                ->get();

            // Preparar los datos para la gráfica
            $labels = $experiencia->pluck('Experiencia')->toArray();
            $data = $experiencia->pluck('total')->toArray();

            // Generar la gráfica de pastel
            return $this->generarGraficaPastel($labels, $data, 'experiencia_' . $encuestaId, 'Distribución por Experiencia');
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de experiencia:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function generarGraficaTiempoPuesto($encuestaId)
    {
        try {
            // Obtener los datos de tiempo en el puesto
            $tiempoPuesto = DatoTrabajador::where('encuestas_id', $encuestaId)
                ->selectRaw('TiempoPuesto, COUNT(*) as total')
                ->groupBy('TiempoPuesto')
                ->get();

            // Preparar los datos para la gráfica
            $labels = $tiempoPuesto->pluck('TiempoPuesto')->toArray();
            $data = $tiempoPuesto->pluck('total')->toArray();

            // Generar la gráfica de pastel
            return $this->generarGraficaPastel($labels, $data, 'tiempo_puesto_' . $encuestaId, 'Distribución por Tiempo en el Puesto');
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de tiempo en el puesto:', ['error' => $e->getMessage()]);
            return null;
        }
    }



    public function obtenerDatosParaReporte($encuesta)
    {
        // Obtener datos de la encuesta y respuestas
        $respuestas = Respuesta::whereHas('datoTrabajador', function ($query) use ($encuesta) {
            $query->where('encuestas_id', $encuesta->id);
        })->get();

        // Obtener datos de los trabajadores
        $trabajadores = DatoTrabajador::where('encuestas_id', $encuesta->id)->get();

        // Preparar datos para las gráficas
        $respuestasPositivas = $respuestas->where('ValorRespuesta', 1)->count();
        $respuestasNegativas = $respuestas->where('ValorRespuesta', 0)->count();

        // Generar la gráfica de participación
        $chartParticipacionUrl = $this->generarGrafica(
            ['Respuestas Positivas', 'Respuestas Negativas'],
            [$respuestasPositivas, $respuestasNegativas],
            ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
            ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)']
        );

        // Generar la gráfica de género
        $chartGeneroUrl = $this->generarGraficaGenero($trabajadores);

        // Generar la imagen base64 de la gráfica
        $chartBase64 = $this->generateChartBase64();

        return [
            'encuesta' => $encuesta,
            'respuestas' => $respuestas,
            'trabajadores' => $trabajadores,
            'chartParticipacionUrl' => $chartParticipacionUrl,
            'chartGeneroUrl' => $chartGeneroUrl,
            'chartBase64' => $chartBase64,
        ];
    }

    private function generarGraficaBarrasHorizontales($labels, $data, $nombreArchivo, $titulo = '')
    {
        try {
            // Configuración de la gráfica de barras horizontales
            $chartConfig = [
                'type' => 'bar',
                'data' => [
                    'labels' => $labels,
                    'datasets' => [
                        [
                            'label' => 'Puntaje',
                            'data' => $data,
                            'backgroundColor' => [
                                '#36a2eb', '#ff6384', '#4bc0c0', '#ff9f40', '#9966ff',
                                '#ffcd56', '#c9cbcf', '#8dd3c7', '#ffffb3', '#bebada',
                                '#fb8072', '#80b1d3', '#fdb462', '#b3de69', '#fccde5'
                            ],
                            'borderColor' => [
                                '#36a2eb', '#ff6384', '#4bc0c0', '#ff9f40', '#9966ff',
                                '#ffcd56', '#c9cbcf', '#8dd3c7', '#ffffb3', '#bebada',
                                '#fb8072', '#80b1d3', '#fdb462', '#b3de69', '#fccde5'
                            ],
                            'borderWidth' => 1
                        ],
                    ],
                ],
                'options' => [
                    'indexAxis' => 'y',  // Esto hace que las barras sean horizontales
                    'responsive' => true,
                    'plugins' => [
                        'legend' => [
                            'display' => false
                        ],
                        'title' => [
                            'display' => true,
                            'text' => $titulo,
                            'font' => [
                                'size' => 16
                            ]
                        ]
                    ],
                    'scales' => [
                        'x' => [
                            'beginAtZero' => true,
                            'max' => 100,
                            'title' => [
                                'display' => true,
                                'text' => 'Porcentaje'
                            ]
                        ],
                        'y' => [
                            'title' => [
                                'display' => true,
                                'text' => 'Categorías'
                            ]
                        ]
                    ]
                ]
            ];

            // Guardar la gráfica localmente y obtener la ruta
            return $this->guardarGraficaLocal($chartConfig, $nombreArchivo);
        } catch (\Exception $e) {
            Log::error('Error al generar la gráfica de barras horizontales:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function calcularCalificacionFinal($respuestas)
    {
        $puntaje = 0;

        foreach ($respuestas as $respuesta) {
            // Asegúrate de que $respuesta sea un objeto y accede a su propiedad ValorRespuesta
            $valorRespuesta = $respuesta->ValorRespuesta;

            // Aplicar la lógica de calificación según el cuestionario 2
            if (in_array($respuesta->preguntasbases_id, range(18, 33))) {
                $puntaje += $valorRespuesta; // Siempre=0, Casi siempre=1, etc.
            } elseif (in_array($respuesta->preguntasbases_id, array_merge(range(1, 17), range(34, 46)))) {
                $puntaje += (4 - $valorRespuesta); // Siempre=4, Casi siempre=3, etc.
            }
        }

        return $puntaje;
    }

    // private function determinarNivelRiesgo($calificacionFinal)
    // {
    //     if ($calificacionFinal < 20) {
    //         return 'Nulo o despreciable';
    //     } elseif ($calificacionFinal >= 20 && $calificacionFinal < 45) {
    //         return 'Bajo';
    //     } elseif ($calificacionFinal >= 45 && $calificacionFinal < 70) {
    //         return 'Medio';
    //     } elseif ($calificacionFinal >= 70 && $calificacionFinal < 90) {
    //         return 'Alto';
    //     } else {
    //         return 'Muy alto';
    //     }
    // }

    private function calcularPuntuacionPorCategoria($categoria, $respuestas)
    {
        $puntaje = 0;

        // Obtener las preguntas de la categoría
        $preguntasCategoria = PreguntaBase::where('Categoria', $categoria)->pluck('id')->toArray();

        foreach ($respuestas as $respuesta) {
            // Asegúrate de que $respuesta sea un objeto y accede a su propiedad ValorRespuesta
            if ($respuesta instanceof \App\Models\Dx035\Respuesta) {
                $preguntaId = $respuesta->preguntasbases_id;
                $valorRespuesta = $respuesta->ValorRespuesta;

                // Verificar si la pregunta pertenece a la categoría
                if (in_array($preguntaId, $preguntasCategoria)) {
                    // Verificar si la pregunta tiene respuestas invertidas
                    $preguntasInvertidas = [2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 29, 54, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72];

                    if (in_array($preguntaId, $preguntasInvertidas)) {
                        // Invertir la respuesta: 0=4, 1=3, 2=2, 3=1, 4=0
                        $puntaje += (4 - $valorRespuesta);
                    } else {
                        // Respuesta normal: 0=0, 1=1, 2=2, 3=3, 4=4
                        $puntaje += $valorRespuesta;
                    }
                }
            } else {
                throw new \Exception("El objeto de respuesta no es válido.");
            }
        }

        return $puntaje;
    }

    private function determinarNivelRiesgoCategoria($puntaje, $categoria)
    {
        $rangos = [
            'Ambiente de trabajo' => ['Nulo o despreciable' => 3, 'Bajo' => 5, 'Medio' => 7, 'Alto' => 9],
            'Factores propios de la actividad' => ['Nulo o despreciable' => 10, 'Bajo' => 20, 'Medio' => 30, 'Alto' => 40],
            'Organización del tiempo de trabajo' => ['Nulo o despreciable' => 4, 'Bajo' => 6, 'Medio' => 9, 'Alto' => 12],
            'Liderazgo y relaciones en el trabajo' => ['Nulo o despreciable' => 10, 'Bajo' => 18, 'Medio' => 28, 'Alto' => 38],
        ];

        if ($puntaje < $rangos[$categoria]['Nulo o despreciable']) {
            return 'Nulo o despreciable';
        } elseif ($puntaje < $rangos[$categoria]['Bajo']) {
            return 'Bajo';
        } elseif ($puntaje < $rangos[$categoria]['Medio']) {
            return 'Medio';
        } elseif ($puntaje < $rangos[$categoria]['Alto']) {
            return 'Alto';
        } else {
            return 'Muy alto';
        }
    }

    private function calcularCuestionario1($respuestas)
    {
        // Convertir la colección de respuestas en un array
        $respuestasArray = $respuestas->toArray();

        // Extraer las secciones del cuestionario 1
        $seccionI = array_slice($respuestasArray, 0, 5); // Preguntas 1-5
        $seccionII = array_slice($respuestasArray, 5, 5); // Preguntas 6-10
        $seccionIII = array_slice($respuestasArray, 10, 5); // Preguntas 11-15
        $seccionIV = array_slice($respuestasArray, 15, 6); // Preguntas 16-21

        $requiereAtencionClinica = false;

        // Verificar Sección I
        if (in_array('SÍ', array_column($seccionI, 'ValorRespuesta'))) {
            // Verificar Sección II
            if (in_array('SÍ', array_column($seccionII, 'ValorRespuesta'))) {
                $requiereAtencionClinica = true;
            }

            // Verificar Sección III
            if (count(array_filter(array_column($seccionIII, 'ValorRespuesta'), function ($respuesta) {
                return $respuesta === 'SÍ';
            })) >= 3) {
                $requiereAtencionClinica = true;
            }

            // Verificar Sección IV
            if (count(array_filter(array_column($seccionIV, 'ValorRespuesta'), function ($respuesta) {
                return $respuesta === 'SÍ';
            })) >= 2) {
                $requiereAtencionClinica = true;
            }
        }

        return $requiereAtencionClinica;
    }

    private function calcularCuestionario2($respuestas)
    {
        $puntuaciones = [
            'Ambiente de trabajo' => 0,
            'Factores propios de la actividad' => 0,
            'Organización del tiempo de trabajo' => 0,
            'Liderazgo y relaciones en el trabajo' => 0,
        ];

        // Definir preguntas por categoría
        $categorias = [
            'Ambiente de trabajo' => [22, 23, 24, 25, 26],
            'Factores propios de la actividad' => [27, 28, 29, 30, 31],
            'Organización del tiempo de trabajo' => [32, 33, 34, 35],
            'Liderazgo y relaciones en el trabajo' => [36, 37, 38, 39, 40],
        ];

        // Calcular puntuaciones por categoría
        foreach ($categorias as $categoria => $preguntas) {
            foreach ($preguntas as $pregunta) {
                $respuesta = $respuestas->where('preguntasbases_id', $pregunta)->first();

                if ($respuesta) {
                    $puntuaciones[$categoria] += $this->calcularPuntuacionPregunta($pregunta, $respuesta->ValorRespuesta);
                }
            }
        }

        // Calcular calificación final
        $calificacionFinal = array_sum($puntuaciones);

        // Determinar nivel de riesgo
        $nivelRiesgo = $this->determinarNivelRiesgo($calificacionFinal);

        return [
            'puntuaciones' => $puntuaciones,
            'calificacionFinal' => $calificacionFinal,
            'nivelRiesgo' => $nivelRiesgo,
        ];
    }

    private function calcularCuestionario3($respuestas)
    {
        $puntuaciones = [
            'Ambiente de trabajo' => 0,
            'Factores propios de la actividad' => 0,
            'Organización del tiempo de trabajo' => 0,
            'Liderazgo y relaciones en el trabajo' => 0,
            'Entorno organizacional' => 0,
        ];

        // Definir preguntas por categoría
        $categorias = [
            'Ambiente de trabajo' => [68, 69, 70, 71, 72],
            'Factores propios de la actividad' => [73, 74, 75, 76, 77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97],
            'Organización del tiempo de trabajo' => [98, 99, 100, 101,102,103],
            'Liderazgo y relaciones en el trabajo' => [104, 105, 106, 107, 108, 109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129],
            'Entorno organizacional' => [130, 131, 132, 133, 134,135,136,137,138,139],
        ];

        // Calcular puntuaciones por categoría
        foreach ($categorias as $categoria => $preguntas) {
            foreach ($preguntas as $pregunta) {
                $respuesta = $respuestas->where('preguntasbases_id', $pregunta)->first();

                if ($respuesta) {
                    $puntuaciones[$categoria] += $this->calcularPuntuacionPregunta($pregunta, $respuesta->ValorRespuesta);
                }
            }
        }

        // Calcular calificación final
        $calificacionFinal = array_sum($puntuaciones);

        // Determinar nivel de riesgo
        $nivelRiesgo = $this->determinarNivelRiesgo($calificacionFinal);

        return [
            'puntuaciones' => $puntuaciones,
            'calificacionFinal' => $calificacionFinal,
            'nivelRiesgo' => $nivelRiesgo,
        ];
    }

    private function calcularPuntuacionPregunta($pregunta, $valorRespuesta)
    {
        // Preguntas 18-33
        if ($pregunta >= 18 && $pregunta <= 33) {
            return $valorRespuesta; // 0-Siempre, 1-Casi siempre, etc.
        }

        // Preguntas 1-17 y 34-46
        return 4 - $valorRespuesta; // 4-Siempre, 3-Casi siempre, etc.
    }

    private function determinarNivelRiesgo($calificacionFinal)
    {
        if ($calificacionFinal < 20) {
            return 'Nulo o despreciable';
        } elseif ($calificacionFinal < 45) {
            return 'Bajo';
        } elseif ($calificacionFinal < 70) {
            return 'Medio';
        } elseif ($calificacionFinal < 90) {
            return 'Alto';
        } else {
            return 'Muy alto';
        }
    }

    public function generarReporteCompletoEstadistico($encuestaId)
    {
        try {
            Log::debug('Iniciando generación de reporte completo (estadístico) para la encuesta:', ['encuestaId' => $encuestaId]);

            // Obtener la encuesta
            $encuesta = Encuesta::findOrFail($encuestaId)->toArray();
            Log::debug('Encuesta obtenida:', ['encuesta' => $encuesta]);

            // Obtener las respuestas de los trabajadores
            $respuestas = Respuesta::whereHas('datoTrabajador', function ($query) use ($encuestaId) {
                $query->where('encuestas_id', $encuestaId);
            })->get();
            Log::debug('Respuestas obtenidas:', ['count' => $respuestas->count()]);

            // Validar el tipo de cuestionario seleccionado en la encuesta
            $cuestionario = $encuesta['tipo_cuestionario']; // Asegúrate de que este campo exista en tu tabla de encuestas

            // Inicializar variables
            $requiereAtencionClinica = null;
            $resultadosCuestionario2 = null;
            $resultadosCuestionario3 = null;
            $calificacionFinal = null;
            $nivelRiesgo = null;
            $resultadosCategorias = [];

            // Realizar cálculos según el tipo de cuestionario
            if ($cuestionario === 'Cuestionario1') {
                // Solo calcular el Cuestionario 1
                $requiereAtencionClinica = $this->calcularCuestionario1($respuestas);
                Log::debug('Resultado del Cuestionario 1:', ['requiereAtencionClinica' => $requiereAtencionClinica]);
            } elseif ($cuestionario === 'Cuestionario2') {
                // Calcular el Cuestionario 2
                $resultadosCuestionario2 = $this->calcularCuestionario2($respuestas);
                Log::debug('Resultados del Cuestionario 2:', ['resultadosCuestionario2' => $resultadosCuestionario2]);

                // Calcular la calificación final y el nivel de riesgo general
                $calificacionFinal = $this->calcularCalificacionFinal($respuestas);
                $nivelRiesgo = $this->determinarNivelRiesgo($calificacionFinal);
                Log::debug('Calificación final y nivel de riesgo:', [
                    'calificacionFinal' => $calificacionFinal,
                    'nivelRiesgo' => $nivelRiesgo,
                ]);
                //dd($nivelRiesgo);

                // Calcular puntuaciones por categoría
                $categorias = ['Ambiente de trabajo', 'Factores propios de la actividad', 'Organización del tiempo de trabajo', 'Liderazgo y relaciones en el trabajo'];
                foreach ($categorias as $categoria) {
                    $puntajeCategoria = $this->calcularPuntuacionPorCategoria($categoria, $respuestas);
                    $nivelRiesgoCategoria = $this->determinarNivelRiesgoCategoria($puntajeCategoria, $categoria);
                    $resultadosCategorias[$categoria] = $nivelRiesgoCategoria;
                }
                Log::debug('Resultados por categoría:', ['resultadosCategorias' => $resultadosCategorias]);
            } elseif ($cuestionario === 'Cuestionario3') {
                // Calcular el Cuestionario 3
                $resultadosCuestionario3 = $this->calcularCuestionario3($respuestas);
                Log::debug('Resultados del Cuestionario 3:', ['resultadosCuestionario3' => $resultadosCuestionario3]);
            } else {
                throw new \Exception('Tipo de cuestionario no válido.');
            }

            // Generar las gráficas del perfil de los participantes (siempre se muestran)
            $graficas = [
                'participacion' => $this->generarGraficaParticipacion($encuesta),
                'genero' => $this->generarGraficaGenero($encuestaId),
                'edades' => $this->generarGraficaEdades($encuestaId),
                'estadoCivil' => $this->generarGraficaEstadoCivil($encuestaId),
                'tipoPuesto' => $this->generarGraficaTipoPuesto($encuestaId),
                'contratacion' => $this->generarGraficaContratacion($encuestaId),
                'tipoPersonal' => $this->generarGraficaTipoPersonal($encuestaId),
                'jornadaLaboral' => $this->generarGraficaJornadaLaboral($encuestaId),
                'rotacionTurnos' => $this->generarGraficaRotacionTurnos($encuestaId),
                'experiencia' => $this->generarGraficaExperiencia($encuestaId),
                'tiempoPuesto' => $this->generarGraficaTiempoPuesto($encuestaId),
            ];

            // Generar la gráfica horizontal de categorías (solo para Cuestionario 2)
            $graficaCategorias = null;
            if ($cuestionario === 'Cuestionario2') {
                $graficaCategorias = $this->generarGraficaCategorias($resultadosCategorias);
            }

            // Renderizar la vista del PDF
            Log::debug('Renderizando la vista del PDF...');
            $pdf = Pdf::loadView('reporte.general', [
                'encuesta' => $encuesta,
                'requiereAtencionClinica' => $requiereAtencionClinica,
                'resultadosCuestionario2' => $resultadosCuestionario2,
                'resultadosCuestionario3' => $resultadosCuestionario3,
                'calificacionFinal' => $calificacionFinal,
                'nivelRiesgo' => $nivelRiesgo,
                'resultadosCategorias' => $resultadosCategorias,
                'graficas' => $graficas,
                'graficaCategorias' => $graficaCategorias,
                'cuestionario' => $cuestionario, // Pasar el tipo de cuestionario a la vista
            ]);

            // Descargar el archivo
            Log::debug('Generando el PDF...');
            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->stream();
            }, "reporte_general_{$encuesta['id']}.pdf");
        } catch (\Exception $e) {
            Log::error('Error al generar el reporte completo (estadístico):', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Ocurrió un error al generar el reporte completo (estadístico).'], 500);
        }
    }

    private function generarGraficaCategorias($resultadosCategorias)
    {
        try {
            // Preparar datos para la gráfica
            $labels = array_keys($resultadosCategorias);
            $data = array_values($resultadosCategorias);

            // Asignar valores numéricos a los niveles de riesgo
            $niveles = [
                'Nulo o despreciable' => 20,
                'Bajo' => 40,
                'Medio' => 60,
                'Alto' => 80,
                'Muy alto' => 100
            ];

            $data = array_map(function($nivel) use ($niveles) {
                return $niveles[$nivel] ?? 0;
            }, $data);

            // Generar la gráfica horizontal
            return $this->generarGraficaBarrasHorizontales(
                $labels,
                $data,
                'categorias_riesgo',
                'Niveles de Riesgo por Categoría'
            );
        } catch (\Exception $e) {
            Log::error('Error al generar gráfica de categorías:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function generarReporte2($encuestaId)
    {
        try {
            // Disparar evento para mostrar loading INMEDIATAMENTE
            $this->dispatch('loading-started');

            if ($this->tipoReporte === 'general') {
                $response = $this->generarReporteCompletoEstadistico($encuestaId);
            } elseif ($this->tipoReporte === 'estadistico') {
                $response = $this->generarReporte($encuestaId);
            } else {
                throw new \Exception("Tipo de reporte no válido.");
            }

            // Disparar evento de éxito cuando termine
            $this->dispatch('report-completed');

            return $response;

        } catch (\Exception $e) {
            $this->dispatch('loading-failed', message: $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    // public function descargarReporte($encuestaId)
    // {
    //     $encuesta = Encuesta::findOrFail($encuestaId);
    //     $respuestas = Respuesta::whereHas('datoTrabajador', function ($query) use ($encuestaId) {
    //         $query->where('encuestas_id', $encuestaId);
    //     })->get();

    //     $html = view('reporte.general', [
    //         'encuesta' => $encuesta,
    //         'respuestas' => $respuestas,
    //     ])->render();

    //     $pdf = Pdf::loadHTML($html);
    //     return $pdf->download("reporte_general_{$encuesta->id}.pdf");
    // }

    public function render()
    {
        $user = Auth::user();
        $query = Encuesta::query();

        // Actualizar el estado de todas las encuestas
        $encuestas = Encuesta::all();
        foreach ($encuestas as $encuesta) {
            $estado = (strtotime($encuesta->FechaFinal) < strtotime(now())) ? 0 : 1; // 0 = Inactiva, 1 = Activa
            $encuesta->update(['Estado' => $estado]);
        }

        if ($user->hasRole('GoldenAdmin')) {
            // GoldenAdmin puede ver todas las encuestas
            $query->where(function($q) {
                $q->where('Empresa', 'like', '%' . $this->search . '%')
                  ->orWhere('id', 'like', '%' . $this->search . '%');
            });
        } elseif ($user->hasRole('EmpresaAdmin')) {
            // EmpresaAdmin solo puede ver las encuestas de su empresa
            if ($user->empresa) {
                $nombreEmpresa = trim($user->empresa->nombre); // Normaliza el nombre de la empresa
                $query->whereRaw('LOWER(Empresa) = ?', [strtolower($nombreEmpresa)])
                      ->where(function($q) {
                          $q->where('Empresa', 'like', '%' . $this->search . '%')
                            ->orWhere('id', 'like', '%' . $this->search . '%');
                      });
            } else {
                // Si no hay empresa asignada, no mostrar encuestas
                $query->where('id', -1); // Filtro que no devuelve resultados
            }
        } elseif ($user->hasRole('SucursalAdmin')) {
            // SucursalAdmin solo puede ver las encuestas de su sucursal
            $query->whereHas('sucursalDepartamento', function ($q) use ($user) {
                $q->where('sucursal_id', $user->sucursal_id);
            })->where(function($q) {
                $q->where('Empresa', 'like', '%' . $this->search . '%')
                  ->orWhere('id', 'like', '%' . $this->search . '%');
            });
        } elseif ($user->hasRole('Trabajador NOM035')) {
            // Trabajador NOM035 solo puede ver las encuestas de su empresa
            if ($user->empresa) {
                $nombreEmpresa = trim($user->empresa->nombre); // Normaliza el nombre de la empresa
                $query->whereRaw('LOWER(Empresa) = ?', [strtolower($nombreEmpresa)]);
            } else {
                // Si no hay empresa asignada, no mostrar encuestas
                $query->where('id', -1); // Filtro que no devuelve resultados
            }
        }

        $encuestas = $query->orderBy('id', 'asc')->paginate(10);

        foreach ($encuestas as $encuesta) {
            $this->avances[$encuesta->id] = $this->calcularAvance($encuesta);
        }

        // Vista específica para el rol Trabajador NOM035
        if ($user->hasRole('Trabajador NOM035')) {
            return view('livewire.dx035.encuestas.mostrar-encuestas-trabajador', [
                'encuesta' => $encuestas->first(), // Solo una encuesta para el trabajador
            ])->layout('layouts.dx035');
        }

        // Vista normal para otros roles
        return view('livewire.dx035.encuestas.mostrar-encuestas', [
            'encuestas' => $encuestas,
            'avances' => $this->avances,
        ])->layout('layouts.dx035');
    }
}