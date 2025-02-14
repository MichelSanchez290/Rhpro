<?php

namespace App\Livewire\Crm\Leads;

use Livewire\Component;

class Vistaprincipal extends Component
{
    public $paginacion;

    public function mount()
    {
        $this->paginacion = 0;
    }

    public function uno()
    {
        $this->paginacion = 1;
    }
    public function dos()
    {
        $this->paginacion = 2;
    }

    public function tres()
    {
        $this->paginacion = 3;
    }

    public function cuatro()
    {
        $this->paginacion = 4;
    }
    public function render()
    {
        return view('livewire.crm.leads.vistaprincipal')->layout('layouts.crm');
    }
}
