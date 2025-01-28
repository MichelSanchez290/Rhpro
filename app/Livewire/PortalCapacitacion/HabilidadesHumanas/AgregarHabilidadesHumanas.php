<?php

namespace App\Livewire\PortalCapacitacion\HabilidadesHumanas;

use Livewire\Component;
use App\Models\PortalCapacitacion\FormacionHabilidadHumana;
use Livewire\WithFileUploads;

class AgregarHabilidadesHumanas extends Component
{
    public $humana=[];
    public $consulta; 

    protected $rules = [
        'humana.descripcion' => 'required',
        'humana.nivel' => 'required',
    ];

    protected $messages = [
        'humana.descripcion.required' => 'La descripción es obligatoria.',
        'humana.nivel.required' => 'El nivel es obligatorio.',
    ];

    public function mount()
    {
        $this->consulta = FormacionHabilidadHumana::all();
    }

    public function agregarHumana()
    {
        $this->validate();

        $Agregarhumana = new FormacionHabilidadHumana($this->humana);
        $Agregarhumana->save();

        $this->humana=[];
        $this->emit('showAnimatedToast', 'Habilidad agregada correctamente');
        return redirect()->route('mostrarHabilidadesHumanas');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.habilidades-humanas.agregar-habilidades-humanas')->layout("layouts.portal_capacitacion");
    }
}
