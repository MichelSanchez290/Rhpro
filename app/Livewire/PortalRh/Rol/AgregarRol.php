<?php

namespace App\Livewire\PortalRh\Rol;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// use Spatie\Permission\Traits\HasRoles; 

class AgregarRol extends Component
{
    public $name; // Nombre del rol
    public $selectedPermissions = []; // Lista de permisos seleccionados

    public $permissions = [];

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    protected $rules = [
        'name' => 'required|string|unique:roles,name',
        'selectedPermissions' => 'required|array'
    ];

    protected $messages = [
        'name.required' => 'Este campo es obligatorio.',
        'selectedPermissions.array' => 'Debes seleccionar minimo un permiso.',
    ];

    public function AgregarRol()
    {
        $this->validate();

        // Crear el nuevo rol
        $role = Role::create(['name' => $this->name]);

        // Asignar los permisos seleccionados al rol
        if (!empty($this->selectedPermissions)) {
            $role->syncPermissions($this->selectedPermissions);
        }

        // Redirigir o limpiar los campos después de la inserción
        $this->reset(['name', 'selectedPermissions']);
        session()->flash('message', 'Rol agregado.');
    }

    public function render()
    {
        return view('livewire.portal-rh.rol.agregar-rol')->layout('layouts.client');
    }
}
