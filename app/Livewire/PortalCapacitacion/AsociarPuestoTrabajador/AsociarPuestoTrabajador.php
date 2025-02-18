<?php

namespace App\Livewire\PortalCapacitacion\AsociarPuestoTrabajador;

use Livewire\Component;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Trabajador;
use App\Models\PortalRH\Becario;
use App\Models\PortalRH\Practicante;
use App\Models\PortalRH\Instructor;
use App\Models\User;

class AsociarPuestoTrabajador extends Component
{
    public $sucursales;
    public $sucursal_id;
    public $tipo_seleccionado;
    public $opciones = [];

    public function mount()
    {
        $this->sucursales = Sucursal::all();
    }

    public function updatedSucursalId()
    {
        $this->tipo_seleccionado = null;
        $this->opciones = [];
    }

    public function updatedTipoSeleccionado()
    {
        if ($this->tipo_seleccionado == 'trabajador') {
            $this->opciones = Trabajador::where('sucursal_id', $this->sucursal_id)->with('usuarios')->get();
        } elseif ($this->tipo_seleccionado == 'becario') {
            $this->opciones = Becario::where('sucursal_id', $this->sucursal_id)->with('usuarios')->get();
        } elseif ($this->tipo_seleccionado == 'practicante') {
            $this->opciones = Practicante::where('sucursal_id', $this->sucursal_id)->with('usuarios')->get();
        } elseif ($this->tipo_seleccionado == 'instructir') {
            $this->opciones = Practicante::where('sucursal_id', $this->sucursal_id)->with('usuarios')->get();
        } else {
            $this->opciones = [];
        }
    }


    public function setTipo($tipo)
    {
        $this->tipo_seleccionado = $tipo;
        $this->updatedTipoSeleccionado();
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.asociar-puesto-trabajador.asociar-puesto-trabajador')
            ->layout("layouts.portal_capacitacion");
    }
}


