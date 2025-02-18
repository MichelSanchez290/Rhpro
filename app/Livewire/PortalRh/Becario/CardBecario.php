<?php

namespace App\Livewire\PortalRh\Becario;

use Livewire\Component;
use App\Models\PortalRH\Becario;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class CardBecario extends Component
{
    public $becario, $usuario, $sucursal, $departamento, $puesto, $registro_patronal;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);

        $this->becario = Becario::findOrFail($id);
        $this->usuario = User::find($this->becario->user_id);
        $this->departamento = Departamento::find($this->becario->departamento_id);
        $this->puesto = Puesto::find($this->becario->puesto_id);
        $this->registro_patronal = RegistroPatronal::find($this->becario->registro_patronal_id);

    } 

    public function render()
    {
        return view('livewire.portal-rh.becario.card-becario')->layout('layouts.client');
    }
}
