<?php

namespace App\Livewire\Portal360\Resultados\JefeResultados;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\Encuesta360;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MostrarResultadosjefe extends Component
{

  

    public $asignaciones;
    public $encuestas;

    public function mount()
    {
        // Obtener las encuestas de la empresa del usuario autenticado
        $this->encuestas = Encuesta360::where('empresa_id', Auth::user()->empresa_id)
            ->orderBy('nombre')
            ->get(['id', 'nombre']);

        // Cargar asignaciones con relación "Jefe" o "Autoevaluación" de la empresa y sucursal
        $this->asignaciones = Asignacion::whereHas('calificado', function ($query) {
            $query->where('empresa_id', Auth::user()->empresa_id)
                ->where('sucursal_id', Auth::user()->sucursal_id);
        })
            ->whereHas('relacion', function ($query) {
                $query->whereIn('nombre', ['Jefe']);
            })
            ->with(['calificador', 'calificado', 'relacion', 'encuesta'])
            ->get();
    }
    public function render()
    {
        return view('livewire.portal360.resultados.jefe-resultados.mostrar-resultadosjefe')->layout('layouts.portal360');
    }
}
