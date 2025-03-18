<?php

namespace App\Livewire\Portal360\Envaluaciones\EnvaluacionAdministrador;

use App\Models\Encuestas360\Asignacion;
use Livewire\Component;

class VerResultadosGeneralesAdminis extends Component
{

    public $asignacionId;
    public $empresaNombre;
    public $sucursalNombre;
    public $resultados = [];

    public function mount($asignacionId)
    {
        $this->asignacionId = $asignacionId;
    
        // Obtener la asignación con los datos de la empresa, sucursal y departamento
        $asignacion = Asignacion::with([
            'calificador.empresa',
            'calificado.sucursal',
            'calificado.departamento', // Cargar la relación departamento
            'respuestasUsuario.respuesta360.pregunta'
        ])->findOrFail($this->asignacionId);
    
        $this->empresaNombre = $asignacion->calificador->empresa->nombre;
        $this->sucursalNombre = $asignacion->calificado->sucursal->nombre_sucursal;
    
        // Obtener los resultados de las respuestas
        $this->resultados = $this->obtenerResultados($asignacion);
    }
    private function obtenerResultados($asignacion)
{
    $resultados = [];

    // Verificar si hay respuestas
    if ($asignacion->respuestasUsuario->isEmpty()) {
        return [
            [
                'calificador' => $asignacion->calificador->name,
                'calificado' => $asignacion->calificado->name,
                'pregunta' => 'No hay respuestas disponibles',
                'respuesta' => 'N/A',
                'puntuacion' => 0,
                'departamento' => $asignacion->calificado->departamento->nombre_departamento ?? 'No especificado',
            ]
        ];
    }

    // Si hay respuestas, procesarlas
    foreach ($asignacion->respuestasUsuario as $respuestaUsuario) {
        $resultados[] = [
            'calificador' => $asignacion->calificador->name,
            'calificado' => $asignacion->calificado->name,
            'pregunta' => $respuestaUsuario->respuesta360->pregunta->texto,
            'respuesta' => $respuestaUsuario->respuesta360->texto,
            'puntuacion' => $respuestaUsuario->respuesta360->puntuacion,
            'departamento' => $asignacion->calificado->departamento->nombre_departamento ?? 'No especificado',
        ];
    }

    // Calcular el promedio final solo si hay respuestas
    if (count($resultados) > 0) {
        $totalPuntuacion = collect($resultados)->sum('puntuacion');
        $promedioFinal = $totalPuntuacion / count($resultados);

        $resultados[] = [
            'calificador' => 'Promedio Final',
            'calificado' => '',
            'pregunta' => '',
            'respuesta' => '',
            'puntuacion' => $promedioFinal,
            'departamento' => '',
        ];
    }

    return $resultados;
}

    public function render()
    {
        return view('livewire.portal360.envaluaciones.envaluacion-administrador.ver-resultados-generales-adminis', [
            'resultados' => $this->resultados,
        ])->layout('layouts.portal360');
    }
}
