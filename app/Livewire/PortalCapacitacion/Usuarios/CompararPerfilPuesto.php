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

class CompararPerfilPuesto extends Component
{
    public $puestos; // Lista de puestos disponibles
    public $detallePuesto; // Datos del puesto seleccionado
    public $perfil;

    public function mount()
    {
        $this->puestos = PerfilPuesto::select('id', 'nombre_puesto')->get();
        $this->detallePuesto = null; // Inicialmente vacío
    }

    public function updatedPerfil($puestoId)
    {
        $this->detallePuesto = PerfilPuesto::with([
            'funcionesEspecificas',
            'relacionesInternas',
            'relacionesExternas',
            'responsabilidadesUniversales',
            'habilidadesHumanas',
            'habilidadesTecnicas'
        ])->find($puestoId);
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.usuarios.comparar-perfil-puesto')
            ->layout("layouts.portal_capacitacion");
    }
}
