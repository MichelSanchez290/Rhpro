<?php

namespace App\Livewire\Portal360\Envaluaciones\EnvalaucionesTrabajador;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\RespuestaUsuario;
use Livewire\Component;

class EncuestaEnvaluacionPregunta extends Component
{

    public function render()
    {
        return view('livewire.portal360.envaluaciones.envalauciones-trabajador.encuesta-envaluacion-pregunta')->layout('layouts.portal360');
    }
}
