<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapGrupales\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\GrupocursoCapacitacion;
use Illuminate\Support\Facades\Crypt;

class VerCapacitacionGrupal extends Component
{
    public $capacitacion;

    public function mount($user_id, $competencia)
    {
        $user_id = Crypt::decrypt($user_id);

        $this->capacitacion = GrupocursoCapacitacion::whereHas('usuarios', function ($query) use ($user_id) {
            $query->where('users_id', $user_id);
        })->where('nombreCapacitacion', $competencia)->first();
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.capacitaciones.cap-grupales.admin-general.ver-mas-capacitacion-grupal')->layout("layouts.portal_capacitacion");
    }
}
