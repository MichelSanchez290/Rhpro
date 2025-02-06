<?php

namespace App\Livewire\PortalRh\EmpresSucursal;

use Livewire\Component;
use App\Models\PortalRH\Empres;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\EmpresSucursal;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class EditarEmpresSucursal extends Component
{
    public $empresSucursal_id, $sucursal_id, $empresa_id, $status;
    public $sucursales, $empresas;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $empresSucursal = EmpresSucursal::findOrFail($id);
        
        $this->empresSucursal_id = $id;
        $this->empresa_id = $empresSucursal->empresa_id;
        $this->sucursal_id = $empresSucursal->sucursal_id;
        $this->status = $empresSucursal->status;
        
        $this->empresas = Empres::all();
        $this->sucursales = Sucursal::all();
        
    }

    public function actualizarEmpresSucursal()
    {
        $this->validate([
            'empresa_id' => 'nullable|integer',
            'sucursal_id' => 'nullable|integer',
            'status' => 'required',
        ]);

        EmpresSucursal::updateOrCreate(['id' => $this->empresSucursal_id], [
            'empresa_id' => $this->empresa_id,
            'sucursal_id' => $this->sucursal_id,
            'status' => $this->status,
        ]);

        return redirect()->route('mostrarempressucursal')->with('message', 'Asignación actualizada correctamente.');
    }

    public function render()
    {
        return view('livewire.portal-rh.empres-sucursal.editar-empres-sucursal', [
            'empresSucursal' => DB::table('empresa_sucursal')->get()
        ])->layout('layouts.client');
    }
}
