<?php

namespace App\Livewire\PortalRh\Trabajador;

use Livewire\Component;
use App\Models\PortalRH\Trabajador;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departament;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class CardTrabajador extends Component
{
    public $trabajador, $usuario, $sucursal, $departamento;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $this->trabajador = Trabajador::findOrFail($id);
        $this->usuario = User::find($this->trabajador->user_id);
        $this->sucursal = Sucursal::find($this->trabajador->sucursal_id);
        $this->departamento = Departament::find($this->trabajador->departamento_id);

    } 

    public function render()
    {
        return view('livewire.portal-rh.trabajador.card-trabajador')->layout('layouts.client');
    }
}
