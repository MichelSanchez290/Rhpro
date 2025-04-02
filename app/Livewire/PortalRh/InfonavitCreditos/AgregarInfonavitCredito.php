<?php

namespace App\Livewire\PortalRh\InfonavitCreditos;

use Livewire\Component;
use App\Models\PortalRH\InfonavitCredito;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;

class AgregarInfonavitCredito extends Component
{
    public $infonavit = [], $sucursales=[], $departamentos=[], $users=[];
    public $empresas, $empresa, $sucursal, $departamento, $user_id;

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

    public function updatedDepartamento()
    {
        // Obtener los users del departamento seleccionado
        $this->users = Departamento::with('users')->where('id', $this->departamento)->get();
    }

    protected $rules = [
        'infonavit.tipo_movimiento' => 'required',
        'infonavit.numero_credito' => 'required',
        'infonavit.fecha_movimiento' => 'required|date',
        'infonavit.tipo_descuento' => 'required',
        'infonavit.valor_descuento' => 'required',

        'empresa' => 'required',
        'sucursal' => 'required',
        'departamento' => 'required',
        'user_id' => 'required|exists:users,id',
    ];

    protected $messages = [
        'infonavit.*.required' => 'Este campo es obligatorio.',
        'infonavit.fecha_movimiento.date' => 'Por favor agregue solo fechas.',

        'empresa.required' => 'Por favor seleccione una empresa.',
        'sucursal.required' => 'Por favor seleccione una sucursal.',
        'departamento.required' => 'Por favor seleccione un departamento.',
        'user_id.required' => 'Este campo es obligatorio.',
        'user_id.exists' => 'El usuario seleccionado no existe.',
    ];

    public function saveInfonavit()
    {
        $this->validate();

        $this->infonavit['user_id'] = $this->user_id;
        $nuevoInfonavit = InfonavitCredito::create($this->infonavit);

        $this->infonavit = [];

        session()->flash('message', 'Crédito Infonavit Agregado.');
    }

    public function redirigirInfonavit()
    {
        return redirect()->route('mostrarinfonavit');
    }


    public function render()
    {
        return view('livewire.portal-rh.infonavit-creditos.agregar-infonavit-credito')->layout('layouts.client');
    }
}
