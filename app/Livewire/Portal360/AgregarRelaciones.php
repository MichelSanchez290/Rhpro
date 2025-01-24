<?php

namespace App\Livewire\Portal360;

use App\Models\Encuestas360\Relacion;
use Livewire\Component;

class AgregarRelaciones extends Component
{
    public $relaciones = [];

    protected $rules = [
        'relaciones.nombre' => 'required|min:3',
    ];

    protected $messages = [
        'relaciones.nombre.min' => 'El nombre debe tener al menos 3 caracteres',
    ];

    public function saveRelaciones(){
        $this->validate();
        $nuevoRelaciones = new Relacion($this->relaciones);
        $nuevoRelaciones->save();

        $this->relaciones = [];

        $this->dispatch('showAnimatedToast', 'Relaciones guardado correctamente');

        return redirect()->route('portal360.mostrarUser');
    }

    public function render()
    {
        return view('livewire.portal360.agregar-relaciones')->layout('layouts.portal360');
    }


}
