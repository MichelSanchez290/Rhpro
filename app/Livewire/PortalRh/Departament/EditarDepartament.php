<?php

namespace App\Livewire\PortalRh\Departament;

use Livewire\Component;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use Illuminate\Support\Facades\Crypt;

class EditarDepartament extends Component
{
    public $sucursales = [];
    public $departamento_id, $nombre_departamento;
    public $empresas, $empresa, $sucursal;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $departamento = Departamento::findOrFail($id);
        $this->empresas = Empresa::all();

        $this->departamento_id = $id;
        $this->nombre_departamento = $departamento->nombre_departamento;

        // Obtener la sucursal asociada (vía la relación pivote de Departamento y Sucursal)
        $suc = $departamento->sucursales()->first();
        $this->sucursal = $suc->id ?? null;

        // Si existe la sucursal, obtener la empresa asociada a esa sucursal
        if ($suc) {
            $empresaAsociada = $suc->empresas()->first();
            $this->empresa = $empresaAsociada->id ?? null;
        }

        // Cargar las sucursales y empresas filtradas según la selección
        $this->updatedEmpresa();
    }

    public function updatedEmpresa()
    {
        $this->sucursales = Empresa::with('sucursales')->where('id', $this->empresa)->get();
    }

    public function actualizarDepartamento()
    {
        $this->validate([
            'empresa' => 'required',
            'sucursal' => 'required',
            'nombre_departamento' => 'required|string|max:255',
        ]);

        $departamento = Departamento::findOrFail($this->departamento_id);
        $departamento->update([
            'nombre_departamento' => $this->nombre_departamento,
        ]);

        // Actualizar relación en la tabla pivote 
        $departamento->sucursales()->sync([
            $this->sucursal => [
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        session()->flash('message', 'Departamento Actualizado.');
    }

    public function render()
    {
        return view('livewire.portal-rh.departament.editar-departament')->layout('layouts.client');
    }
}