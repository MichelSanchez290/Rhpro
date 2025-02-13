<?php

namespace App\Livewire\Crm\LeadsCliente\Agregar;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Crm\LeadsCliente;
use App\Models\Crm\DatosFiscale;
use App\Models\User;

class AgregarLeadsCliente extends Component
{

    public $leadcliente = [];

    public $query, $user_id;

    protected $rules = [
        'leadcliente.nombre_contacto' => 'required',
        // 'leadcliente.users_id' => 'required|exists:users,id',
        'leadcliente.users_id' => 'exists:users_id',
        'leadcliente.numero_cliente' => 'required',
        'leadcliente.fecha' => 'required',
        'leadcliente.hora' => 'required',
        'leadcliente.datos_id' => 'required',
        'leadcliente.puesto' => 'required',
        'leadcliente.correo' => 'required',
        'leadcliente.telefono' => 'required',
        'leadcliente.tipo' => 'required',
    ];

    protected $messages = [
        'leadcliente.nombre_contacto.required' => 'Este campo no puede ser nulo',
        // 'leadcliente.user_id.required' => 'Este campo no puede ser nulo',
        'leadcliente.user_id.exists' => 'El usuario seleccionado no es válido',
        'leadcliente.numero_cliente.required' => 'Este campo no puede ser nulo',
        'leadcliente.fecha.required' => 'Este campo no puede ser nulo',
        'leadcliente.hora.required' => 'Este campo no puede ser nulo',
        'leadcliente.datos_id.required' => 'Este campo no puede ser nulo',
        'leadcliente.puesto.required' => 'Este campo no puede ser nulo',
        'leadcliente.correo.required' => 'Este campo no puede ser nulo',
        'leadcliente.telefono.required' => 'Este campo no puede ser nulo',
        'leadcliente.tipo.required' => 'Este campo no puede ser nulo',
    ];

    public function mount()
    {
        $this->query = LeadsCliente::get();
        $leadcliente['user_id'] = Auth::user()->id;
        $leadcliente['tipo'] = 'lead';
    }

    public function saveLeadCliente()
    {
        $this->validate([
            'leadcliente.user_id' => 'required|exists:users,id', // Asegúrate de que el user_id es válido
            'leadcliente.tipo' => 'required|string',
        ]);
        $AgregarLeadCliente = new LeadsCliente($this->leadcliente);
        $AgregarLeadCliente->save();

        $this->leadcliente=[];
    }

    public function render()
    {
        return view('livewire.crm.leads-cliente.agregar.agregar-leads-cliente',[
            // 'user' => User::get(),
            // 'user' => Auth::user()->id,
            'dato' => DatosFiscale::get()
        ])->layout('layouts.crm');
    }
}