<?php

namespace App\Livewire\Portal360;

use Livewire\Component;

class MostrarAsignacion extends Component
{
    public function redirigirAsignacion()
    {
        return redirect()->route('agregarAsignacion');
    }

    public function render()
    {
        return view('livewire.portal360.mostrar-asignacion')->layout('layouts.portal360');
    }
}
