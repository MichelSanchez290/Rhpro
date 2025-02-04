<?php

namespace App\Livewire\ActivoFijo\Activos\ActivoTecnologias;

use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use Livewire\Component;

class Mostraracttec extends Component
{
    protected $listeners = ['confirmDelete'];
    public function redirigir()
    {
        return redirect()->route('mostraracttec');
    }

    public function confirmDelete($id)
    {
        $activotec = ActivoTecnologia::find($id);
        if ($activotec) {
            // Eliminar el activo
            $activotec->delete();
            // Agregar una notificación de éxito
            session()->flash('message', 'El activo ha sido eliminado.');
        }
    }
    
    public function render()
    {
        return view('livewire.activo-fijo.activos.activo-tecnologias.mostraracttec')->layout('layouts.navactivos');
    }
}
