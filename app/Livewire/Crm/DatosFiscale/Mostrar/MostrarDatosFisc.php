<?php

namespace App\Livewire\Crm\DatosFiscale\Mostrar;

use Livewire\Component;

class MostrarDatosFisc extends Component
{
    public function render()
    {
        return view('livewire.crm.datos-fiscale.mostrar.mostrar-datos-fisc')->layout('layouts.crm');
    }
}