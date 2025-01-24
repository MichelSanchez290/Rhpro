<?php

namespace App\Livewire\PortalCapacitacion\FuncionesEspecificas;

use Livewire\Component;
use App\Models\PortalCapacitacion\FuncionEspecifica;
use Livewire\WithFileUploads;

class AgregarFunEspecificas extends Component
{

    public $funcion=[];
    public $consulta;

    protected $rules = [
        'funcion.nombre' => 'required',
    ];

    protected $messages = [
        'funcion.nombre.required' => 'La función especifica es obligatoria.',
    ];

    public function mount()
    {
        $this->consulta = FuncionEspecifica::all();
    }

    public function agregarFuncion()
    {
        $this->validate();

        $AgregarFuncion = new FuncionEspecifica($this->funcion);
        $AgregarFuncion->save();

        $this->funcion=[];
        $this->emit('showAnimatedToast', 'Producto guardado correctamente');
        return redirect()->route('mostrarFuncionesEspecificas');
        
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.funciones-especificas.agregar-fun-especificas')->layout("layouts.portal_capacitacion");
    }
}
