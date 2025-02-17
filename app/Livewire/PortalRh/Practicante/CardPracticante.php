<?php

namespace App\Livewire\PortalRh\Practicante;

use Livewire\Component;
use App\Models\PortalRH\Practicante;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class CardPracticante extends Component
{
    public $practicante, $usuario, $sucursal, $departamento, $puesto, $registro_patronal;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $this->practicante = Practicante::findOrFail($id);
        $this->usuario = User::find($this->practicante->user_id);
        
        $this->departamento = Departamento::find($this->practicante->departamento_id);
        $this->puesto = Puesto::find($this->practicante->puesto_id);
        $this->registro_patronal = RegistroPatronal::find($this->practicante->registro_patronal_id);

    } 

    public function render()
    {
        return view('livewire.portal-rh.practicante.card-practicante')->layout('layouts.client');
    }
}
