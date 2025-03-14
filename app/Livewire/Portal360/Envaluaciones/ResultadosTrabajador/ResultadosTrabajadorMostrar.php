<?php

namespace App\Livewire\Portal360\Envaluaciones\ResultadosTrabajador;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\RespuestaUsuario;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ResultadosTrabajadorMostrar extends Component
{
    public float $promedioFinal = 0;
    public string $resultadoFinal = 'Desconocido';
    public string $calificadoNombre = '';
    public string $empresaNombre = '';
    
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
            ->with(['calificado', 'calificador.empresa'])
            ->latest()
            ->first();
            
        if ($asignacion) {
            $this->calificadoNombre = $asignacion->calificado->name;
            $this->empresaNombre = $asignacion->calificador->empresa->nombre;
        }
    }

    private function obtenerDatosGrafica(): array
{
    $userId = auth()->id();

    // Obtener todas las asignaciones completadas para el usuario
    $asignaciones = DB::table('asignaciones')
        ->where('calificado_id', $userId)
        ->where('realizada', 1)
        ->pluck('id');

    if ($asignaciones->isEmpty()) {
        return [];
    }

    // Obtener todas las respuestas para esas asignaciones
    $respuestas = RespuestaUsuario::whereIn('asignaciones_id', $asignaciones)
        ->with('respuesta360.pregunta')
        ->get();

    if ($respuestas->isEmpty()) {
        return [];
    }

    // Agrupar las respuestas por pregunta y calcular el promedio de puntuación
    $datosGrafica = [];
    foreach ($respuestas->groupBy('respuesta360.preguntas_id') as $preguntaId => $respuestasPregunta) {
        $pregunta = $respuestasPregunta->first()->respuesta360->pregunta;
        $totalPuntuacion = $respuestasPregunta->sum(function ($respuestaUsuario) {
            return $respuestaUsuario->respuesta360->puntuacion;
        });
        $promedioPuntuacion = $totalPuntuacion / $respuestasPregunta->count();

        $datosGrafica[] = [
            'pregunta' => $pregunta->texto,
            'puntuacion' => $promedioPuntuacion,
        ];
    }

    return $datosGrafica;
}
    public function render()
    {
        return view('livewire.portal360.envaluaciones.resultados-trabajador.resultados-trabajador-mostrar')->layout('layouts.portal360');
    }
}
