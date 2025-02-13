<?php

namespace App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminEmpresa;

use Livewire\Component;

class EditarTecnologia extends Component
{
    public function render()
    {
        return view('livewire.activo-fijo.activos.activo-tecnologias.admin-empresa.editar-tecnologia')->layout('layouts.navactivos');
    }
}
