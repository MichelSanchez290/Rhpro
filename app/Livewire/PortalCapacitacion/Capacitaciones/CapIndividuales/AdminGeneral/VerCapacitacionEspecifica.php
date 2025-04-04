<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapIndividuales\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\CapacitacionIndividual;
use Illuminate\Support\Facades\Crypt;
use App\Models\PortalCapacitacion\GrupocursoCapacitacion;

class VerCapacitacionEspecifica extends Component
{
    public $capacitacion;
    public $capacitacionGrupal;
    
    public function mount($user_id, $competencia)
    {
        $user_id = Crypt::decrypt($user_id);
    
        // Capacitación Individual
        $this->capacitacion = CapacitacionIndividual::whereHas('usuarios', function ($query) use ($user_id) {
            $query->where('users_id', $user_id);
        })->where('nombreCapacitacion', $competencia)->first();
    
        // Capacitación Grupal
        $this->capacitacionGrupal = GrupocursoCapacitacion::whereHas('usuarios', function ($query) use ($user_id) {
            $query->where('users.id', $user_id);
        })->where('nombreCapacitacion', $competencia)->first();
        
    }
    

    public function render()
    {
        return view('livewire.portal-capacitacion.capacitaciones.cap-individuales.admin-general.ver-capacitacion-especifica', [
            'capacitacion' => $this->capacitacion,
        ])->layout("layouts.portal_capacitacion");
    }
}
