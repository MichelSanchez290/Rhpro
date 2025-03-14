<?php

namespace App\Livewire\Portal360\Envaluaciones\ResultadosTrabajador;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\RespuestaUsuario;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class ResultadosTrabajadorMostrar extends Component
{
    public float $promedioFinal = 0;
    public string $resultadoFinal = 'Desconocido';
    public string $calificadoNombre = '';   
    public string $empresaNombre = '';
    public string $sucursalNombre = ''; // Add this new property
    public array $datosGrafica = []; // Add this property
    
    public function mount()
    {
        $this->calcularPromedioFinal();
        $this->obtenerDatosCalificado();
        $this->datosGrafica = $this->obtenerDatosGrafica();
    }
    
    private function calcularPromedioFinal(): void
    {
        $userId = auth()->id();
        
        // Consulta para obtener todas las asignaciones completadas para el usuario
        $asignaciones = DB::table('asignaciones')
            ->where('calificado_id', $userId)
            ->where('realizada', 1)
            ->pluck('id');
            
        if ($asignaciones->isEmpty()) {
            return;
        }
        
        // Obtener todas las respuestas para esas asignaciones
        $respuestas = RespuestaUsuario::whereIn('asignaciones_id', $asignaciones)
            ->with('respuesta360')
            ->get();
            
        if ($respuestas->isEmpty()) {
            return;
        }
        
        // Calcular el promedio final
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

    private function obtenerDatosCalificado(): void
    {
        $userId = auth()->id();
        
        // Obtener la asignación más reciente para el usuario
        $asignacion = Asignacion::where('calificado_id', $userId)
            ->with(['calificado', 'calificador.empresa', 'calificador.sucursal']) // Add sucursal relationship
            ->latest()
            ->first();
            
        if ($asignacion) {
            $this->calificadoNombre = $asignacion->calificado->name;
            $this->empresaNombre = $asignacion->calificador->empresa->nombre;
            $this->sucursalNombre = $asignacion->calificador->sucursal->nombre_sucursal ?? 'No especificada'; // Add branch name
        }
    }

    private function obtenerDatosGrafica(): array
    {
        $userId = auth()->id();

        $asignaciones = DB::table('asignaciones')
            ->where('calificado_id', $userId)
            ->where('realizada', 1)
            ->pluck('id');

        if ($asignaciones->isEmpty()) {
            return [];
        }

        $respuestas = RespuestaUsuario::whereIn('asignaciones_id', $asignaciones)
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
    // Pasar todas las propiedades necesarias como datos a la vista
    $data = [
        'promedioFinal' => $this->promedioFinal,
        'resultadoFinal' => $this->resultadoFinal,
        'calificadoNombre' => $this->calificadoNombre,
        'empresaNombre' => $this->empresaNombre,
        'sucursalNombre' => $this->sucursalNombre,
        'datosGrafica' => $this->datosGrafica,
    ];

    // Cargar la vista con los datos
    $pdf = Pdf::loadView('livewire.portal360.envaluaciones.resultados-trabajador.resultados-trabajador-mostrar', $data)
        ->setPaper('a4', 'portrait')
        ->setWarnings(false);
    
    // Descargar el PDF
    return response()->streamDownload(
        fn() => print($pdf->output()),
        'resultados_evaluacion_360_' . $this->calificadoNombre . '.pdf'
    );
}
    public function render()
    {
        return view('livewire.portal360.envaluaciones.resultados-trabajador.resultados-trabajador-mostrar')->layout('layouts.portal360');
    }
}
