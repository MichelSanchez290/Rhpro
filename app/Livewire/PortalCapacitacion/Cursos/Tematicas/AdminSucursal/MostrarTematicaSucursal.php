<?php

namespace App\Livewire\PortalCapacitacion\Cursos\Tematicas\AdminSucursal;

use Livewire\Component;
use App\Models\PortalCapacitacion\Tematica;
use Illuminate\Support\Facades\Response;

class MostrarTematicaSucursal extends Component
{
    public $showModal = false; // Control para ventana emergente
    public $funcionToDelete;

    public function redirigir(){
        return redirect()->route('agregarTematicasSucursal');
    }

    protected $listeners = [
        'confirmDelete' => 'confirmDelete', // Captura el evento
    ]; 
    
    public function confirmDelete($id)
    {
        $this->funcionToDelete = $id;
        $this->showModal = true;
    }
    
    public function deleteFuncion()
    {
        if ($this->funcionToDelete) {
            Tematica::find($this->funcionToDelete)->delete();
            session()->flash('message', 'Tematica eliminada exitosamente.');
        }

        $this->funcionToDelete = null;
        $this->showModal = false;

        return redirect()->route('verTematicasSucursal');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.cursos.tematicas.admin-sucursal.mostrar-tematica-sucursal')->layout("layouts.portal_capacitacion");
    }
}
