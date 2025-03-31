<?php

namespace App\Livewire\Portal360\Envaluaciones\EnvaluacionAdministrador;

use App\Models\Encuestas360\Asignacion;
use Livewire\Component;
use Livewire\WithPagination;

class VerResultadosGeneralesAdminis extends Component
{


    public $sucursalId;
    public $calificadoId;
    public $empresaNombre;
    public $sucursalNombre;
    public $calificadoNombre;
    public $resultados = [];
    public $encuestaCompleta = false;

    protected $listeners = ['calificado-changed' => 'updateResults'];

public function mount($sucursalId, $calificadoId)
{
    $this->sucursalId = $sucursalId;
    $this->calificadoId = $calificadoId;
    
    $empresaSucursal = EmpresaSucursal::with(['empresa', 'sucursal'])
        ->where('id', $this->sucursalId)
        ->firstOrFail();
        
    $this->empresaNombre = $empresaSucursal->empresa->nombre ?? 'No especificado';
    $this->sucursalNombre = $empresaSucursal->sucursal->nombre_sucursal ?? 'No especificado';
    
    $this->updateResults();
}

    // Método para reaccionar a cambios en calificadoId
    public function updatedCalificadoId($value)
    {
        $this->calificadoId = $value;
        $this->updateResults();
    }

    public function updateResults()
    {
        if (!$this->calificadoId) {
            $this->resultados = [];
            $this->calificadoNombre = 'No especificado';
            return;
        }

        $asignacion = Asignacion::where('calificado_id', $this->calificadoId)->first();
        $this->calificadoNombre = $asignacion ? $asignacion->calificado->name : 'No especificado';

        $asignaciones = Asignacion::with([
            'calificador.empresa',
            'calificado.sucursal',
            'calificado.departamento', // Cargar la relación departamento
            'respuestasUsuario.respuesta360.pregunta'
        ])
        ->where('calificado_id', $this->calificadoId)
        ->where('realizada', 1)
        ->get();
        
        $this->resultados = $this->obtenerResultadosPorSucursal($asignaciones);

        $this->encuestaCompleta = !empty($this->resultados) && !array_key_exists('Sin datos', $this->resultados);
        
        if (!$this->encuestaCompleta) {
            $this->dispatch('toastr-warning', message: 'Todavía no hay resultados disponibles para este usuario.');
        }
    }
    

    private function obtenerResultadosPorSucursal($asignaciones)
    {
        $resultadosPorPregunta = [];

        if ($asignaciones->isEmpty()) {
            return [
                'Sin datos' => [
                    [
                        'nombre' => 'N/A',
                        'departamento' => 'N/A',
                        'resultado' => 0
                    ]
                ]
            ];
        }

        // Primero recolectamos todas las autoevaluaciones
        $autoevaluaciones = [];
        foreach ($asignaciones as $asignacion) {
            if ($asignacion->calificador_id === $asignacion->calificado_id) {
                foreach ($asignacion->respuestasUsuario as $respuestaUsuario) {
                    $preguntaId = $respuestaUsuario->respuesta360->preguntas_id;
                    $colaboradorId = $asignacion->calificador_id;

                    if (!isset($autoevaluaciones[$colaboradorId])) {
                        $autoevaluaciones[$colaboradorId] = [];
                    }

                    $autoevaluaciones[$colaboradorId][$preguntaId] = $respuestaUsuario->respuesta360->puntuacion;
                }
            }
        }

        // Lógica para agrupar preguntas y calcular promedios de evaluaciones de otros
        $preguntasAgrupadas = [];
        foreach ($asignaciones as $asignacion) {
            $esAutoevaluacion = $asignacion->calificador_id === $asignacion->calificado_id;
            $calificadorId = $asignacion->calificador_id;

            // Solo procesamos evaluaciones de otros (no autoevaluaciones)
            if ($esAutoevaluacion) {
                continue;
            }

            if (!isset($preguntasAgrupadas[$calificadorId])) {
                $preguntasAgrupadas[$calificadorId] = [
                    'nombre' => $asignacion->calificador->name,
                    'departamento' => $asignacion->calificador->departamento->nombre_departamento ?? 'No especificado',
                    'preguntas' => []
                ];
            }

            foreach ($asignacion->respuestasUsuario as $respuestaUsuario) {
                $preguntaId = $respuestaUsuario->respuesta360->preguntas_id;
                $preguntaTexto = $respuestaUsuario->respuesta360->pregunta->texto;

                if (!isset($preguntasAgrupadas[$calificadorId]['preguntas'][$preguntaId])) {
                    $preguntasAgrupadas[$calificadorId]['preguntas'][$preguntaId] = [
                        'texto' => $preguntaTexto,
                        'sumaOtros' => 0,
                        'conteoOtros' => 0
                    ];
                }

                $puntuacion = $respuestaUsuario->respuesta360->puntuacion;
                $preguntasAgrupadas[$calificadorId]['preguntas'][$preguntaId]['sumaOtros'] += $puntuacion;
                $preguntasAgrupadas[$calificadorId]['preguntas'][$preguntaId]['conteoOtros']++;
            }
        }

        // Combinamos autoevaluaciones con evaluaciones de otros
        $resultadosPorPreguntaTexto = [];
        foreach ($preguntasAgrupadas as $calificadorId => $data) {
            foreach ($data['preguntas'] as $preguntaId => $preguntaData) {
                $preguntaTexto = $preguntaData['texto'];

                // Obtenemos autoevaluación si existe
                $autoevaluacion = $autoevaluaciones[$calificadorId][$preguntaId] ?? null;

                // Calculamos promedio de otros
                $promedioOtros = $preguntaData['conteoOtros'] > 0 ?
                    $preguntaData['sumaOtros'] / $preguntaData['conteoOtros'] : null;

                // Determinamos el resultado final
                $resultadoFinal = 0;
                if ($autoevaluacion !== null && $promedioOtros !== null) {
                    // Si tenemos ambos, usamos promedio ponderado (50% auto, 50% otros)
                    $resultadoFinal = ($autoevaluacion * 0.5) + ($promedioOtros * 0.5);
                } elseif ($autoevaluacion !== null) {
                    // Solo autoevaluación
                    $resultadoFinal = $autoevaluacion;
                } elseif ($promedioOtros !== null) {
                    // Solo evaluaciones de otros
                    $resultadoFinal = $promedioOtros;
                }

                if (!isset($resultadosPorPreguntaTexto[$preguntaTexto])) {
                    $resultadosPorPreguntaTexto[$preguntaTexto] = [];
                }

                $resultadosPorPreguntaTexto[$preguntaTexto][] = [
                    'nombre' => $data['nombre'],
                    'departamento' => $data['departamento'],
                    'resultado' => round($resultadoFinal, 1)
                ];
            }
        }

        // Aseguramos que aparezcan también colaboradores que solo se autoevaluaron
        foreach ($autoevaluaciones as $colaboradorId => $preguntas) {
            // Buscamos los datos del colaborador
            $colaboradorData = null;
            foreach ($asignaciones as $asignacion) {
                if ($asignacion->calificador_id == $colaboradorId) {
                    $colaboradorData = [
                        'nombre' => $asignacion->calificador->name,
                        'departamento' => $asignacion->calificador->departamento->nombre_departamento ?? 'No especificado'
                    ];
                    break;
                }
            }

            if (!$colaboradorData) continue;

            // Agregamos sus resultados si no estaban ya
            foreach ($preguntas as $preguntaId => $puntuacion) {
                $preguntaTexto = null;
                // Buscamos el texto de la pregunta
                foreach ($asignaciones as $asignacion) {
                    foreach ($asignacion->respuestasUsuario as $respuestaUsuario) {
                        if ($respuestaUsuario->respuesta360->preguntas_id == $preguntaId) {
                            $preguntaTexto = $respuestaUsuario->respuesta360->pregunta->texto;
                            break 2;
                        }
                    }
                }

                if (!$preguntaTexto) continue;

                // Verificamos si ya existe un resultado para este colaborador en esta pregunta
                $existe = false;
                if (isset($resultadosPorPreguntaTexto[$preguntaTexto])) {
                    foreach ($resultadosPorPreguntaTexto[$preguntaTexto] as $resultado) {
                        if ($resultado['nombre'] === $colaboradorData['nombre']) {
                            $existe = true;
                            break;
                        }
                    }
                }

                if (!$existe) {
                    if (!isset($resultadosPorPreguntaTexto[$preguntaTexto])) {
                        $resultadosPorPreguntaTexto[$preguntaTexto] = [];
                    }

                    $resultadosPorPreguntaTexto[$preguntaTexto][] = [
                        'nombre' => $colaboradorData['nombre'],
                        'departamento' => $colaboradorData['departamento'],
                        'resultado' => round($puntuacion, 1)
                    ];
                }
            }
        }

        // Calculamos promedios finales
        foreach ($resultadosPorPreguntaTexto as $preguntaTexto => $resultados) {
            $sumaPromedio = 0;
            $conteo = count($resultados);

            foreach ($resultados as $resultado) {
                $sumaPromedio += $resultado['resultado'];
            }

            $resultadosPorPreguntaTexto[$preguntaTexto][] = [
                'nombre' => 'Promedio final',
                'departamento' => '',
                'resultado' => $conteo > 0 ? round($sumaPromedio / $conteo, 1) : 0
            ];
        }

        return $resultadosPorPreguntaTexto;
    }

    public function render()
    {
        return view('livewire.portal360.envaluaciones.envaluacion-administrador.ver-resultados-generales-adminis', [
            'resultados' => $this->resultados,
            'encuestaCompleta' => $this->encuestaCompleta,
            'calificadoNombre' => $this->calificadoNombre,
        ])->layout('layouts.portal360');
    }
}
