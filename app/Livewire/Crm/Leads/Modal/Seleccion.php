<?php

namespace App\Livewire\Crm\Leads\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Seleccion extends ModalComponent
{
    public $cantidadSeleccionada = 1; // Valor predeterminado

    public function seleccionar()
    {
        $this->dispatch('cantidadSeleccionada',   $this->numeroLista);
        $this->closeModal();
    }
    
    public function render()
    {
        return view('livewire.crm.leads.modal.seleccion');
    }
}
