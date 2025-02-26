<?php

namespace App\Livewire\Crm\Leads;

use App\Livewire\PortalRh\Sucursal\SucursalTable;
use App\Models\Crm\CrmEmpresa;
use App\Models\Crm\EsmartLevantamiento;
use Livewire\Component;
use App\Models\Crm\LeadsCliente;
use App\Models\Crm\DatosFiscale;
use App\Models\Crm\LeadCliente;
use App\Models\Crm\HeadLevantamientosPedido;
use App\Models\Crm\Nom035Levpedido;
use App\Models\Crm\TrainingLevantamiento;
use App\Models\PortalRH\Sucursal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Livewire;
use PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard\Duplicates;

use function PHPUnit\Framework\isNull;

class Vistaprincipal extends Component
{
    public $guardarlead, $nuevoEsmart = [], $nuevoTraining = [];
    public $paginacion;
    public $duplicados = 1;
    public $consulta;
    public $pedido_hh, $vacantes_hh;
    public $pedido;
    public $empresas;
    //variable gobal para almacenar lead
    public $empresaSeleccionada, $fechaseleccionada;
    public $hh = [], $nom035 = [], $lead = [], $esmart = [[]], $training = [];
    public $datosfis;
    public $consultahh;
    public $consultanom035;
    public $leadGlobal;
    public $recuperarLead;
    public $mostrarOperativo = false, $mostrarEspecializado = false, $mostrarEjecutivo = false;
    public $mensajesservicioshead = "¿Cuántos necesita?";
    public $show = false;
    public $totalvacantes;
    public $curso = [];
    public $v;

    protected $rules = [
        //TABLA LEADSCLIENTES
        'lead.numero_lead' => 'required',
        'lead.nombre_cliente' => 'required',
        'lead.medios_cesrh' => 'required',
        'lead.fecha_y_hora' => 'required',
        'lead.crm_empresas_id' => 'required',
        'lead.puesto' => 'required',
        'lead.correo' => 'required',
        'lead.telefono' => 'required',
        //'lead.tipo' => 'required',
        //TABLA Head Levantamiento de pedidos
        'hh.numero_lead' => 'required',
        'hh.nombre_cliente' => 'required',
        'hh.medios_cesrh' => 'required',
        'hh.fecha_y_hora' => 'required',
        'hh.puesto' => 'required',
        'hh.correo' => 'required',
        'hh.correo_2' => 'required',
        'hh.telefono' => 'required',
        'hh.telefono_2' => 'required',
        'hh.nombre_contacto_2' => 'required',
        'hh.puesto_contacto_2' => 'required',
        'hh.tipo' => 'required',
        'hh.tipo_servicio' => 'required',
        'hh.fecha' => 'required',
        'hh.hora' => 'required',
        'hh.total_vacantes' => 'required',
        'hh.numero_pedido' => 'required',
        'hh.users_id' => 'required',
        'hh.leads_clientes_id' => 'required',
        'hh.sucursales_id' => 'required',
        'hh.empresa_id' => 'required',
        //TABLA NOM 035
        'nom035.tipo_servicio.operativos' => 'boolean',
        'nom035.tipo_servicio.especializados' => 'boolean',
        'nom035.tipo_servicio.ejecutivos' => 'boolean',
        'nom035.fecha' => 'required',
        'nom035.hora' => 'required',
        // 'nom035.total_vacantes' => 'required',
        'nom035.operativos' => 'required',
        'nom035.especializados' => 'required',
        'nom035.ejecutivos' => 'required',
        'nom035.numero_pedido' => 'required',
        'nom035.users_id' => 'required',
        // esmart university
        'esmart.fecha' => 'required',
        'esmart.hora' => 'required',
        'esmart.numero_pedido' => 'required',
        'esmart.user_id' => 'required',
    ];

    public function mount()
    {
        // Establece el valor del numero de lead en 1 o le aumenta en 1 si ya no es nulo
        $this->consulta = LeadCliente::where('tipo', 'lead')->orderBy('id', 'desc')->first();
        if (empty($this->consulta)) {
            $this->lead['numero_lead'] = 1;
        } else {
            $this->lead['numero_lead'] = $this->consulta->numero_lead + 1;
        }

        $this->consultasumahh = DB::select("SELECT campo1, campo2, campo3, (campo1 + campo2 + campo3) AS resultado FROM tabla_original");

        // Establece el valor del numero de pedido para head hunting en 1 o le aumenta en 1 si ya no es nulo

        $this->pedido_hh = HeadLevantamientosPedido::where('numero_pedido')->orderBy('id', 'desc')->first();
        if (empty($this->pedido_hh)) {
            $this->hh['numero_pedido'] = 1;
        } else {
            $this->hh['numero_pedido'] = $this->pedido_hh->numero_pedido + 1;
        }

        // Establece el valor del numero de pedido para esmart en 1 o le aumenta en 1 si ya no es nulo

        $this->pedido = EsmartLevantamiento::where('numero_pedido')->orderBy('id', 'desc')->first();
        if (empty($this->pedido)) {
            $this->esmart['numero_pedido'] = 1;
        } else {
            $this->esmart['numero_pedido'] = $this->pedido->numero_pedido + 1;
        }

        $this->empresas = CrmEmpresa::all();

        $this->lead['users_id'] = Auth::user()->id;
        $this->lead['fecha_y_hora'] = Carbon::now()->format('Y-m-d H:s:i');
        $this->lead['tipo'] = 'Lead';

        $this->esmart['users_id'] = Auth::user()->id;
        $this->esmart['fecha_y_hora'] = Carbon::now()->format('Y-m-d H:s:i');
        $this->esmart['tipo'] = 'Lead';

        $this->hh['fecha_y_hora'] = Carbon::now()->format('Y-m-d H:s:i');
        $this->hh['users_id'] = Auth::user()->id;
        $this->hh['tipo'] = 'Lead';
        $this->hh['total_vacantes'] = 1;

        $this->paginacion = 0;
        $this->curso = 0;
    }

    public function guardarEsmart()
    {
        for ($i = 0; $i < $this->duplicados; $i++) {
            if (isset($esmart[$i])) {
                $this->esmart[$i] = [];
            }
        }

        $this->validate([
            'lead.nombre_contacto' => 'required|string|max:255',
            'lead.numero_cliente' => 'required|string|max:255',
            'lead.fecha' => 'required|date',
            'lead.nombre_empresa' => 'required|string|max:50',
            'lead.puesto' => 'required|string|max:255',
            'lead.correo' => 'required|email|max:255',
            'lead.telefono' => 'required|string|max:10',
            'esmart.*.tamaño_empresa' => 'required|string|max:45',
            'esmart.*.numero_pedido' => 'required|dacimal',
            'esmart.*.fecha' => 'required|date',

        ]);


        // Guardar el lead
        $guardarlead = new LeadCliente($this->lead);


        $guardarlead->save();
        $this->leadGlobal = $guardarlead;

        foreach ($this->esmart as $index => $esmartt) {
            $this->esmartt['leadcliente_id'] = $guardarlead->id;
            $this->esmartt['users_id'] = Auth::id();

            $guardarSmart = new EsmartLevantamiento($esmartt);
            $guardarSmart->save();
        }

        session()->flash('message', 'Registros guardados correctamente.');
        return redirect()->to('crm/crm-leads'); // Cambia la ruta según tu necesidad
    }

    public function eliminarEsmart($indexR)
    {
        unset($this->esmart[$indexR]);
        $this->esmart = array_values($this->esmart);
        $this->duplicados--;
    }

    public function guardarTraininig()
    {
        for ($i = 0; $i < $this->duplicados; $i++) {
            if (isset($training[$i])) {
                $this->training[$i] = [];
            }
        }

        $this->validate([
            'lead.nombre_contacto' => 'required|string|max:255',
            'lead.numero_cliente' => 'required|string|max:255',
            'lead.fecha' => 'required|date',
            'lead.nombre_empresa' => 'required|string|max:50',
            'lead.puesto' => 'required|string|max:255',
            'lead.correo' => 'required|email|max:255',
            'lead.telefono' => 'required|string|max:10',
            'training.*.tamaño_empresa' => 'required|string|max:45',
            'training.*.primera_vez_o_recompra' => 'required|string|max:45',
            'training.*.responsable_comercial' => 'required|string|max:255',
            'training.*.medio_cesrh' => 'required|string|max:255',
            'training.*.giro_empresa' => 'required|string|max:255',
            'training.*.ubicacion_empresa' => 'required|string|max:255',
            'training.*.fecha' => 'required|date',
        ]);

        // Guardar el lead
        $guardarlead = new LeadCliente($this->lead);
        $guardarlead->save();
        $this->leadGlobal = $guardarlead;


        foreach ($this->traininig as $index => $nuevoTraining) {

            $nuevoTraining['users_id'] = Auth::id();
            $nuevoTraining['leadsCli_id'] = $this->lead['id'];
            $nuevoTraining['nombre_cliente'] = $this->lead['nombre_contacto'];
            $nuevoTraining['nombre_empresa'] = $this->lead['nombre_empresa'];
            $nuevoTraining['telefono_cliente'] = $this->lead['telefono'];
            $nuevoTraining['correo_cliente'] = $this->lead['correo'];

            $guardarSmart = new TrainingLevantamiento($nuevoTraining);
            $guardarSmart->save();
        }

        session()->flash('message', 'Registros guardados correctamente.');
        return redirect()->to('crm/crm-leads'); // Cambia la ruta según tu necesidad
    }

    public function eliminarTraining($indexR)
    {
        unset($this->training[$indexR]);
        $this->training = array_values($this->training);
        $this->duplicados--;
    }


    public function botonborrar()
    {
        $this->dispatch('boton',);
    }

    #[On('generarForms')]
    public function setDuplicados($cantidad)
    {
        $this->duplicados = $cantidad;
    }

    public function nuevo()
    {
        $this->curso = 1;
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
        $this->validate([
            'lead.numero_lead' => 'required',
            'lead.nombre_cliente' => 'required',
            'lead.medios_cesrh' => 'required',
            'lead.fecha_y_hora' => 'required',
            'lead.crm_empresas_id' => 'required',
            'lead.puesto' => 'required',
            'lead.correo' => 'required',
            'lead.telefono' => 'required',
        ]);
        $AgregarLead = new LeadCliente($this->lead);
        $AgregarLead->save();
        $this->recuperarLead = $AgregarLead;
        // return redirect()->route('Leads');

        //para poder ocupar elemento banner que dice que ya agrego
        $this->dispatch('message');
    }

    public function saveHead()
    {
        dd($this->hh);
        // dd($this->op);
        //Si el checkbox es true, asígnale la cadena de texto operativo, especializado o ejecutivo
        if ($this->mostrarOperativo == true) {
            $this->hh['tipo_servicio'] = 'operativo';
        }

        if ($this->mostrarEspecializado == true) {
            $this->hh['tipo_servicio'] = 'especializado';
        }

        if ($this->mostrarEjecutivo == true) {
            $this->hh['tipo_servicio'] = 'ejecutivo';
        }
        $this->validate();
        $this->hh['total_vacantes'] =  $this->hh['operativos']+$this->hh['especializados']+$this->hh['ejecutivos'];
        $this->totalvacantes = $this->hh['total_vacantes'];
        foreach ($this->hh as $index => $head) {
            $head['numero_lead'] = $this->recuperarLead->numero_lead;
            $head['nombre_cliente'] = $this->recuperarLead->nombre_cliente;
            $head['medios_cesrh'] = $this->recuperarLead->medios_cesrh;
            $head['puesto'] = $this->recuperarLead->puesto;
            $head['correo'] = $this->recuperarLead->correo;
            $head['correo_2'] = $this->recuperarLead->correo_2;
            $head['telefono'] = $this->recuperarLead->telefono;
            $head['telefono'] = $this->recuperarLead->telefono_2;
            $head['nombre_contacto_2'] = $this->recuperarLead->nombre_contacto_2;
            $head['puesto_contacto_2'] = $this->recuperarLead->puesto_contacto_2;
            $head['empresa'] = $this->recuperarLead->datos_id;
            $head['leadCli_id'] = $this->recuperarLead->id;
            $head['sucursales_id'] = $this->recuperarLead->id;
            $AgregarLeadenHead = new HeadLevantamientosPedido($head);
            $AgregarLeadenHead->save();
        }
        // foreach($this->hh as $index => $vacante){
        //     $this->v=$vacante['total_vacantes']=$vacante['operativos']+$vacante['especializados']+$vacante['ejecutivos'];
        // }
        // $this->op = $this->hh['operativos'];
        // $this->esp = $this->hh['especializados'];
        // $this->eje = $this->hh['ejecutivos'];
        // $this->hh['total_vacantes']=$this->sumacampos;
        $AgregarHead = new HeadLevantamientosPedido();
        $AgregarHead->save();
    }


    public function saveNom035()
    {
        $this->validate([
            'nom035.tipo_servicio.operativos' => 'boolean',
            'nom035.tipo_servicio.especializados' => 'boolean',
            'nom035.tipo_servicio.ejecutivos' => 'boolean',
            'nom035.fecha' => 'required',
            'nom035.hora' => 'required',
            'nom035.total_vacantes' => 'required',
            'nom035.operativos' => 'required',
            'nom035.especializados' => 'required',
            'nom035.ejecutivos' => 'required',
            'nom035.numero_pedido' => 'required',
            'nom035.users_id' => 'required',
        ]);
        $AgregarNOM035 = new Nom035Levpedido($this->nom035);
        $AgregarNOM035->save();

        $this->nom035 = [];
    }


    public function render()
    {
        return view('livewire.crm.leads.vistaprincipal', [
            'sucursales' => Sucursal::get()
        ])->layout('layouts.crm');
    }
}
