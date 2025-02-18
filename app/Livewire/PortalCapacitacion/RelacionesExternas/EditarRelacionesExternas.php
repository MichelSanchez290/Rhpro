<?php

namespace App\Livewire\PortalCapacitacion\RelacionesExternas;

use Livewire\Component;
use App\Models\PortalCapacitacion\RelacionExterna;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithFileUploads;

class EditarRelacionesExternas extends Component
{
    use WithFileUploads;
    public $nombre, $razon_motivo, $frecuencia, $externa_id;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $tem = RelacionExterna::findOrFail($id);

        $this->nombre = $tem->nombre;
        $this->razon_motivo = $tem->razon_motivo;
        $this->frecuencia = $tem->frecuencia;
        $this->externa_id = $id;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'razon_motivo' => 'required',
            'frecuencia' => 'required',
        ]);

        RelacionExterna::updateOrCreate(['id' => $this->externa_id],
        [
            'nombre' => $this->nombre,
            'razon_motivo' => $this->razon_motivo,
            'frecuencia' => $this->frecuencia,
        ]);

        //$this->emit('message', 'Relación externa actualizada correctamente');
        return redirect()->route('mostrarRelacionesExternas');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.relaciones-externas.editar-relaciones-externas')->layout("layouts.portal_capacitacion");
    }
}
