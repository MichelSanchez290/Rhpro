<?php

namespace App\Livewire\Crm\Leads;

use Livewire\Component;
use App\Models\Crm\LeadsCliente;
use App\Models\Crm\DatosFiscale;
use App\Models\Crm\LeadCliente;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;

class Vistaprincipal extends Component
{
    public $paginacion;
    public $lead = [];
    public $consulta,$datosfis;

    protected $rules = [
        'lead.nombre_contacto' => 'required',
        'lead.users_id' => 'required',
        //'lead.users_id' => 'required',
        'lead.numero_cliente' => 'required',
        'lead.fecha' => 'required',
        // 'lead.hora' => 'required',
        'lead.datos_id' => 'required',
        'lead.puesto' => 'required',
        'lead.correo' => 'required',
        'lead.telefono' => 'required',
        //'lead.tipo' => 'required',
    ];

    protected $messages = [
        'lead.nombre_contacto.required' => 'Nombre requerido',
        'lead.users_id.required' => 'Usuario requerido',
        //'lead.users_id' => 'Usuario no encontrado',
        'lead.numero_cliente.required' => 'Numero de cliente requerido',
        'lead.fecha.required' => 'Fecha requerida',
        // 'lead.hora.required' => 'Hora requerida',
        'lead.datos_id.required' => 'Nombre de la razon social requerida',
        'lead.puesto.required' => 'Puesto requerido',
        'lead.correo.required' => 'Correo requerido',
        'lead.telefono.required' => 'Número telefónico requerido',
        //'lead.tipo' => 'Tipo requerido',
    ];

    public function mount()
    {
        $this->consulta = LeadCliente::get();
        $this->datosfis = DatosFiscale::get();
        //dd($lead['users_id']);
        $this->lead['users_id'] = Auth::user()->id;
        $this->lead['tipo']= 'Lead';
        $this->paginacion = 1;
    }

    public function uno()
    {
        $this->paginacion = 1;
    }
    public function dos()
    {
        $this->paginacion = 2;
    }

    public function tres()
    {
        $this->paginacion = 3;
    }

    public function cuatro()
    {
        $this->paginacion = 4;
    }

    public function saveLead()
    {
        $this->validate();
        $AgregarLead = new LeadCliente($this->lead);
        $AgregarLead->save();

        $this->lead=[];
    }


    public function render()
    {
        return view('livewire.crm.leads.vistaprincipal')->layout('layouts.crm');
    }
}