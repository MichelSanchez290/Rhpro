<?php

namespace App\Livewire\PortalRh\Instructor;

use Livewire\Component;
use App\Models\PortalRH\Instructor;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class CardInstructor extends Component
{
    public $instructor, $usuario, $sucursal, $departamento;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $this->instructor = Instructor::findOrFail($id);
        $this->usuario = User::find($this->instructor->user_id);
        $this->sucursal = Sucursal::find($this->instructor->sucursal_id);
        $this->departamento = Departamento::find($this->instructor->departamento_id);

    } 

    public function render()
    {
        return view('livewire.portal-rh.instructor.card-instructor')->layout('layouts.client');
    }
}
