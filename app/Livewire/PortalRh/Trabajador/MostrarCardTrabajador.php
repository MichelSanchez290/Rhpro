<?php

namespace App\Livewire\PortalRh\Trabajador;

use Livewire\Component;
use App\Models\PortalRH\Trabajador;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departament;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class MostrarCardTrabajador extends Component
{
    public $trabajadores, $usuarios, $sucursales, $departamentos;

    public function mount()
    {
        // Obtener todos los registros de las tablas relacionadas
        $this->trabajadores = Trabajador::all();
        $this->usuarios = User::all()->keyBy('id'); // Indexamos por ID para acceso rápido
        $this->sucursales = Sucursal::all()->keyBy('id');
        $this->departamentos = Departament::all()->keyBy('id');
    }

    public function redirigir($id)
    {
        $id_encriptado = Crypt::encrypt($id);
        return redirect()->route('cardtrabajador', ['id' => $id_encriptado]);
    }

    public function render()
    {
        return view('livewire.portal-rh.trabajador.mostrar-card-trabajador', [
            'trabajadores' => $this->trabajadores,
            'usuarios' => $this->usuarios,
            'sucursales' => $this->sucursales,
            'departamentos' => $this->departamentos
        ])->layout('layouts.client');
    }
}
