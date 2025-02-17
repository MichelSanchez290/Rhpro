<?php

namespace App\Livewire\Crm\Leads;

use App\Models\Crm\CrmEmpresa;
use Livewire\Component;
use App\Models\Crm\LeadsCliente;
use App\Models\Crm\DatosFiscale;
use App\Models\Crm\LeadCliente;
use App\Models\Crm\HeadLevantamientosPedido;
use App\Models\Crm\Nom035Levpedido;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;

class Vistaprincipal extends Component
{
    public $paginacion;
    public $empresas, $empresaSeleccionada,$fechaseleccionada;
    public $lead = [];
    public $hlevped = [];
    public $nom035 = [];
    public $consulta,$datosfis;
    public $consultahh;
    public $consultanom035;

    protected $rules = [
        //TABLA LEADSCLIENTES
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
        //TABLA Head Levantamiento de pedidos
        'hlevped.responsable_comercial' => 'required',
        'hlevped.fecha' => 'required',
        'hlevped.nombre_cliente' => 'required',
        'hlevped.puesto' => 'required',
        'hlevped.empresa' => 'required',
        'hlevped.ubicacion_empresa' => 'required',
        'hlevped.tamano_empresa' => 'required',
        'hlevped.primera_vez_o_recompra' => 'required',
        'hlevped.medio_cesrh' => 'required',
        'hlevped.numero_vacantes' => 'required',
        'hlevped.operativas' => 'required',
        'hlevped.especializadas' => 'required',
        'hlevped.ejecutivas' => 'required',
        'hlevped.correo_cliente' => 'required',
        'hlevped.telefono' => 'required',
        'hlevped.status' => 'required',
        'hlevped.leadCli_id' => 'required',
        //TABLA NOM 035
        'nom035.nombre_cliente' => 'required',
        'nom035.nombre_empresa' => 'required',
        'nom035.giro_empresa' => 'required',
        'nom035.ubicacion_empresa' => 'required',
        'nom035.medio_cesrh' => 'required',
        'nom035.responsable_comercial' => 'required',
        'nom035.tipo_servicio' => 'required',
        'nom035.fecha' => 'required',
        'nom035.correo_cliente' => 'required',
        'nom035.telefono_cliente' => 'required',
        'nom035.leadsCli_id' => 'required',
        'nom035.users_id' => 'required',
        'nom035.035info_id	' => 'required',
    ];

    protected $messages = [
        //TABLA LEADSCLIENTES
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
        //TABLA Head Levantamiento de pedidos
        'hlevped.responsable_comercial' => 'required',
        'hlevped.fecha' => 'required',
        'hlevped.nombre_cliente' => 'required',
        'hlevped.puesto' => 'required',
        'hlevped.empresa' => 'required',
        'hlevped.ubicacion_empresa' => 'required',
        'hlevped.tamano_empresa' => 'required',
        'hlevped.primera_vez_o_recompra' => 'required',
        'hlevped.medio_cesrh' => 'required',
        'hlevped.numero_vacantes' => 'required',
        'hlevped.operativas' => 'required',
        'hlevped.especializadas' => 'required',
        'hlevped.ejecutivas' => 'required',
        'hlevped.correo_cliente' => 'required',
        'hlevped.telefono' => 'required',
        'hlevped.status' => 'required',
        'hlevped.leadCli_id' => 'required',
        //TABLA NOM 035
        'nom035.nombre_cliente' => 'required',
        'nom035.nombre_empresa' => 'required',
        'nom035.giro_empresa' => 'required',
        'nom035.ubicacion_empresa' => 'required',
        'nom035.medio_cesrh' => 'required',
        'nom035.responsable_comercial' => 'required',
        'nom035.tipo_servicio' => 'required',
        'nom035.fecha' => 'required',
        'nom035.correo_cliente' => 'required',
        'nom035.telefono_cliente' => 'required',
        'nom035.leadsCli_id' => 'required',
        'nom035.users_id' => 'required',
        'nom035.035info_id	' => 'required',
    ];

    public function mount()
    {
        $this->consulta = LeadCliente::get();
        $this->consultahh = HeadLevantamientosPedido::get();
        $this->consultanom035 = Nom035Levpedido::get();
        $this->empresas = CrmEmpresa::all();
        //dd($lead['users_id']);
        $this->lead['users_id'] = Auth::user()->id;
        $this->lead['hora'] = Carbon::now()->format('H:i:s');
        $this->lead['tipo'] = 'Lead';
        $this->paginacion = 0;
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

    public function saveHead()
    {
        $this->validate();
        $AgregarHead = new HeadLevantamientosPedido($this->hlevped);
        $AgregarHead->save();

        $this->hlevped=[];
    }

    public function saveNom035()
    {
        $this->validate();
        $AgregarNOM035 = new Nom035Levpedido($this->nom035);
        $AgregarNOM035->save();

        $this->nom035=[];
    }


    public function render()
    {
        return view('livewire.crm.leads.vistaprincipal')->layout('layouts.crm');
    }
}