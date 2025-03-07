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
        // Verificar si el tipo seleccionado es 'trabajador'
        if ($this->tipo_seleccionado == 'trabajador') {
            $this->opciones = Trabajador::whereHas('usuarios', function($query) {
                $query->where('sucursal_id', $this->sucursal_id);
            })->with('usuarios')->get();
        } 
        // Verificar si el tipo seleccionado es 'becario'
        elseif ($this->tipo_seleccionado == 'becario') {
            $this->opciones = Becario::whereHas('usuarios', function($query) {
                $query->where('sucursal_id', $this->sucursal_id);
            })->with('usuarios')->get();
        } 
        // Verificar si el tipo seleccionado es 'practicante'
        elseif ($this->tipo_seleccionado == 'practicante') {
            $this->opciones = Practicante::whereHas('usuarios', function($query) {
                $query->where('sucursal_id', $this->sucursal_id);
            })->with('usuarios')->get();
        } 
        // Verificar si el tipo seleccionado es 'instructor_id'
        elseif ($this->tipo_seleccionado == 'instructor_id') {
            $this->opciones = Instructor::whereHas('usuarios', function($query) {
                $query->where('sucursal_id', $this->sucursal_id);
            })->with('usuarios')->get();
        } 
        // Si no se seleccionó ningún tipo, se retorna un arreglo vacío
        else {
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


