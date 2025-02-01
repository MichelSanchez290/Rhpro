<?php

namespace App\Livewire\PortalCapacitacion\ResponsabilidadesUniversales;

use App\Models\PortalCapacitacion\ResponsabilidadUniversal;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithFileUploads;

class EditarResponsabilidadesUniversales extends Component
{
    use WithFileUploads;
    public $sistema, $responsabilidad, $universal_id;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $tem = ResponsabilidadUniversal::findOrFail($id);

        $this->sistema = $tem->sistema;
        $this->responsabilidad = $tem->responsabilidad;
        $this->universal_id = $tem->id;
    }

    public function store()
    {
        $this->validate([
           'sistema' =>'required',
           'responsabilidad' =>'required',
        ]);

        ResponsabilidadUniversal::updateOrCreate(['id' => $this->universal_id],
        [   
           'sistema' => $this->sistema,
           'responsabilidad' => $this->responsabilidad,
        ]);

        $this->emit('actualizar','responsabilidad-actualizada');
        return redirect()->route('mostrarResponsabilidadesUniversales');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.responsabilidad-universal.editar-responsabilidades-universales')->layout("layouts.portal_capacitacion");
    }
}
