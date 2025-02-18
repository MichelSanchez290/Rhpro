<?php

namespace App\Livewire\Crm\Leads;

use App\Models\Crm\CrmEmpresa;
use App\Models\Crm\EsmartLevantamiento;
use Livewire\Component;
use App\Models\Crm\LeadsCliente;
use App\Models\Crm\DatosFiscale;
use App\Models\Crm\LeadCliente;
use App\Models\Crm\HeadLevantamientosPedido;
use App\Models\Crm\Nom035Levpedido;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard\Duplicates;

class Vistaprincipal extends Component
{
    public $paginacion;
    public $duplicados = 1;
    public $consulta;
    public $empresas;
    //variable gobal para almacenar lead
    public $empresaSeleccionada,$fechaseleccionada;
    public $hlevped = [];
    public $nom035 = [];
    public $datosfis;
    public $consultahh;
    public $consultanom035;
    public $leadGlobal;
    public $lead = [];
    public $esmart = [[]];

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

    public function guardarEsmart()
    {
        for ($i=0; $i < $this->duplicados; $i++) 
        { 
            if (isset($esmart[$i])){
                $this->esmart[$i] = [];
            }
        }
        // Validar los datos del lead
        $this->validate([
            'lead.nombre_contacto' => 'required|string|max:255',
            'lead.numero_cliente' => 'required|string|max:255',
            'lead.fecha' => 'required|date',
            'lead.nombre_empresa' => 'required|string|max:50',
            'lead.puesto' => 'required|string|max:255',
            'lead.correo' => 'required|email|max:255',
            'lead.telefono' => 'required|string|max:10',
            'esmart.*.tamaño_empresa' => 'required|string|max:45',
            'esmart.*.primera_o_recompra' => 'required|string|max:45',
            'esmart.*.responsable_comercial' => 'required|string|max:255',
            'esmart.*.medio_cesrh' => 'required|string|max:255',
            'esmart.*.giro_empresa' => 'required|string|max:255',
            'esmart.*.ubicacion_empresa' => 'required|string|max:255',
            'esmart.*.fecha' => 'required|date',
        ]);
        

        // Guardar el lead
        $guardarlead = new LeadCliente($this->lead);
        

        $guardarlead->save();
        $this->leadGlobal = $guardarlead->id;

        foreach($this->esmart as $index => $esmartt){
            $this -> esmartt['leadcliente_id'] = $guardarlead->id;
            $this -> esmartt['users_id'] = Auth::id();
            $this -> esmartt['nombre_cliente'] = $this -> lead['nombre_contacto'];
            $this -> esmartt['nombre_empresa'] = $this -> lead['nombre_empresa'];
            $this -> esmartt['telefono_cliente'] = $this -> lead['telefono'];
            $this -> esmartt['correo_cliente'] = $this -> lead['correo'];
            $guardarSmart = new EsmartLevantamiento($esmartt);
            $guardarSmart->save();
        }

        // Guardar el registro de Esmart
        // $this->esmart['leadcliente_id'] = $guardarlead->id;
        // $this->esmart['users_id'] = Auth::id();


        session()->flash('message', 'Registros guardados correctamente.');
        return redirect()->to('crm/crm-leads'); // Cambia la ruta según tu necesidad
    }

    public function eliminarEsmart($indexR)
    {
        unset($this->esmart[$indexR]);
        $this->esmart = array_values($this->esmart);
        $this->duplicados--;
    }

    #[On('generarForms')]
    public function setDuplicados($cantidad)
    {
        $this->duplicados = $cantidad;
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