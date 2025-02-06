<?php

namespace App\Livewire\PortalRh\DepartamentPuesto;

use Livewire\Component;
use App\Models\PortalRH\Departament;
use App\Models\PortalRH\Puest;
use App\Models\PortalRH\DepartamentPuest;
use Illuminate\Support\Facades\DB;

class AgregarDepartamentPuesto extends Component
{
    public $depaPuest = [];
    public $departamentos, $puestos;


    public function mount()
    { 
        $this->departamentos = Departament::all();
        $this->puestos = Puest::all();
    }

    // REGLAS DE VALIDACIÓN
    protected $rules = [
        'depaPuest.departamento_id' => 'required',
        'depaPuest.puesto_id' => 'required',
        'depaPuest.status' => 'required',
        
    ];

    // MENSAJES DE VALIDACIÓN
    protected $messages = [
        'depaPuest.departamento_id' => 'El departamento es requerido',
        'depaPuest.puesto_id' => 'El puesto es requerido',
        'depaPuest.status.required' => 'El status es requerido',
    ];

    public function saveDepaPuest()
    {
        $this->validate();

        $AgregarDepaPuesto = new DepartamentPuest($this->depaPuest);
        $AgregarDepaPuesto->save();

        $this->depaPuest = [];
        //$this->emit('showAnimatedToast', 'Sucursal guardada correctamente');
        return redirect()->route('mostrardepapuesto');
    }

    public function redirigirDepaPuest()
    {
        return redirect()->route('mostrardepapuesto');
    }

    public function render()
    {
        return view('livewire.portal-rh.departament-puesto.agregar-departament-puesto', [
            'departamentpuest' => DB::table('departament_puest')->get()
        ])->layout('layouts.client');
    }
}
