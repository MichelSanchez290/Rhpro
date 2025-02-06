<?php

namespace App\Livewire\PortalRh\Instructor;

use Livewire\Component;
use App\Models\PortalRH\Instruct;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departament;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class CardInstructor extends Component
{
    public $instructor, $usuario, $sucursal, $departamento;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $this->instructor = Instruct::findOrFail($id);
        $this->usuario = User::find($this->instructor->user_id);
        $this->sucursal = Sucursal::find($this->instructor->sucursal_id);
        $this->departamento = Departament::find($this->instructor->departamento_id);

    } 

    public function render()
    {
        return view('livewire.portal-rh.instructor.card-instructor')->layout('layouts.client');
    }
}
