<?php

namespace App\Livewire\PortalCapacitacion\FuncionesEspecificas\AdminEmpresa;

use Livewire\Component;
use App\Models\PortalCapacitacion\FuncionEspecifica;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class MostrarFunEspecificasEmpresa extends Component
{

    public $showModal = false; // Control para ventana emergente
    public $funcionToDelete;

    //metodo para redirreccion a una vista
    public function redirigir()
    {
        return redirect()->route('agregarFuncionesEspecificasEmpresa');
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
            FuncionEspecifica::find($this->funcionToDelete)->delete();
            session()->flash('message', 'funcion eliminada exitosamente.');
        }

        $this->funcionToDelete = null;
        $this->showModal = false;

        return redirect()->route('mostrarFuncionesEspecificasEmpresa');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.funciones-especificas.admin-empresa.mostrar-fun-especificas-empresa')->layout("layouts.portal_capacitacion");
    }
}
