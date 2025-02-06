<?php

namespace App\Livewire\Portal360;

use App\Models\PortalRH\Empres;
use Livewire\Component;

class AgregarEmpresa extends Component
{
  
    public function render()
    {
        return view('livewire.portal360.agregar-empresa')->layout('layouts.portal360');
    }
}
