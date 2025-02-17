<?php

namespace App\Livewire\PortalRh\Becario;

use Livewire\Component;
use App\Models\PortalRH\Becario;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithPagination;

class MostrarCardBecario extends Component
{
    public $becarios, $usuarios, $puestos, $departamentos, $registros_patronales;
    use WithPagination;

    public $search = '';
    public $registroPatronal = '';
    public $departamento = '';
    public $puesto = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingRegistroPatronal()
    {
        $this->departamento = '';
        $this->puesto = '';
        $this->resetPage();
    }

    public function updatingDepartamento()
    {
        $this->puesto = '';
        $this->resetPage();
    }

    
    public function mount()
    {
        // Obtener todos los registros de las tablas relacionadas
        $this->becarios = Becario::all();
        $this->usuarios = User::all()->keyBy('id'); // Indexamos por ID para acceso rápido
        $this->puestos = Puesto::all()->keyBy('id');
        $this->departamentos = Departamento::all()->keyBy('id');
        $this->registros_patronales = RegistroPatronal::all()->keyBy('id');
    }

    public function redirigir($id)
    {
        $id_encriptado = Crypt::encrypt($id);
        return redirect()->route('cardbecario', ['id' => $id_encriptado]);
    }


    
    public function render()
    {
        $query = Becario::query();

        // Búsqueda por nombre o clave del becario
        if (!empty($this->search)) {
            $query->whereHas('user', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })->orWhere('clave_becario', 'like', '%' . $this->search . '%');
        }

        // Filtrar por Registro Patronal
        if (!empty($this->registroPatronal)) {
            $query->where('registro_patronal_id', $this->registroPatronal);
        }

        // Filtrar por Departamento
        if (!empty($this->departamento)) {
            $query->where('departamento_id', $this->departamento);
        }

        // Filtrar por Puesto
        if (!empty($this->puesto)) {
            $query->where('puesto_id', $this->puesto);
        }
        
        return view('livewire.portal-rh.becario.mostrar-card-becario', [
            'becarios' => $query->paginate(10),
            'registrosPatronales' => RegistroPatronal::all(),
            'departamentos' => !empty($this->registroPatronal) ? Departamento::where('registro_patronal_id', $this->registroPatronal)->get() : [],
            'puestos' => !empty($this->departamento) ? Puesto::where('departamento_id', $this->departamento)->get() : []
        ])->layout('layouts.client');
    }
}
