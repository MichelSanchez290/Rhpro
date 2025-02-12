<?php

namespace App\Livewire\PortalRh\Trabajador;

use Livewire\Component;
use App\Models\PortalRH\Trabajador;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class CardTrabajador extends Component
{
    public $trabajador, $usuario, $sucursal, $departamento, $puesto, $registro_patronal;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $this->trabajador = Trabajador::findOrFail($id);
        $this->usuario = User::find($this->trabajador->user_id);
        
        $this->departamento = Departamento::find($this->trabajador->departamento_id);
        $this->puesto = Puesto::find($this->trabajador->puesto_id);
        $this->registro_patronal = RegistroPatronal::find($this->trabajador->registro_patronal_id);

    } 

    public function render()
    {
        return view('livewire.portal-rh.trabajador.card-trabajador')->layout('layouts.client');
    }
}
