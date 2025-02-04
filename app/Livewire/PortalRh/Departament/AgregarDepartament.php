<?php

namespace App\Livewire\PortalRh\Departament;

use Livewire\Component;
use App\Models\PortalRH\Departament;

class AgregarDepartament extends Component
{
    public $departamento = []; // Almacena los datos del formulario

    // Reglas de validación
    protected $rules = [
        'departamento.nombre_departamento' => 'required',
    ];

    protected $messages = [
        'departamento.nombre_departamento.required' => 'El nombre del departamento es obligatorio.',
    ];

    public function saveDepartament()
    {
        $this->validate();

        $nuevoDepartamento = new Departament($this->departamento);
        $nuevoDepartamento->save();

        $this->departamento = [];
        //$this->emit('showAnimatedToast', 'Departamento guardado correctamente.');
        return redirect()->route('mostrardepa');
    }

    public function redirigir()
    {
        return redirect()->route('mostrardepa');
    }

    public function render()
    {
        return view('livewire.portal-rh.departament.agregar-departament')->layout('layouts.client');
    }
}
