<?php

namespace App\Livewire\PortalRh\Documentos;

use Livewire\Component;
use App\Models\PortalRH\Documento;

class MostrarDocumento extends Component
{
    public $showModal = false; // Control para ventana emergente
    public $documentoToDelete; // ID a eliminar

    public function redirigir()
    {
        return redirect()->route('agregardoc');
    }

    //Eliminar
    protected $listeners = [
        'confirmDelete' => 'confirmDelete', // Captura el evento
    ]; 
    
    public function confirmDelete($id)
    {
        $this->documentoToDelete = $id;
        $this->showModal = true;
    }
    
    public function deleteSucursal()
    {
        if ($this->documentoToDelete) {
            Documento::find($this->documentoToDelete)->delete();
        }

        $this->documentoToDelete = null;
        $this->showModal = false;

        return redirect()->route('mostrardoc');
    }

    public function render()
    {
        return view('livewire.portal-rh.documentos.mostrar-documento')->layout('layouts.client');
    }
}
