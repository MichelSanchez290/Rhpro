<?php

namespace App\Livewire\Portal360\Envaluaciones\VerResultadosPorUsuarioAdmin;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\RespuestaUsuario;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class VerResultadosPorUsuario extends Component
{

    public $asignacionId;
    public float $promedioFinal = 0;
    public string $resultadoFinal = 'Desconocido';
    public string $calificadorNombre = '';
    public string $calificadoNombre = '';
    public string $empresaNombre = '';
    public string $sucursalNombre = '';
    public string $departamentoNombre = '';
    public string $puestoNombre = '';
    public bool $realizada = false;
    public array $datosGrafica = [];

    public function mount($asignacionId)
    {
        $this->asignacionId = $asignacionId;
        $this->loadAsignacionData();
        if ($this->realizada) {
            $this->calcularPromedioFinal();
            $this->datosGrafica = $this->obtenerDatosGrafica();
        }
    }

    private function loadAsignacionData(): void
    {
        $asignacion = Asignacion::where('id', $this->asignacionId)
            ->with(['calificador.empresa', 'calificado.sucursal', 'calificado.departamento', 'calificado.puesto'])
            ->firstOrFail();

        $this->calificadorNombre = $asignacion->calificador->name;
        $this->calificadoNombre = $asignacion->calificado->name;
        $this->empresaNombre = $asignacion->calificador->empresa->nombre ?? 'No especificada';
        $this->sucursalNombre = $asignacion->calificado->sucursal->nombre_sucursal ?? 'No especificada';
        $this->departamentoNombre = $asignacion->calificado->departamento->nombre_departamento ?? 'No especificada';
        $this->puestoNombre = $asignacion->calificado->puesto->nombre_puesto ?? 'No especificado';
        $this->realizada = $asignacion->realizada;
    }

    private function calcularPromedioFinal(): void
    {
        $respuestas = RespuestaUsuario::where('asignaciones_id', $this->asignacionId)
            ->with('respuesta360')
            ->get();

        if ($respuestas->isEmpty()) {
            return;
        }

        $totalPuntuacion = $respuestas->sum(function ($respuestaUsuario) {
            return $respuestaUsuario->respuesta360->puntuacion;
        });

        $this->promedioFinal = $totalPuntuacion / $respuestas->count();
        $this->resultadoFinal = $this->obtenerColor($this->promedioFinal);
    }

    private function obtenerColor(float $promedio): string
    {
        if ($promedio >= 0 && $promedio < 1) return 'Bajo';
        elseif ($promedio >= 1 && $promedio < 2) return 'Regular';
        elseif ($promedio >= 2 && $promedio < 3) return 'Bueno';
        elseif ($promedio >= 3 && $promedio <= 4) return 'Sobresaliente';
        return 'Desconocido';
    }

    private function obtenerDatosGrafica(): array
    {
        $respuestas = RespuestaUsuario::where('asignaciones_id', $this->asignacionId)
            ->with('respuesta360.pregunta')
            ->get();

        if ($respuestas->isEmpty()) {
            return [];
        }

        $datosGrafica = [];
        foreach ($respuestas->groupBy('respuesta360.preguntas_id') as $preguntaId => $respuestasPregunta) {
            $pregunta = $respuestasPregunta->first()->respuesta360->pregunta;
            $totalPuntuacion = $respuestasPregunta->sum(function ($respuestaUsuario) {
                return $respuestaUsuario->respuesta360->puntuacion;
            });
            $promedioPuntuacion = $totalPuntuacion / $respuestasPregunta->count();

            $datosGrafica[] = [
                'pregunta' => $pregunta->texto,
                'puntuacion' => round($promedioPuntuacion, 2),
            ];
        }

        return $datosGrafica;
    }

    public function exportarPDF()
    {
        $data = [
            'promedioFinal' => $this->promedioFinal,
            'resultadoFinal' => $this->resultadoFinal,
            'calificadorNombre' => $this->calificadorNombre,
            'calificadoNombre' => $this->calificadoNombre,
            'empresaNombre' => $this->empresaNombre,
            'sucursalNombre' => $this->sucursalNombre,
            'departamentoNombre' => $this->departamentoNombre,
            'puestoNombre' => $this->puestoNombre,
            'realizada' => $this->realizada,
            'datosGrafica' => $this->datosGrafica,
        ];

        $pdf = Pdf::loadView('livewire.portal360.envaluaciones.ver-resultados-por-usuario-admin.ver-resultados-por-usuario', $data)
            ->setPaper('a4', 'portrait')
            ->setWarnings(false);

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'resultados_evaluacion_360_' . $this->calificadoNombre . '.pdf'
        );
    }

    public function render()
    {
        return view('livewire.portal360.envaluaciones.ver-resultados-por-usuario-admin.ver-resultados-por-usuario')->layout('layouts.portal360');
    }
}
