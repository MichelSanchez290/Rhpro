<?php

namespace App\Livewire\PortalCapacitacion\Usuarios;

use Livewire\Component;
use App\Models\PortalCapacitacion\PerfilPuesto;
use App\Models\PortalCapacitacion\FuncionEspecifica;
use App\Models\PortalCapacitacion\RelacionInterna;
use App\Models\PortalCapacitacion\RelacionExterna;
use App\Models\PortalCapacitacion\ResponsabilidadUniversal;
use App\Models\PortalCapacitacion\FormacionHabilidadHumana;
use App\Models\PortalCapacitacion\FormacionHabilidadTecnica;
use Illuminate\Support\Facades\Crypt;

class VerMasUsuario extends Component
{
    public $puestoSeleccionado;
    public $perfil_puesto_id;

   
    public function mount($id){
        $id = Crypt::decrypt($id);
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.usuarios.ver-mas-usuario')->layout("layouts.portal_capacitacion");
    }
    
}
 