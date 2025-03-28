<?php

namespace App\Livewire\PortalCapacitacion\Cursos\Cursos\AdminEmpresa;

use Livewire\Component;
use App\Models\PortalCapacitacion\Curso;
use Illuminate\Support\Facades\Response;

class MostrarCursoEmpresa extends Component
{
    public $showModal = false; // Control para ventana emergente
    public $funcionToDelete;

    public function redirigir(){
        return redirect()->route('agregarCursosEmpresa');
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
            Curso::find($this->funcionToDelete)->delete();
            session()->flash('message', 'Curso eliminado exitosamente.');
        }

        $this->funcionToDelete = null;
        $this->showModal = false;

        return redirect()->route('verCursosEmpresa');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.cursos.cursos.admin-empresa.mostrar-curso-empresa')->layout("layouts.portal_capacitacion");
    }
}
