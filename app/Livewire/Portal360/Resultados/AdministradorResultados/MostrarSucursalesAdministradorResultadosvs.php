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

    public function updatedSelectedCalificadoId($value)
    {
        $this->mostrarTablaGenerales = true;
        $this->mostrarTablaUsuarios = false; // Cierra la otra tabla
        $this->dispatch('calificado-changed', $value);
    }

    public function resultadosGeneralesPorUsuario()
    {
        $this->mostrarTablaUsuarios = true;
        $this->mostrarTablaGenerales = false; // Cierra la tabla de resultados generales
    }

    public function resultadosGenerales()
    {
        $this->mostrarTablaGenerales = true;
        $this->mostrarTablaUsuarios = false; // Cierra la tabla de resultados por usuario
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
