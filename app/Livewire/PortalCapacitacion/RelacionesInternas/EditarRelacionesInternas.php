<?php

namespace App\Livewire\PortalCapacitacion\RelacionesInternas;

use Livewire\Component;
use App\Models\PortalCapacitacion\RelacionInterna;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithFileUploads;

class EditarRelacionesInternas extends Component
{
    use WithFileUploads;
    public $puesto, $razon_motivo, $frecuencia, $interna_id;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $tem = RelacionInterna::findOrFail($id);

        $this->puesto = $tem->puesto;
        $this->razon_motivo = $tem->razon_motivo;
        $this->frecuencia = $tem->frecuencia;
        $this->interna_id = $tem->id;
    }

    public function store()
    {
        $this->validate([
            'puesto' =>'required',
            'razon_motivo' => 'required',
            'frecuencia' => 'required',
        ]);

        RelacionInterna::updateOrCreate(['id' => $this->interna_id],
        [   
            'puesto' => $this->puesto,
            'razon_motivo' => $this->razon_motivo,
            'frecuencia' => $this->frecuencia,
        ]);

        $this->dispatch('alertSuccess', 'Relación Interna actualizada correctamente');
        return redirect()->route('mostrarRelacionesInternas');
    }

    public function cancelarAccion()
    {
        return redirect()->route('mostrarRelacionesInternas');
    }


    public function render()
    {
        return view('livewire.portal-capacitacion.relaciones-internas.editar-relaciones-internas')->layout("layouts.portal_capacitacion");
    }
}
