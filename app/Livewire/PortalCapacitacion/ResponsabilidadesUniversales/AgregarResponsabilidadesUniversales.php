<?php

namespace App\Livewire\PortalCapacitacion\ResponsabilidadesUniversales;

use App\Models\PortalCapacitacion\ResponsabilidadUniversal;
use Livewire\WithFileUploads;
use Livewire\Component;

class AgregarResponsabilidadesUniversales extends Component
{
    public $universal=[];
    public $consulta;

    protected $rules = [
        'universal.sistema' => 'required',
        'universal.responsalidad' => 'required',
    ];

    protected $messages = [
        'universal.sistema' => 'El campo sistema es obligatorio',
        'universal.responsalidad' => 'El campo responsabilidad es obligatorio',
    ];

    public function mount()
    {
        $this->consulta = ResponsabilidadUniversal::all();
    }

    public function agregarUniversal()
    {
        $this->validate();
        $Agregaruniversal = new ResponsabilidadUniversal($this->universal);
        $Agregaruniversal->save();

        $this->universal=[];
        $this->reset(['sistema', 'responsabilidad']);

        session()->flash('message', 'Responsabilidad universal creada exitosamente.');
    }


    public function render()
    {
        return view('livewire.portal-capacitacion.responsabilidad-universal.agregar-responsabilidades-universales')->layout("layouts.portal_capacitacion");
    }
}
