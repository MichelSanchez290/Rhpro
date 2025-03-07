<?php

namespace App\Livewire\PortalRh\Puest;

use Livewire\Component;
use App\Models\PortalRH\Puesto;

class AgregarPuest extends Component
{
    public $puest = [];

    // REGLAS DE VALIDACIÓN
    protected $rules = [
        'puest.nombre_puesto' => 'required',
    ];

    // MENSAJES DE VALIDACIÓN
    protected $messages = [
        'puest.nombre_puesto.required' => 'El nombre del puesto es requerido',
    ];

    // Método para guardar sucursal
    public function savePuesto()
    {
        $this->validate();

        $AgregarPuesto = new Puesto($this->puest);
        $AgregarPuesto->save();

        $this->puest = [];
        //$this->emit('showAnimatedToast', 'Sucursal guardada correctamente');
        return redirect()->route('mostrarpuesto');
    }

    public function redirigirPuest()
    {
        return redirect()->route('mostrarpuesto');
    }

    public function render()
    {
        return view('livewire.portal-rh.puest.agregar-puest')->layout('layouts.client');
    }
}
