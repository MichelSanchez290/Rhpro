<?php

namespace App\Livewire\Crm\Levantamientos\Esmart\TableVistas;

use Livewire\Component;

class EsmartTabla extends Component
{
    public function render()
    {
        return view('livewire.crm.levantamientos.esmart.table-vistas.esmart-tabla')->layout('layouts.crm');
    }
}
