<?php

namespace App\Livewire\PortalCapacitacion\Cursos\Tematicas\AdminEmpresa;

use Livewire\Component;
use App\Models\PortalCapacitacion\Tematica;
use Illuminate\Support\Facades\Response;

class MostrarTematicaEmpresa extends Component
{
    public $showModal = false; // Control para ventana emergente
    public $funcionToDelete;

    public function redirigir(){
        return redirect()->route('agregarTematicasEmpresa');
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

        return redirect()->route('verTematicasEmpresa');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.cursos.tematicas.admin-empresa.mostrar-tematica-empresa')->layout("layouts.portal_capacitacion");
    }
}
