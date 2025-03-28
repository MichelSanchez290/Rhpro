<?php

namespace App\Livewire\Portal360\Resultados\AdministradorResultados;

use App\Models\Encuestas360\Asignacion;
use App\Models\PortalRH\EmpresaSucursal;
use Livewire\Component;

class MostrarSucursalesAdministradorResultadosvs extends Component
{

    public $SucursalId;
    public $empresaSucursal;
    public $mostrarTablaUsuarios = false;
    public $mostrarTablaGenerales = false;
    public $asignacionId;
    public $calificados = [];
    public $selectedCalificadoId;

    public function mount($SucursalId)
    {
        $this->SucursalId = $SucursalId;
        $this->loadData();
    }

    public function loadData()
    {
        $this->empresaSucursal = EmpresaSucursal::with(['sucursal'])
            ->where('id', $this->SucursalId)
            ->firstOrFail();

        $this->calificados = Asignacion::with('calificado')
            ->whereHas('calificado', function ($query) {
                $query->where('sucursal_id', $this->empresaSucursal->sucursal_id);
            })
            ->where('realizada', 1)
            ->get()
            ->pluck('calificado')
            ->unique('id')
            ->values();

        $this->selectedCalificadoId = $this->calificados->first()->id ?? null;
    }

    // Método para reaccionar al cambio de selectedCalificadoId
    public function updatedSelectedCalificadoId($value)
    {
        // Ensure the results table is shown when a new user is selected
        $this->mostrarTablaGenerales = true;

        // Dispatch an event to notify the child component
        $this->dispatch('calificado-changed', $value);
    }

    public function resultadosGeneralesPorUsuario()
    {
        $this->mostrarTablaUsuarios = true;
    }

    public function resultadosGenerales()
    {
        $this->mostrarTablaGenerales = true;
    }

    public function ocultarTabla()
    {
        $this->mostrarTablaUsuarios = false;
        $this->mostrarTablaGenerales = false;
    }
    
    public function render()
    {
        return view('livewire.portal360.resultados.administrador-resultados.mostrar-sucursales-administrador-resultadosvs')->layout('layouts.portal360');
    }
}
