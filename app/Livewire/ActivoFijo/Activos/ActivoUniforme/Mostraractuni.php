<?php

namespace App\Livewire\ActivoFijo\Activos\ActivoUniforme;

use App\Models\ActivoFijo\Activos\ActivoUniforme;
use Livewire\Component;

class Mostraractuni extends Component
{
    protected $listeners = ['confirmDelete'];

    public function redirigir()
    {
        return redirect()->route('mostraractuni');
    }

    public function confirmDelete($id)
    {
        $activoof = ActivoUniforme::find($id);
        if ($activoof) {
            // Eliminar el activo
            $activoof->delete();
            // Agregar una notificación de éxito
            session()->flash('message', 'El activo ha sido eliminado.');
        }
    }
    public function render()
    {
        return view('livewire.activo-fijo.activos.activo-uniforme.mostraractuni')->layout('layouts.navactivos');
    }
}
