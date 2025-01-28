<?php

namespace App\Livewire\PortalCapacitacion\HabilidadesHumanas;

use App\Models\PortalCapacitacion\FormacionHabilidadHumana;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithFileUploads;
use Livewire\Component;

class EditarHabilidadesHumanas extends Component
{
    use WithFileUploads;
    public $descripcion, $nivel, $humana_id;

    public function mount($id)
    {
        $id= Crypt::decrypt($id);
        $tem = FormacionHabilidadHumana::findOrFail($id);

        $this->descripcion = $tem->descripcion;
        $this->nivel = $tem->nivel;
        $this->humana_id = $tem->id;
    }

    public function store()
    {
        $this->validate([
            'descripcion' => 'required',
            'nivel' => 'required'
        ]);

        FormacionHabilidadHumana::updateOrCreate(['id' => $this->humana_id],
        [
            'descripcion' => $this->descripcion,
            'nivel' => $this->nivel,
        ]);

        $this->emit('message', 'Actualizada correctamente');
        return redirect()->route('mostrarHabiliadesHumanas');
        

    }
    public function render()
    {
        return view('livewire.portal-capacitacion.habilidades-humanas.editar-habilidades-humanas')->layout("layouts.portal_capacitacion");
    }
}
