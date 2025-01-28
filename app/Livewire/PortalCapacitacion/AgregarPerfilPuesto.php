<?php

namespace App\Livewire\PortalCapacitacion;

use Livewire\Component;

class AgregarPerfilPuesto extends Component
{
    public function render()
    {
        return view('livewire.portal-capacitacion.agregar-perfil-puesto')->layout("layouts.portal_capacitacion");
    }
}
