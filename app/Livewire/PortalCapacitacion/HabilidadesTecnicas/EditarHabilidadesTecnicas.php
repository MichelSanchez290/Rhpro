<?php

namespace App\Livewire\PortalCapacitacion\HabilidadesTecnicas;

use Livewire\Component;
use App\Models\PortalCapacitacion\FormacionHabilidadTecnica;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithFileUploads;

class EditarHabilidadesTecnicas extends Component
{
    use WithFileUploads;
    public $descripcion, $nivel, $tecnica_id;

    public function mount($id)
    {
        $id= Crypt::decrypt($id);
        $tem = FormacionHabilidadTecnica::findOrFail($id);

        $this->descripcion = $tem->descripcion;
        $this->nivel = $tem->nivel;
        $this->tecnica_id = $tem->id;
    }

    public function store()
    {
        $this->validate([
            'descripcion' => 'required',
            'nivel' => 'required'
        ]);

        FormacionHabilidadTecnica::updateOrCreate(['id' => $this->tecnica_id],
        [
            'descripcion' => $this->descripcion,
            'nivel' => $this->nivel,
        ]);

        //$this->emit('message', 'Actualizada correctamente');
        return redirect()->route('mostrarHabiliadesTecnicas');
        

    }

    public function render()
    {
        return view('livewire.portal-capacitacion.habilidades-tecnicas.editar-habilidades-tecnicas')->layout("layouts.portal_capacitacion");
    }
}
