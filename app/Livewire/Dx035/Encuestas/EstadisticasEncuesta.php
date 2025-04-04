<?php

namespace App\Livewire\Dx035\Encuestas;

use Livewire\Component;
use App\Models\Dx035\Encuesta;
use App\Models\Dx035\DatoTrabajador;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\SucursalDepartamento;

class EstadisticasEncuesta extends Component
{
    public $encuesta;
    public $departamentos;
    public $usuarios;

    public function mount($id)
    {
        // Obtener la encuesta por ID
        $this->encuesta = Encuesta::findOrFail($id);

        // Obtener los departamentos relacionados con la encuesta
        $sucursalDepartamentoId = $this->encuesta->sucursal_departament_id;

        // Obtener el departamento asociado a la encuesta
        $sucursalDepartamento = SucursalDepartamento::find($sucursalDepartamentoId);

        if ($sucursalDepartamento) {
            $this->departamentos = Departamento::where('id', $sucursalDepartamento->departamento_id)->get();
        } else {
            $this->departamentos = collect(); 
        }

        // Obtener los usuarios que han respondido la encuesta
        $this->usuarios = DatoTrabajador::where('encuestas_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.dx035.encuestas.estadisticas-encuesta')
            ->layout('layouts.dx035');
    }
}
