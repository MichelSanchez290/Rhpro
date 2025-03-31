<?php

namespace App\Livewire\PortalRh\Usuario;

use Livewire\Component;
use App\Models\User;


class MostrarUsuario extends Component
{
    public $showModal = false; // Control para ventana emergente
    public $userToDelete; // ID de la sucursal a eliminar


    // Eliminacion
    protected $listeners = [
        'confirmDelete' => 'confirmDelete', // Captura el evento
    ]; 
    
    public function confirmDelete($id)
    {
        $this->userToDelete = $id;
        $this->showModal = true;
    }
    
    public function deleteUsuario()
    {
        if ($this->userToDelete) {
            User::find($this->userToDelete)->delete(); 
        }

        $this->userToDelete = null;
        $this->showModal = false;

        session()->flash('message', 'Usuario Eliminado.');
    }


    public function render()
    {
        return view('livewire.portal-rh.usuario.mostrar-usuario')->layout('layouts.client');
    }
}
