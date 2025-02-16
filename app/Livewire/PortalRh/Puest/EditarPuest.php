<?php

namespace App\Livewire\PortalRh\Puest;

use Livewire\Component;
use App\Models\PortalRH\Puesto;
use Illuminate\Support\Facades\Crypt;

class EditarPuest extends Component
{
    public $puest_id, $nombre_puesto;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $puest = Puesto::findOrFail($id);

        $this->puest_id = $id;
        $this->nombre_puesto = $puest->nombre_puesto;
    }

    public function actualizarPuesto()
    {
        $this->validate([
            'nombre_puesto' => 'required',
        ]);

        Puesto::updateOrCreate(['id' => $this->puest_id], [
            'nombre_puesto' => $this->nombre_puesto,
        ]);

        //$this->emit('editBann', 'Departamento editado correctamente');
        return redirect()->route('mostrarpuesto');
    }


    public function render()
    {
        return view('livewire.portal-rh.puest.editar-puest')->layout('layouts.client');
    }
}
