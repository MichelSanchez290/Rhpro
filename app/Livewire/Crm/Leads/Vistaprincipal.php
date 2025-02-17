<?php

namespace App\Livewire\Crm\Leads;

use App\Models\Crm\CrmEmpresa;
use App\Models\Crm\EsmartLevantamiento;
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
    public $consulta;
    public $empresas;
    //variable gobal para almacenar lead
    public $leadGlobal;
    public $lead = [];
    public $esmart = [
        'tamaño_empresa' => '',
        'primera_o_recompra' => '',
        'responsable_comercial' => '',
        'medio_cesrh' => '',
        'giro_empresa' => '',
        'ubicacion_empresa' => '',
        'fecha' => '',
    ];
    
    public function mount()
    {
        $this->consulta = LeadCliente::get();
        $this->empresas = CrmEmpresa::all();
        //dd($lead['users_id']);
        $this->lead['users_id'] = Auth::user()->id;
        $this->lead['hora']= Carbon::now()->format('H:i:s');
        $this->lead['tipo']= 'Lead';
        $this->paginacion = 0;
    }

    public function guardarEsmart()
    {
        // Validar los datos del lead
        $this->validate([
            'lead.nombre_contacto' => 'required|string|max:255',
            'lead.numero_cliente' => 'required|string|max:255',
            'lead.fecha' => 'required|date',
            'lead.nombre_empresa' => 'required|string|max:50',
            'lead.puesto' => 'required|string|max:255',
            'lead.correo' => 'required|email|max:255',
            'lead.telefono' => 'required|string|max:10',
            'esmart.tamaño_empresa' => 'required|string|max:45',
            'esmart.primera_o_recompra' => 'required|string|max:45',
            'esmart.responsable_comercial' => 'required|string|max:255',
            'esmart.medio_cesrh' => 'required|string|max:255',
            'esmart.giro_empresa' => 'required|string|max:255',
            'esmart.ubicacion_empresa' => 'required|string|max:255',
            'esmart.fecha' => 'required|date',
        ]);


        // Guardar el lead
        $guardarlead = new LeadCliente($this->lead);
        $this -> esmart['nombre_cliente'] = $this -> lead['nombre_contacto'];
        $this -> esmart['nombre_empresa'] = $this -> lead['nombre_empresa'];
        $this -> esmart['telefono_cliente'] = $this -> lead['telefono'];
        $this -> esmart['correo_cliente'] = $this -> lead['correo'];

        $guardarlead->save();
        $this->leadGlobal = $guardarlead->id;

        // Guardar el registro de Esmart
        $this->esmart['leadcliente_id'] = $guardarlead->id;
        $this->esmart['users_id'] = Auth::id();
        $guardarSmart = new EsmartLevantamiento($this->esmart);
        $guardarSmart->save();


        session()->flash('message', 'Registros guardados correctamente.');
        return redirect()->to('crm/crm-leads'); // Cambia la ruta según tu necesidad
    }

    public function otroEsmart()
    {
        $this->validate([
            'lead.nombre_contacto' => 'required|string|max:255',
            'lead.numero_cliente' => 'required|string|max:255',
            'lead.fecha' => 'required|date',
            'lead.nombre_empresa' => 'required|string|max:50',
            'lead.puesto' => 'required|string|max:255',
            'lead.correo' => 'required|email|max:255',
            'lead.telefono' => 'required|string|max:10',
            'esmart.tamaño_empresa' => 'required|string|max:45',
            'esmart.primera_o_recompra' => 'required|string|max:45',
            'esmart.responsable_comercial' => 'required|string|max:255',
            'esmart.medio_cesrh' => 'required|string|max:255',
            'esmart.giro_empresa' => 'required|string|max:255',
            'esmart.ubicacion_empresa' => 'required|string|max:255',
            'esmart.fecha' => 'required|date',
        ]);


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

    // public function saveLead()
    // {
    //     $this->validate();
    //     $AgregarLead = new LeadCliente($this->lead);
    //     $AgregarLead->save();

    //     $this->lead=[];
    // }


    public function render()
    {
        return view('livewire.crm.leads.vistaprincipal')->layout('layouts.crm');
    }
}