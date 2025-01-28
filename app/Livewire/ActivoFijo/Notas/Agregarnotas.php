<?php

namespace App\Livewire\ActivoFijo\Notas;

use Livewire\Component;
use App\Models\ActivoFijo\Notatecno;

class Agregarnotas extends Component
{
    public $consulta, $notadescripcion;
    
    public function mount()
    {
        $this->consulta = Notatecno::all(); // Obtener todos los tipos de activo
    }

    protected $rules = [
        'notadescripcion' => 'required|string',
    ];

    protected $validationAttributes = [
        'notadescripcion' => 'Descripcion'
    ];

    public function agregarNotatec()
    {
        $this->validate();
        $nota = Notatecno::create([
            'descripcion' => $this->notadescripcion
        ]);
        return redirect()->route('');
    }

    public function render()
    {
        return view('livewire.activo-fijo.notas.agregarnotas')->layout('layouts.navactivos');
    }
}
