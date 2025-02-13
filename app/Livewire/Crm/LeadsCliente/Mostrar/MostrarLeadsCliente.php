<?php

namespace App\Livewire\Crm\LeadsCliente\Mostrar;

use Livewire\Component;

class MostrarLeadsCliente extends Component
{
    public function render()
    {
        return view('livewire.crm.leads-cliente.mostrar.mostrar-leads-cliente')->layout('layouts.crm');
    }
}