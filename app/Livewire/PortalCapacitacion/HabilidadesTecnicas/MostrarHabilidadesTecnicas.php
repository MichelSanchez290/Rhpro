<?php

namespace App\Livewire\PortalCapacitacion\HabilidadesTecnicas;

use Livewire\Component;
use App\Models\PortalCapacitacion\FormacionHabilidadTecnica;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class MostrarHabilidadesTecnicas extends Component
{
    public $showModal = false;
    public $funcionToDelete;

    public function redirigir(){
        return redirect()->route('agregarHabilidadesHumanas');
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
            FormacionHabilidadTecnica::find($this->funcionToDelete)->delete();
            session()->flash('message', 'Habilidad tecnica eliminada exitosamente.');
        }

        $this->funcionToDelete = null;
        $this->showModal = false;

        return redirect()->route('mostrarFuncionesEspecificas');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.habilidades-tecnicas.mostrar-habilidades-tecnicas')->layout("layouts.portal_capacitacion");
    }
}
