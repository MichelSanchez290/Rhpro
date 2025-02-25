<?php

namespace App\Livewire\PortalCapacitacion\RelacionesExternas;

use Livewire\Component;
use App\Models\PortalCapacitacion\RelacionExterna;
use Livewire\WithFileUploads;

class AgregarRelacionesExternas extends Component
{
    public $externa=[];
    public $consulta;

    protected $rules = [
        'externa.nombre' => 'required',
        'externa.razon_motivo' => 'required',
        'externa.frecuencia' => 'required',
    ];

    protected $messages = [
        'externa.nombre.required' => 'El campo Nombre es obligatorio',
        'externa.razon_motivo.required' => 'El campo Razón del motivo es obligatorio',
        'externa.frecuencia.required' => 'El campo Frecuencia es obligatorio',
    ];

    public function mount()
    {
        $this->consulta = RelacionExterna::all();
    }

    public function agregarExterna()
    {
        $this->validate();

        $Agregarexterna = new RelacionExterna($this->externa);
        $Agregarexterna->save();

        $this->externa=[];
        $this->reset(['nombre', 'razon_motivo', 'frecuencia']);

        session()->flash('success', 'Relacion externa creada con exito');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.relaciones-externas.agregar-relaciones-externas')->layout("layouts.portal_capacitacion");
    }
}
