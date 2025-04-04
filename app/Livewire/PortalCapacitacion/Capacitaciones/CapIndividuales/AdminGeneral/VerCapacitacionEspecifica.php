<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapIndividuales\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\CapacitacionIndividual;
use Illuminate\Support\Facades\Crypt;

class VerCapacitacionEspecifica extends Component
{
    public $capacitacion;

    public function mount($user_id, $competencia)
    {
        $user_id = Crypt::decrypt($user_id);

        $this->capacitacion = CapacitacionIndividual::where('nombreCapacitacion', $competencia)
            ->whereHas('usuarios', function ($query) use ($user_id) {
                $query->where('users_id', $user_id);
            })->first();

        if (!$this->capacitacion) {
            session()->flash('error', 'No se encontró una capacitación para esta competencia.');
        }
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.capacitaciones.cap-individuales.admin-general.ver-capacitacion-especifica')->layout("layouts.portal_capacitacion");
    }   
}
