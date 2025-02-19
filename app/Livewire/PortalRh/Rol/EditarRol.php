<?php

namespace App\Livewire\PortalRh\Rol;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditarRol extends Component
{
    public $rolId;
    public $nombre;
    public $permisos = [];
    public $todosLosPermisos = [];

    public function mount($id)
    {
        $rol = Role::findOrFail($id);

        $this->rolId = $rol->id;
        $this->nombre = $rol->name;
        $this->permisos = $rol->permissions->pluck('id')->toArray();
        $this->todosLosPermisos = Permission::all();
    }

    public function actualizarRol()
    {
        $rol = Role::findOrFail($this->rolId);
        $rol->name = $this->nombre;
        $rol->save();

        // Sincronizar permisos
        $rol->syncPermissions($this->permisos);

        session()->flash('success', 'Rol actualizado correctamente');
    }


    public function render()
    {
        return view('livewire.portal-rh.rol.editar-rol')->layout('layouts.client');
    }

}
