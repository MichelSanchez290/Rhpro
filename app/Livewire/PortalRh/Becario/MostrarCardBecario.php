<?php

namespace App\Livewire\PortalRh\Becario;

use Livewire\Component;
use App\Models\User;
use App\Models\PortalRH\Becario;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\Puesto;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithPagination;

class MostrarCardBecario extends Component
{
    use WithPagination;
    
    public $search;
    public $noResults = false;

    //para obtener todos los usuarios y sus datos
    public $usuarios, $registros_patronales, $emp, $suc, $depa, $puest;

    //para el filtrado
    public $sucursales=[], $departamentos=[], $puestos=[], $users=[];
    public $empresas, $empresa, $sucursal, $departamento, $puesto;
    
    public function mount()
    {
        $this->search = "";

        // Obtener todos los registros de las tablas relacionadas
        $this->usuarios = User::all()->keyBy('id');
        $this->emp = Empresa::all()->keyBy('id');
        $this->suc = Sucursal::all()->keyBy('id');
        $this->depa = Departamento::all()->keyBy('id');
        $this->puest = Puesto::all()->keyBy('id');
        $this->registros_patronales = RegistroPatronal::all()->keyBy('id');
        
        $this->empresas = Empresa::all();
    }

    // Método para búsqueda en tiempo real
    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
            $this->noResults = false;
        }
        
        // Actualizar filtros cuando cambian las selecciones
        if (in_array($property, ['empresa', 'sucursal', 'departamento', 'puesto'])) {
            $this->updateFilters();
        }
    }

    protected function updateFilters()
    {
        if ($this->empresa) {
            $this->sucursales = Empresa::with('sucursales')->where('id', $this->empresa)->get();
        } else {
            $this->sucursales = [];
            $this->sucursal = null;
        }

        if ($this->sucursal) {
            $this->departamentos = Sucursal::with('departamentos')->where('id', $this->sucursal)->get();
        } else {
            $this->departamentos = [];
            $this->departamento = null;
        }

        if ($this->departamento) {
            $this->puestos = Departamento::with('puestos')->where('id', $this->departamento)->get();
        } else {
            $this->puestos = [];
            $this->puesto = null;
        }
    }

    public function filtrar()
    {
        $query = Becario::query()
            ->when($this->search, function ($query) {
                $query->where(function($q) {
                    $q->where('clave_becario', 'LIKE', "%{$this->search}%")
                      ->orWhereHas('user', function($userQuery) {
                          $userQuery->where('name', 'LIKE', "%{$this->search}%");
                      });
                });
            })
            ->when($this->empresa, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('empresa_id', $this->empresa);
                });
            })
            ->when($this->sucursal, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('sucursal_id', $this->sucursal);
                });
            })
            ->when($this->departamento, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('departamento_id', $this->departamento);
                });
            })
            ->when($this->puesto, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('puesto_id', $this->puesto);
                });
            });

        return $query->get();
    }

    public function redirigir($id)
    {
        $id_encriptado = Crypt::encrypt($id);
        return redirect()->route('cardbecario', ['id' => $id_encriptado]);
    }

    public function render()
    {
        $becarios = $this->filtrar();
        $this->noResults = $becarios->isEmpty() && !empty($this->search);
        
        return view('livewire.portal-rh.becario.mostrar-card-becario', [
            'becarios' => $becarios,
            'noResults' => $this->noResults,
        ])->layout('layouts.client');
    }
}