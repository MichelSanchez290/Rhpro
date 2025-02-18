<?php

namespace App\Livewire\Crm\Leads\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Seleccion extends ModalComponent
{
    public $seleccion = 1;

    public function aceptar()
    {
        $this->emit('seleccion', $this->seleccion);
        $this->closeModal();        
    }
    public function render()
    {
        return view('livewire.crm.leads.modal.seleccion');
    }
}
