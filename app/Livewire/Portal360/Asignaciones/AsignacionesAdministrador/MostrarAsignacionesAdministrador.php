<?php

namespace App\Livewire\Portal360\Asignaciones\AsignacionesAdministrador;

use Livewire\Component;

class MostrarAsignacionesAdministrador extends Component
{

    public function redirigirAsignacionAdministrador()
    {
        return redirect()->route('agregarAsignacionAdministrador');
    }


    public function render()
    {
        return view('livewire.portal360.asignaciones.asignaciones-administrador.mostrar-asignaciones-administrador')->layout('layouts.portal360');
    }
}
