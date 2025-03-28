<?php

namespace App\Livewire\PortalRh\Puest;

use Livewire\Component;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;

class AgregarPuest extends Component
{
    public $puest = [];
    public $sucursales=[], $departamentos=[];

    public $empresas, $empresa, $sucursal, $departamento;

    public function mount()
    {
        $this->empresas = Empresa::all();
    }

    public function updatedEmpresa()
    {
        $this->sucursales = Empresa::with('sucursales')->where('id', $this->empresa)->get();
    }

    public function updatedSucursal()
    {
        $this->departamentos = Sucursal::with('departamentos')->where('id', $this->sucursal)->get();
    }

    // REGLAS DE VALIDACIÓN
    protected $rules = [
        'empresa' => 'required',
        'sucursal' => 'required',
        'departamento' => 'required',
        'puest.nombre_puesto' => 'required',
        'departamento' => 'required|exists:departamentos,id',
    ];

    // MENSAJES DE VALIDACIÓN
    protected $messages = [
        'empresa.required' => 'Seleccione una empresa para filtrar.',
        'sucursal.required' => 'Seleccione una sucursal para filtrar.',
        'departamento.required' => 'Seleccione un departamento para filtrar.',
        'puest.nombre_puesto.required' => 'El nombre del puesto es requerido',
        'departamento.required' => 'Debe seleccionar un departamento.',
        'departamento.exists' => 'El departamento seleccionado no es válida.',
    ];

    // Método para guardar sucursal
    public function savePuesto()
    {
        $this->validate();

        $nuevoPuesto = Puesto::create($this->puest);
        $nuevoPuesto->departamentos()->attach($this->departamento, [
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->reset(['puest', 'departamento', 'empresa', 'sucursal']);
        
        session()->flash('message', 'Puesto Agregado.');
    }

    public function redirigirPuest()
    {
        return redirect()->route('mostrarpuesto');
    }

    public function render()
    {
        return view('livewire.portal-rh.puest.agregar-puest')->layout('layouts.client');
    }
}
