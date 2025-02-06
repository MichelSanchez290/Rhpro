<?php

namespace App\Livewire\PortalRh\DepartamentPuesto;

use Livewire\Component;
use App\Models\PortalRH\Puest;
use App\Models\PortalRH\Departament;
use App\Models\PortalRH\DepartamentPuest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;


class EditarDepartamentPuesto extends Component
{
    public $depaPuesto_id, $departamento_id, $puesto_id, $status;
    public $departamentos, $puestos;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $depaPuesto = DepartamentPuest::findOrFail($id);
        
        $this->depaPuesto_id = $id;
        $this->departamento_id = $depaPuesto->departamento_id;
        $this->puesto_id = $depaPuesto->puesto_id;
        $this->status = $depaPuesto->status;


        $this->departamentos = Departament::all();
        $this->puestos = Puest::all();
    }

    public function actualizarDepaPuest()
    {
        $this->validate([
            'departamento_id' => 'nullable|integer',
            'puesto_id' => 'nullable|integer',
            'status' => 'required',
        ]);

        DepartamentPuest::updateOrCreate(['id' => $this->depaPuesto_id], [            
            'departamento_id' => $this->departamento_id,
            'puesto_id' => $this->puesto_id,
            'status' => $this->status,
        ]);

        return redirect()->route('mostrardepapuesto')->with('message', 'Actualización exitosa.');
    }

    public function render()
    {
        return view('livewire.portal-rh.departament-puesto.editar-departament-puesto', [
            'departamentpuest' => DB::table('departament_puest')->get()
        ])->layout('layouts.client');
    }
}
