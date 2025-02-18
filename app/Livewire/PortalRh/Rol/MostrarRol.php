<?php

namespace App\Livewire\PortalRh\Rol;

use Livewire\Component;
use App\Models\User;


class MostrarRol extends Component
{
    public $showModal = false; // Control para ventana emergente
    public $userToDelete; // ID de la sucursal a eliminar


    // Redirigir a una vista para agregar sucursales
    public function redirigir()
    {
        return redirect()->route('agregarrol');
    }

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
            session()->flash('message', 'Usuaio eliminado exitosamente.');
        }

        $this->userToDelete = null;
        $this->showModal = false;

        return redirect()->route('mostrarrol');
    }


    public function render()
    {
        return view('livewire.portal-rh.rol.mostrar-rol')->layout('layouts.client');
    }
}
