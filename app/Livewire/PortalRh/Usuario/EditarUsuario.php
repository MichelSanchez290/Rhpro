<?php

namespace App\Livewire\PortalRh\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\Puesto;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class EditarUsuario extends Component
{
    public $sucursales = [], $departamentos=[], $puestos = [], $user = [];

    public  $user_id, $name, $email, $password, $empresas, 
    $empresa, $sucursal, $departamento, $puesto;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);

        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->empresa = $user->empresa_id;
        $this->sucursal = $user->sucursal_id;
        $this->departamento = $user->departamento_id;
        $this->puesto = $user->puesto_id;

        $this->empresas = Empresa::all();

        $this->updatedEmpresa();
        $this->updatedDepartamento();
        $this->updatedSucursal();
    }

    public function updatedEmpresa()
    {
        $this->sucursales = Empresa::with('sucursales')->where('id', $this->empresa)->get();
    }

    public function updatedSucursal()
    {
        $this->departamentos = Sucursal::with('departamentos')->where('id', $this->sucursal)->get();
    }

    public function updatedDepartamento()
    {
        $this->puestos = Departamento::with('puestos')->where('id', $this->departamento)->get();
    }

    public function actualizarUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'empresa' => 'required',
            'sucursal' => 'required',
            'departamento' => 'required',
            'puesto' => 'required',
        ]);

        $user = User::findOrFail($this->user_id);
        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'empresa_id' => $this->empresa,
            'sucursal_id' => $this->sucursal,
            'departamento_id' => $this->departamento,
            'puesto_id' => $this->puesto,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);

        session()->flash('message', 'Usuario Actualizado.');
    }

    public function render()
    {
        return view('livewire.portal-rh.usuario.editar-usuario')->layout('layouts.client');
    }
}
