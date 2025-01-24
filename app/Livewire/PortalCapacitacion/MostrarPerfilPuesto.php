<?php

namespace App\Livewire\PortalCapacitacion;

use Livewire\Component;

class MostrarPerfilPuesto extends Component
{
    //metodo para redirreccion a una vista
    public function redirigir()
    {
        return redirect()->route('agregarPerfilPuesto');
    }


    public function render()
    {
        return view('livewire.portal-capacitacion.mostrar-perfil-puesto')->layout("layouts.portal_capacitacion");
    }
}
