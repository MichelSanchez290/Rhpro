<?php

namespace App\Livewire\PortalCapacitacion\Usuarios;

use Livewire\Component;
use App\Models\PortalCapacitacion\PerfilPuesto;

class CompararPerfilPuesto extends Component
{
    public $puestos; // Lista de puestos disponibles
    public $puestoSeleccionado; // ID del puesto seleccionado
    public $detallePuesto; // Datos del puesto seleccionado
    public $perfil;

    public function mount()
    {
        $this->puestos = PerfilPuesto::select('id', 'nombre_puesto')->get();
        $this->detallePuesto = null; // Inicialmente vacío
    }

    public function guardar(){
        
    }

    /*public function updatedPuestoSeleccionado($puestoId)
    {
        $this->detallePuesto = PerfilPuesto::find($puestoId);
    }

    public function updatedPerfil()
    {
        dd();
        $this->detallePuesto = PerfilPuesto::find($perfil_puesto_id);
    }*/

    

    public function render()
    {
        return view('livewire.portal-capacitacion.usuarios.comparar-perfil-puesto')
            ->layout("layouts.portal_capacitacion");
    }
}
