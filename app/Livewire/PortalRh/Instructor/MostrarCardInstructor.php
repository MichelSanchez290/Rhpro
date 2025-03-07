<?php

namespace App\Livewire\PortalRh\Instructor;

use Livewire\Component;
use App\Models\PortalRH\Instructor;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class MostrarCardInstructor extends Component
{
    public $instructores, $usuarios, $sucursales, $departamentos;

    public function mount()
    {
        // Obtener todos los registros de las tablas relacionadas
        $this->instructores = Instructor::all();
        $this->usuarios = User::all()->keyBy('id'); // Indexamos por ID para acceso rápido
        $this->sucursales = Sucursal::all()->keyBy('id');
        $this->departamentos = Departamento::all()->keyBy('id');
    }

    public function redirigir($id)
    {
        $id_encriptado = Crypt::encrypt($id);
        return redirect()->route('cardinstructor', ['id' => $id_encriptado]);
    }

    public function render()
    {
        return view('livewire.portal-rh.instructor.mostrar-card-instructor', [
            'instructores' => $this->instructores,
            'usuarios' => $this->usuarios,
            'sucursales' => $this->sucursales,
            'departamentos' => $this->departamentos
        ])->layout('layouts.client');
    }
}
