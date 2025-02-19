<?php

namespace App\Livewire\PortalRh\Rol;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Crypt;

class EditarRol extends Component
{
    public $rolId;
    public $nombre;
    public $selectedPermissions = [];
    public $permissions = [];

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $rol = Role::findOrFail($id);

        $this->rolId = $rol->id;
        $this->nombre = $rol->name;
        $this->selectedPermissions = $rol->permissions->pluck('id')->toArray(); // Guardar IDs en lugar de nombres
        $this->permissions = Permission::all();
    }

    protected $rules = [
        'nombre' => 'required|string|unique:roles,name,' . 'rolId',
        'selectedPermissions' => 'array'
    ];

    protected $messages = [
        'nombre.required' => 'El nombre del rol es obligatorio.',
        'selectedPermissions.array' => 'Debes seleccionar al menos un permiso.',
    ];

    public function actualizarRol()
    {
        $this->validate();

        $rol = Role::findOrFail($this->rolId);
        $rol->name = $this->nombre;
        $rol->save();

        // Asegurarse de sincronizar los permisos usando los IDs en lugar de los nombres
        $rol->syncPermissions($this->selectedPermissions);

        // Refrescar la data del rol después de actualizar
        $this->mount(Crypt::encrypt($this->rolId));

        session()->flash('message', 'Rol actualizado correctamente.');
    }

    //return redirect()->route('mostrarrol');
    
    public function render()
    {
        return view('livewire.portal-rh.rol.editar-rol')->layout('layouts.client');
    }

}
