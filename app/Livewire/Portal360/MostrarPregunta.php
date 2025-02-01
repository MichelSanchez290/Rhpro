<?php

namespace App\Livewire\Portal360;

use Livewire\Component;

class MostrarPregunta extends Component
{
    public function redirigirpregunta()
    {
        return redirect()->route('agregarPregunta');
    }

    
    public function render()
    {
        return view('livewire.portal360.mostrar-pregunta')->layout('layouts.portal360');
    }
}
