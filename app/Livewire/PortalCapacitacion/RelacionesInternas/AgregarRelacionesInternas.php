<?php

namespace App\Livewire\PortalCapacitacion\RelacionesInternas;

use Livewire\Component;
use App\Models\PortalCapacitacion\RelacionInterna;
use Livewire\WithFileUploads;

class AgregarRelacionesInternas extends Component
{
    public $interna=[];
    public $consulta;

    protected $rules = [
        'interna.puesto' => 'required',
        'interna.razon_motivo' => 'required',
        'interna.frecuencia' => 'required',
    ];

    protected $messages = [
        'interna.puesto.required' => 'El campo puesto es obligatorio',
        'interna.razon_motivo.required' => 'El campo razón motivo es obligatorio',
        'interna.frecuencia.required' => 'El campo frecuencia es obligatorio',  
    ];

    public function mount()
    {
        $this->consulta = RelacionInterna::all();
    }

    public function agregarInterna()
    {
        $this->validate();

        $Agregarinterna = new RelacionInterna($this->interna);
        $Agregarinterna->save();

        $this->interna=[];
        $this->emit('showAnimatedToast', 'Producto guardado correctamente');
        return redirect()->route('mostrarRelacionesInternas');
        
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.relaciones-internas.agregar-relaciones-internas')->layout("layouts.portal_capacitacion");
    }
}
