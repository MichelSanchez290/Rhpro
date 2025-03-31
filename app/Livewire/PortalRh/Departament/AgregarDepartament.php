<?php

namespace App\Livewire\PortalRh\Departament;

use Livewire\Component;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;

class AgregarDepartament extends Component
{
    public $departamento = []; // Almacena los datos del formulario
    public $sucursales=[];
    public $empresas, $empresa, $sucursal;

    public function mount()
    {
        $this->empresas = Empresa::all();
    }

    public function updatedEmpresa()
    {
        $this->sucursales = Empresa::with('sucursales')->where('id', $this->empresa)->get();
    }
    
    // Reglas de validación
    protected $rules = [
        'empresa' => 'required',
        'sucursal' => 'required',
        'departamento.nombre_departamento' => 'required',
        'sucursal' => 'required|exists:sucursales,id',
    ];

    protected $messages = [
        'empresa.required' => 'Seleccione una empresa para filtrar.',
        'sucursal.required' => 'Seleccione una sucursal para filtrar.',
        'departamento.nombre_departamento.required' => 'El nombre del departamento es obligatorio.',
        'sucursal.required' => 'Debe seleccionar una Sucursal.',
        'sucursal.exists' => 'La Sucursal seleccionada no es válida.',
    ];

    public function saveDepartament()
    {
        $this->validate();

        $nuevoDepartamento = Departamento::create($this->departamento);
        $nuevoDepartamento->sucursales()->attach($this->sucursal, [
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Limpiar los datos del formulario
        $this->reset(['departamento', 'sucursal']);
        
        session()->flash('message', 'Departamento Agregado.');
    }

    public function redirigir()
    {
        return redirect()->route('mostrardepa');
    }

    public function render()
    {
        return view('livewire.portal-rh.departament.agregar-departament')->layout('layouts.client');
    }
}
