<?php

namespace App\Livewire\PortalRh\SucursalDepa;

use Livewire\Component;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departament;
use App\Models\PortalRH\SucursalDepartament;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\DB;

class EditarSucursalDepa extends Component
{
    public $sucursalDepa_id, $sucursal_id, $departamento_id;
    public $sucursales, $departamentos;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $sucursalDepa = SucursalDepartament::findOrFail($id);
        
        $this->sucursalDepa_id = $id;
        $this->sucursal_id = $sucursalDepa->sucursal_id;
        $this->departamento_id = $sucursalDepa->departamento_id;

        $this->sucursales = Sucursal::all();
        $this->departamentos = Departament::all();
    }

    public function actualizarSucursalDepa()
    {
        $this->validate([
            'sucursal_id' => 'nullable|integer',
            'departamento_id' => 'nullable|integer',
        ]);

        SucursalDepartament::updateOrCreate(['id' => $this->sucursalDepa_id], [
            'sucursal_id' => $this->sucursal_id,
            'departamento_id' => $this->departamento_id,
        ]);

        return redirect()->route('mostrarsucursaldepa')->with('message', 'Asignación actualizada correctamente.');
    }

    public function render()
    {
        return view('livewire.portal-rh.sucursal-depa.editar-sucursal-depa', [
            'sucursaldepartament' => DB::table('sucursal_departament')->get()
        ])->layout('layouts.client');
    }
}
