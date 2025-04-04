<?php

namespace App\Livewire\PortalCapacitacion\Usuarios\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\PerfilPuesto;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\PortalCapacitacion\ComparacionPuesto;

class VerMasUsuario extends Component
{




public function render()
    {
        $comparacionesPuestos = ComparacionPuesto::where('users_id', $this->users_id)->get();

        return view('livewire.portal-capacitacion.usuarios.admin-general.ver-mas-usuario', [
            'comparacionesPuestos' => $comparacionesPuestos,
        ])->layout("layouts.portal_capacitacion");
    }

  }