<?php

namespace App\Livewire\PortalRh\Rol;

use Livewire\Component;
use Spatie\Permission\Models\Role;


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
    
    public function deleteRol()
    {
        if ($this->userToDelete) {
            Role::find($this->userToDelete)->delete();
        }

        $this->userToDelete = null;
        $this->showModal = false;

        session()->flash('message', 'Rol Eliminado.');
    }


    public function render()
    {
        return view('livewire.portal-rh.rol.mostrar-rol')->layout('layouts.client');
    }
}
