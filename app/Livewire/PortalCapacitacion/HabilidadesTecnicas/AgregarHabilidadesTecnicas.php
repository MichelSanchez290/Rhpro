<?php

namespace App\Livewire\PortalCapacitacion\HabilidadesTecnicas;

use Livewire\Component;
use App\Models\PortalCapacitacion\FormacionHabilidadTecnica;
use Livewire\WithFileUploads;

class AgregarHabilidadesTecnicas extends Component
{
    public $tecnica=[];
    public $consulta; 

    protected $rules = [
        'tecnica.descripcion' => 'required',
        'tecnica.nivel' => 'required',
    ];

    protected $messages = [
        'tecnica.descripcion.required' => 'La descripción es obligatoria.',
        'tecnica.nivel.required' => 'El nivel es obligatorio.',
    ];

    public function mount()
    {
        $this->consulta = FormacionHabilidadTecnica::all();
    }

    public function agregarTecnica()
    {
        $this->validate();

        $Agregartecnica = new FormacionHabilidadTecnica($this->tecnica);
        $Agregartecnica->save();

        $this->tecnica=[];
        $this->emit('showAnimatedToast', 'Habilidad agregada correctamente');
        return redirect()->route('mostrarHabilidadesHumanas');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.habilidades-tecnicas.agregar-habilidades-tecnicas')->layout("layouts.portal_capacitacion");
    }
}
