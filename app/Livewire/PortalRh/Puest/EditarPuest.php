<?php

namespace App\Livewire\PortalRh\Puest;

use Livewire\Component;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use Illuminate\Support\Facades\Crypt;

class EditarPuest extends Component
{
    public $sucursales = [], $departamentos=[];

    public $puest_id, $nombre_puesto, 
    $empresas, $empresa, $sucursal, $departamento;
    

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $puest = Puesto::findOrFail($id);
        $this->empresas = Empresa::all();

        $this->puest_id = $id;
        $this->nombre_puesto = $puest->nombre_puesto;

        // Obtener el departamento asociado (vía la relación pivote de Puesto y Departamento)
        $dep = $puest->departamentos()->first();
        $this->departamento = $dep->id ?? null;

        // Si existe el departamento, obtener la sucursal asociada a ese departamento
        if ($dep) {
            // Suponiendo que en Departamento tienes la relación "sucursales"
            $sucursalAsociada = $dep->sucursales()->first();
            $this->sucursal = $sucursalAsociada->id ?? null;

            // Y si se encontró una sucursal, obtener la empresa asociada a esa sucursal
            if ($sucursalAsociada) {
                // Suponiendo que en Sucursal tienes la relación "empresas"
                $empresaAsociada = $sucursalAsociada->empresas()->first();
                $this->empresa = $empresaAsociada->id ?? null;
            }
        }

        // Cargar las sucursales y departamentos filtrados según la empresa y sucursal seleccionadas
        $this->updatedEmpresa();
        $this->updatedSucursal();
    }


    public function updatedEmpresa()
    {
        $this->sucursales = Empresa::with('sucursales')->where('id', $this->empresa)->get();
    }

    public function updatedSucursal()
    {
        $this->departamentos = Sucursal::with('departamentos')->where('id', $this->sucursal)->get();
    }

    public function actualizarPuesto()
    {
        $this->validate([
            'empresa' => 'required',
            'sucursal' => 'required',
            'departamento' => 'required',
            'nombre_puesto' => 'required',
            'departamento' => 'required|exists:departamentos,id',
        ]);

        $puest = Puesto::findOrFail($this->puest_id);
        $puest->update([
            'nombre_puesto' => $this->nombre_puesto,
        ]);

        // Actualizar relación en la tabla pivote 
        $puest->departamentos()->sync([
            $this->departamento => [
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        session()->flash('message', 'Puesto Actualizado.');
    }


    public function render()
    {
        return view('livewire.portal-rh.puest.editar-puest')->layout('layouts.client');
    }
}
