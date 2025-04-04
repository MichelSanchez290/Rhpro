<?php

namespace App\Livewire\PortalCapacitacion\Usuarios\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\PerfilPuesto;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\PortalCapacitacion\ComparacionPuesto;

class VerMasUsuario extends Component
{
    public $userSeleccionado;
    public $users_id;
    public $perfilPuesto;
    public $funcionesEspecificas, 
           $relacionesInternas, 
           $relacionesExternas, 
           $responsabilidadesUniversales,
           $habilidadesHumanas, 
           $habilidadesTecnicas,
           $perfilactual;
    public $comparacionesPuesto;
    public $competenciaSeleccionada;

    protected $listeners = ['capacitacionRegistrada' => 'loadComparaciones'];

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $this->userSeleccionado = User::with('perfilesPuestos')->find($id);       
        $this->perfilactual = null;

        foreach ($this->userSeleccionado->perfilesPuestos as $perfiles) {
            if ($perfiles->pivot->status === "1") {
                $this->perfilactual = $perfiles;
                break;
            }
        }
        
        if ($this->perfilactual) {
            $this->funcionesEspecificas = $this->perfilactual->funcionesEspecificas;
            $this->relacionesInternas = $this->perfilactual->relacionesInternas;
            $this->relacionesExternas = $this->perfilactual->relacionesExternas;
            $this->responsabilidadesUniversales = $this->perfilactual->responsabilidadesUniversales;
            $this->habilidadesHumanas = $this->perfilactual->habilidadesHumanas;
            $this->habilidadesTecnicas = $this->perfilactual->habilidadesTecnicas;
        } else {
            $this->funcionesEspecificas = collect();
            $this->relacionesInternas = collect();
            $this->relacionesExternas = collect();
            $this->responsabilidadesUniversales = collect();
            $this->habilidadesHumanas = collect();
            $this->habilidadesTecnicas = collect();
        }

        $this->users_id = $id;
    }

    public function render()
    {
        $comparacionesPuestos = ComparacionPuesto::where('users_id', $this->users_id)->get();

        return view('livewire.portal-capacitacion.usuarios.admin-general.ver-mas-usuario', [
            'comparacionesPuestos' => $comparacionesPuestos,
        ])->layout("layouts.portal_capacitacion");
    }

    /*public function verCapacitacionRelacionada($user_id, $competencia)
{
    $user_id = Crypt::decrypt($user_id);

    // Buscar capacitación individual
    $capacitacionInd = \App\Models\PortalCapacitacion\CapacitacionIndividual::whereHas('usuarios', function ($query) use ($user_id) {
        $query->where('users_id', $user_id);
    })->where('nombreCapacitacion', $competencia)->first();

    // Si no hay individual, buscar capacitación grupal
    if (!$capacitacionInd) {
        $capacitacionGrupal = \DB::table('grupocursos_capacitaciones')
            ->join('participante_user', 'grupocursos_capacitaciones.id', '=', 'participante_user.grupocursos_capacitaciones_id')
            ->where('participante_user.users_id', $user_id)
            ->where('grupocursos_capacitaciones.nombreCapacitacion', $competencia)
            ->select('grupocursos_capacitaciones.*')
            ->first();

        if (!$capacitacionGrupal) {
            return redirect()->back()->with('error', 'No se encontró ninguna capacitación relacionada.');
        }

        return view('livewire.portal-capacitacion.capacitaciones.cap-grupales.admin-general.ver-mas-capacitacion-grupal', [
            'capacitacion' => $capacitacionGrupal,
            'tipo' => 'grupal'
        ])->layout("layouts.portal_capacitacion");
    }

    return view('livewire.portal-capacitacion.capacitaciones.cap-individuales.admin-general.ver-capacitacion-especifica',[
        'capacitacion' => $capacitacionInd,
        'tipo' => 'individual'
    ])->layout("layouts.portal_capacitacion");
}*/

}
