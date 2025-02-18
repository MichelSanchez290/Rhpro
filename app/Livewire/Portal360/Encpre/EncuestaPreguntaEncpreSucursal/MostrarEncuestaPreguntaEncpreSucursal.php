<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreSucursal;

use Livewire\Component;

class MostrarEncuestaPreguntaEncpreSucursal extends Component
{

    public function redirigirEncpreSucursal()
    {
        return redirect()->route('agregarEncpreSucursal');
    }
    
    public function render()
    {
        return view('livewire.portal360.encpre.encuesta-pregunta-encpre-sucursal.mostrar-encuesta-pregunta-encpre-sucursal')->layout('layouts.portal360');
    }
}
