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
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class VerMasUsuario extends Component
{
    public $userSeleccionado;
    public $users_id;

    public function comparar()
    {
        return redirect()->route('compararPerfilPuesto');
    }
    
    public function mount($id){
        $id = Crypt::decrypt($id);
        $this->userSeleccionado = User::with('perfilesPuestos')->find($id);
        $this->users_id = $id;
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.usuarios.ver-mas-usuario')->layout("layouts.portal_capacitacion");
    }
    
}
 