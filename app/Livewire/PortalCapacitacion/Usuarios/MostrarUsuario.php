<?php

namespace App\Livewire\PortalCapacitacion\Usuarios;

use Livewire\Component;
use App\Models\User;

class MostrarUsuario extends Component
{
    public $search = '';

    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')->get();
        return view('livewire.portal-capacitacion.usuarios.mostrar-usuario', compact('users'))->layout("layouts.portal_capacitacion");
    }
}
