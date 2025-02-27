<?php

namespace App\Livewire\Crm\Leads;

use App\Models\Crm\CrmCurso;
use App\Livewire\PortalRh\Sucursal\SucursalTable;
use App\Models\Crm\CrmEmpresa;
use App\Models\Crm\EsmartLevantamiento;
use Livewire\Component;
use App\Models\Crm\LeadsCliente;
use App\Models\Crm\DatosFiscale;
use App\Models\PortalRH\Sucursal;
use App\Models\Crm\LeadCliente;
use App\Models\Crm\HeadLevantamientosPedido;
use App\Models\Crm\Nom035Levpedido;
use App\Models\Crm\TrainingLevantamiento;
use App\Models\EsmartUniversity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Livewire;
use PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard\Duplicates;

use function PHPUnit\Framework\isNull;

class Vistaprincipal extends Component
{
    public $guardarlead, $nuevoEsmart = [];
    public $paginacion;
    public $duplicados = 1;
    public $consulta;
    public $pedido_hh, $vacantes_hh;
    public $pedido;
    public $empresas;
    //variable gobal para almacenar lead
    public $empresaSeleccionada, $fechaseleccionada;
    public $hh = [], $nom035 = [], $lead = [], $esmart = [], $training = [];
    public $datosfis;
    public $consultahh;
    public $consultanom035;
    public $leadGlobal;
    public $recuperarLead;
    public $mostrarOperativo = false, $mostrarEspecializado = false, $mostrarEjecutivo = false, $op, $esp, $eje;
    public $mensajesservicioshead = "¿Cuántos necesita?";
    public $show = false;
    public $totalvacantes, $consultasumahh;
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

        // University ----------------------
        'university.nombre_curso'=> 'required',
        'university.participantes'=> 'required',
        'university.departamentos_participan'=> 'required',
        'university.puestos_participan'=> 'required',
        'university.fecha_habilitada'=> 'required',
        'university.dc3_requieren'=> 'required',
        'university.nuevo_existente'=> 'required',
        'university.nuevo_curso'=> 'required',
        'university.horas_nuevo'=> 'required',
        'university.tipo_curso'=> 'required',
        // ---------------------------------

        // Cursos Trainig ------------------
        'training.nombre_curso' => 'required',
        'training.modalidad' => 'required',
        'training.participantes' => 'required',
        'training.grupos' => 'required',
        'training.puestos_participantes' => 'required',
        'training.experiencia' => 'required',
        'training.cual' => 'required',
        'training.objetivo_curso' => 'required',
        'training.fecha_tentativa' => 'required',
        'training.presupuesto' => 'required',
        // ---------------------------------

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

        // $this->consultanom035 = Nom035Levpedido::get();
        // $this->consultasumahh = DB::select("SELECT campo1, campo2, campo3, (campo1 + campo2 + campo3) AS resultado FROM tabla_original");

        // Establece el valor del numero de pedido para head hunting en 1 o le aumenta en 1 si ya no es nulo

        $this->pedido_hh = HeadLevantamientosPedido::where('numero_pedido')->orderBy('id', 'desc')->first();
        if (empty($this->pedido_hh)) {
            $this->hh['numero_pedido'] = 1;
        } else {
            $this->hh['numero_pedido'] = $this->pedido_hh->numero_pedido + 1;
        }

        $this->empresas = CrmEmpresa::all();
        $this->training['fecha_y_hora'] = Carbon::now()->format('Y-m-d H:s:i');

        $this->lead['users_id'] = Auth::user()->id;
        $this->lead['fecha_y_hora'] = Carbon::now()->format('Y-m-d H:s:i');
        $this->lead['tipo'] = 'Lead';
        $this->lead['users_id'] = Auth::user()->id;

        $this->hh['fecha_y_hora'] = Carbon::now()->format('Y-m-d H:s:i');
        $this->hh['users_id'] = Auth::user()->id;
        $this->hh['tipo'] = 'Lead';

        $this->paginacion = 2;
        $this->curso = 'existente';

        $this->paginacion = 0;
        $this->curso = 0;
    }

    public function guardarEsmart()
    {
        $this->validate([
            'lead.nombre_cliente' => 'required|string|max:255',
            'lead.medios_cesrh' => 'required|string|max:255',
            'lead.numero_lead' => 'required|numeric',
            'lead.crm_empresas_id' => 'required|exists:crm_empresas,id',
            'lead.puesto' => 'required|string|max:255',
            'lead.telefono' => 'required|numeric',
            'lead.correo' => 'required|email|max:255',
            'lead.nombre_contacto_2' => 'nullable|string|max:255',
            'lead.puesto_contacto_2' => 'nullable|string|max:255',
            'lead.correo_2' => 'nullable|email|max:255',
            'lead.telefono_2' => 'nullable|numeric',
            'university.nombre_curso' => 'required|string|max:255',
            'university.participantes' => 'required|string|max:255',
            'university.departamentos_participan' => 'required|string|max:255',
            'university.puestos_participan' => 'required|string|max:255',
            'university.fecha_habilitada' => 'required|date',
            'university.dc3_requieren' => 'required|string|max:255',
            'university.nuevo_existente' => 'nullable|string|max:255',
            'university.nuevo_curso' => 'nullable|string|max:255',
            'university.horas_nuevo' => 'nullable|numeric',
            'university.tipo_curso' => 'nullable|string|max:255',
        ]);

       $ultimoPedido = EsmartLevantamiento::orderBy('numero_pedido','desc')->first();
       if (empty($ultimoPedido)) {
        $numeroPedido = 1;
       } else {
        $numeroPedido = $ultimoPedido -> numero_pedido + 1;
       }


        $fechaActual = Carbon::now()->toDateString();
        $horaActual = Carbon::now()->toTimeString();
        // Asignar el ID generado a EsmartUniversity
        //  $this->university['esmart_levantamientos_id'] = $lead->id;
        EsmartLevantamiento::create([
            'fecha'=> $fechaActual,
            'hora'=> $horaActual,
            // 'leads_clientes_id'=> $this->lead['leads_clientes_id'],
            // 'sucursales_id'=> auth()->user()->id,
            // 'empresa_id'=> auth()->user()->id,
            'users_id'=> auth()->user()->id,
            'numero_pedido' => $numeroPedido,
            'nombre_cliente' => $this->lead['nombre_cliente'] ?? null,
            'medios_cesrh'=> $this->lead['medios_cesrh'] ?? null,
            'numero_lead'=> $this->lead['numero_lead'] ?? null,
            'crm_empresas_id'=> $this->lead['crm_empresas_id'] ?? null,
            'puesto'=> $this->lead['puesto'] ?? null,
            'telefono'=> $this->lead['telefono'] ?? null,
            'correo'=> $this->lead['correo'] ?? null,
            'nombre_contacto_2'=> $this->lead['nombre_contacto_2'] ?? null,
            'puesto_contacto_2'=> $this->lead['puesto_contacto_2'] ?? null,
            'correo_2'=> $this->lead['correo_2'] ?? null,
            'telefono_2'=> $this->lead['telefono_2'] ?? null,
        ]);

        // $Uni = EsmartUniversity::create($this->university);
        EsmartUniversity::create([
            'nombre_curso'=> $this->university['nombre_curso'] ?? null,
            'participantes'=> $this->university['participantes'] ?? null,
            'departamentos_participan'=> $this->university['departamentos_participan'] ?? null,
            'puestos_participan'=> $this->university['puestos_participan'] ?? null,
            'fecha_habilitada'=> $this->university['fecha_habilitada'] ?? null,
            'dc3_requieren'=> $this->university['dc3_requieren'] ?? null,
            'nuevo_existente'=> $this->university['nuevo_existente'] ?? null,
            'nuevo_curso'=> $this->university['nuevo_curso'] ?? null,
            'horas_nuevo'=> $this->university['horas_nuevo'] ?? null,
            'tipo_curso'=> $this->university['tipo_curso'] ?? null,
            // 'esmart_levantamiento_id' => $lead->id,
        ]);

        session()->flash('message', 'Datos guardados correctamente');
        $this->reset(['university']);
    }

    // public function eliminarEsmart($indexR)
    // {
    //     unset($this->esmart[$indexR]);
    //     $this->esmart = array_values($this->esmart);
    //     $this->duplicados--;
    // }

    public function guardarTraining()
    {
        // dd($this->training);
        $this->validate([
            'lead.nombre_cliente' => 'required|string|max:255',
            'lead.medios_cesrh' => 'required|string|max:255',
            'lead.numero_lead' => 'required|numeric',
            'lead.crm_empresas_id' => 'required|exists:crm_empresas,id',
            'lead.puesto' => 'required|string|max:255',
            'lead.telefono' => 'required|numeric',
            'lead.correo' => 'required|email|max:255',
            'lead.nombre_contacto_2' => 'nullable|string|max:255',
            'lead.puesto_contacto_2' => 'nullable|string|max:255',
            'lead.correo_2' => 'nullable|email|max:255',
            'lead.telefono_2' => 'nullable|numeric',
            'training.nombre_curso' => 'required|string|max:255',
            'training.modalidad' => 'required|string|max:255',
            'training.participantes' => 'required|string|max:255',
            'training.grupos' => 'required|string|max:255',
            'training.puestos_participantes' => 'required|string|max:255',
            'training.experiencia' => 'required|string|max:255',
            'training.cual' => 'required|string|max:255',
            'training.objetivo_curso' => 'required|string|max:255',
            'training.fecha_tentativa' => 'required|date',
            'training.presupuesto' => 'required|string|max:255',
        ]);
        $ultimoPedido = TrainingLevantamiento::orderBy('numero_pedido','desc')->first();
        if (empty($ultimoPedido)) {
            $numeroPedido = 1;
        } else {
            $numeroPedido = $ultimoPedido -> numero_pedido + 1;
        }


        $fechaActual = Carbon::now()->toDateString();
        $horaActual = Carbon::now()->toTimeString();

        TrainingLevantamiento::create([
            'fecha' => $fechaActual,
            'hora'=> $horaActual,
            // 'sucursales_id'=> auth()->user()->id,
            // 'empresa_id'=> auth()->user()->id,
            'numero_pedido' => $numeroPedido,
            'users_id'=> auth()->user()->id,
            'nombre_cliente' => $this->lead['nombre_cliente'] ?? null,
            'medios_cesrh'=> $this->lead['medios_cesrh'] ?? null,
            'numero_lead'=> $this->lead['numero_lead'] ?? null,
            'crm_empresas_id'=> $this->lead['crm_empresas_id'] ?? null,
            'puesto'=> $this->lead['puesto'] ?? null,
            'telefono'=> $this->lead['telefono'] ?? null,
            'correo'=> $this->lead['correo'] ?? null,
            'nombre_contacto_2'=> $this->lead['nombre_contacto_2'] ?? null,
            'puesto_contacto_2'=> $this->lead['puesto_contacto_2'] ?? null,
            'correo_2'=> $this->lead['correo_2'] ?? null,
            'telefono_2'=> $this->lead['telefono_2'] ?? null,
        ]);

        CrmCurso::create([
            'nombre_curso'=> $this->training['nombre_curso'] ?? null,
            'modalidad'=> $this->training['modalidad'] ?? null,
            'participantes'=> $this->training['participantes'] ?? null,
            'grupos'=> $this->training['grupos'] ?? null,
            'puestos_participantes'=> $this->training['puestos_participantes'] ?? null,
            'experiencia'=> $this->training['experiencia'] ?? null,
            'cual'=> $this->training['cual'] ?? null,
            'objetivo_curso'=> $this->training['objetivo_curso'] ?? null,
            'fecha_tentativa'=> $this->training['fecha_tentativa'] ?? null,
            'presupuesto'=> $this->training['presupuesto'] ?? null,
        ]);

        session()->flash('message', 'Datos guardados correctamente');
        $this->reset(['training']);
    }

    // public function eliminarTraining($indexR)
    // {
    //     unset($this->training[$indexR]);
    //     $this->training = array_values($this->training);
    //     $this->duplicados--;
    // }


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
            $this->hh['operativos'] = $this->op;
            $this->hh['especializados'] = $this->esp;
            $this->hh['ejecutivos'] = $this->eje;
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
