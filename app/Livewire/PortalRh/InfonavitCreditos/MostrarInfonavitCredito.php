<?php

namespace App\Livewire\PortalRh\InfonavitCreditos;

use Livewire\Component;
use App\Models\PortalRh\InfonavitCredito;

class MostrarInfonavitCredito extends Component
{
    public $showModal = false; // Control para ventana emergente
    public $infonavitToDelete; // ID a eliminar

    // Redirigir a una vista para agregar sucursales
    public function redirigir()
    {
        return redirect()->route('agregarinfonavit');
    }

    
    // Eliminacion
    protected $listeners = [
        'confirmDelete' => 'confirmDelete', // Captura el evento
    ]; 
    
    public function confirmDelete($id)
    {
        $this->infonavitToDelete = $id;
        $this->showModal = true;
    }
    
    public function deleteInfonavit()
    {
        if ($this->infonavitToDelete) {
            InfonavitCredito::find($this->infonavitToDelete)->delete();
        }

        $this->infonavitToDelete = null;
        $this->showModal = false;

        session()->flash('message', 'Credito Infonavit Eliminado.');
    }

    public function render()
    {
        return view('livewire.portal-rh.infonavit-creditos.mostrar-infonavit-credito')->layout('layouts.client');
    }
}
