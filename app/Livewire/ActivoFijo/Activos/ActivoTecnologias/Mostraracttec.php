<?php

namespace App\Livewire\ActivoFijo\Activos\ActivoTecnologias;

use Livewire\Component;

class Mostraracttec extends Component
{
    public function redirigir()
    {
        return redirect()->route('agregaracttec');
    }
    public function render()
    {
        return view('livewire.activo-fijo.activos.activo-tecnologias.mostraracttec')->layout('layouts.navactivos');
    }
}
