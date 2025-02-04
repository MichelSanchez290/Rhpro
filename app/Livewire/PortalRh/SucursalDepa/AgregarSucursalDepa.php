<?php

namespace App\Livewire\PortalRh\SucursalDepa;

use Livewire\Component;
use App\Models\PortalRH\Departament;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\SucursalDepartament;
use Illuminate\Support\Facades\DB;

class AgregarSucursalDepa extends Component
{
    public $sucursaldepa = [];
    public $sucursales, $departamentos;


    public function mount()
    {
        $this->sucursales = Sucursal::all();
        $this->departamentos = Departament::all();
    }

    // REGLAS DE VALIDACIÓN
    protected $rules = [
        'sucursaldepa.sucursal_id' => 'required',
        'sucursaldepa.departamento_id' => 'required',
        'sucursaldepa.status' => 'required',
    ];

    // MENSAJES DE VALIDACIÓN
    protected $messages = [
        'sucursaldepa.sucursal_id' => 'La sucursal es requerida',
        'sucursaldepa.departamento_id' => 'El departamento es requerido',
        'sucursaldepa.status.required' => 'El status es requerido',
    ];

    public function saveSucursalDepa()
    {
        $this->validate();

        $AgregarSucursalDepa = new SucursalDepartament($this->sucursaldepa);
        $AgregarSucursalDepa->save();

        $this->sucursaldepa = [];
        //$this->emit('showAnimatedToast', 'Sucursal guardada correctamente');
        return redirect()->route('mostrarsucursaldepa');
    }

    public function redirigirSucDepa()
    {
        return redirect()->route('mostrarsucursaldepa');
    }

    public function render()
    {
        return view('livewire.portal-rh.sucursal-depa.agregar-sucursal-depa', [
            'sucursaldepartament' => DB::table('sucursal_departament')->get()
        ])->layout('layouts.client');
    }
}
