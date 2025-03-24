<?php

namespace App\Livewire\PortalRh\RegistPatronal;

use App\Models\PortalRH\RegistroPatronal;
use Livewire\Component;
use Livewire\WithPagination;


class MostrarRegPatronal extends Component
{
    public $showModal = false; // Control para ventana emergente
    public $registroToDelete; // ID del registro a eliminar

    public function redirigir()
    {
        return redirect()->route('agregarregpatronal');
    }

    //Eliminar
    protected $listeners = [
        'confirmDelete' => 'confirmDelete', // Captura el evento
    ]; 
    
    public function confirmDelete($id)
    {
        $this->registroToDelete = $id;
        $this->showModal = true;
    }
    
    public function deleteSucursal()
    {
        if ($this->registroToDelete) {
            RegistroPatronal::find($this->registroToDelete)->delete();
        }

        $this->registroToDelete = null;
        $this->showModal = false;

        return redirect()->route('mostrarregpatronal');
    }

    public function render()
    {
        return view('livewire.portal-rh.regist-patronal.mostrar-reg-patronal')->layout('layouts.client');

    }
}
