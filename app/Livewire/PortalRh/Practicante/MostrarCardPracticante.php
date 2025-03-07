<?php

namespace App\Livewire\PortalRh\Practicante;

use Livewire\Component;
use App\Models\PortalRH\Practicante;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class MostrarCardPracticante extends Component
{
    public $practicantes, $usuarios, $puestos, $departamentos, $registros_patronales;

    public function mount()
    {
        // Obtener todos los registros de las tablas relacionadas
        $this->practicantes = Practicante::all();
        $this->usuarios = User::all()->keyBy('id'); // Indexamos por ID para acceso rápido
        $this->puestos = Puesto::all()->keyBy('id');
        $this->departamentos = Departamento::all()->keyBy('id');
        $this->registros_patronales = RegistroPatronal::all()->keyBy('id');
    }

    public function redirigir($id)
    {
        $id_encriptado = Crypt::encrypt($id);
        return redirect()->route('cardpracticante', ['id' => $id_encriptado]);
    }

    

    public function render()
    {
        return view('livewire.portal-rh.practicante.mostrar-card-practicante', [
            'practicantes' => $this->practicantes,
            'usuarios' => $this->usuarios,
            'puestos' => $this->puestos,
            'departamentos' => $this->departamentos,
            'registros_patronales' => $this->registros_patronales
        ])->layout('layouts.client');
    }
}
