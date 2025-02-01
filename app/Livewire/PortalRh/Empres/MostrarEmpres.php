<?php

namespace App\Livewire\PortalRh\Empres;

use App\Models\PortalRH\Empres;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;


class MostrarEmpres extends Component
{
    public $showModal = false; // Control para ventana emergente
    public $empresToDelete; // ID a eliminar

    public function redirigir()
    {
        return redirect()->route('agregarempresa');
    }

    //Eliminar
    protected $listeners = [
        'confirmDelete' => 'confirmDelete', // Captura el evento
    ]; 
    
    public function confirmDelete($id)
    {
        $this->empresToDelete = $id;
        $this->showModal = true;
    }
    
    public function deleteSucursal()
    {
        /*
        if ($this->sucursalToDelete) {
            $sucursal = Sucursal::find($this->sucursalToDelete);

            if ($sucursal) {
                $sucursal->delete();
                session()->flash('message', 'Sucursal eliminada exitosamente.');
            } else {
                session()->flash('message', 'La sucursal no existe o ya fue eliminada.');
            }
        } else {
            session()->flash('message', 'No se proporcionó ninguna sucursal para eliminar.');
        }

        $this->sucursalToDelete = null;
        $this->showModal = false; */


        
        if ($this->empresToDelete) {
            Empres::find($this->empresToDelete)->delete();
            session()->flash('message', 'Empresa eliminada exitosamente.');
        }

        $this->empresToDelete = null;
        $this->showModal = false;

        return redirect()->route('mostrarempresas');
    }

    public function render()
    {
        return view('livewire.portal-rh.empres.mostrar-empres')->layout('layouts.client');

    }
}
