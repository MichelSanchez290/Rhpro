<?php

namespace App\Livewire\Dx035\Encuestas;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Dx035\Encuesta;
use App\Models\Dx035\Cuestionario;

use App\Models\PortalRH\Empres;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\SucursalDepartament;
use App\Models\PortalRH\EmpresSucursal;

use Illuminate\Support\Str;

class AgregarEncuesta extends Component
{
    use WithFileUploads;

    // Propiedades para empresa, sucursal y departamento
    public $empresa; // Declarar la propiedad empresa
    public $sucursal; // Declarar la propiedad sucursal
    public $departamento; // Declarar la propiedad departamento
    public $sucursales=[];
    public $empresas=[];
    public $departamentos=[];
    public $cuestionarios;


    public $Actividades, $sucursalDepartamentId;
    public $FechaInicio, $FechaFinal, $NumeroEncuestas;
    public $cuestionariosSeleccionados = [];
    public $logo;

    // Reglas de validación
    protected $rules = [
        'empresa' => 'required|exists:empresas,id',
        'sucursal' => 'required|exists:sucursales,id',
        'departamento' => 'required|exists:departamentos,id',
        'Actividades' => 'required|string',
        'FechaInicio' => 'required|date',
        'FechaFinal' => 'required|date|after_or_equal:FechaInicio',
        'NumeroEncuestas' => 'required|integer|min:1',
        'cuestionariosSeleccionados' => 'required|array|min:1',
        'logo' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        // Inicializar el array de cuestionarios seleccionados
        $this->cuestionarios = Cuestionario::get();
        foreach ($this->cuestionarios as $cuestionario) {
            $this->cuestionariosSeleccionados[$cuestionario->id] = false;
        }

        $this->empresas = Empres::get();

    }

    public function submit()
    {
        $this->validate();

        // Obtener la relación sucursal-departamento
        $sucursalDepartament = SucursalDepartament::where('sucursal', $this->sucursal)
            ->where('departamento', $this->departamento)
            ->first();

        if (!$sucursalDepartament) {
            session()->flash('error', 'No se encontró la relación sucursal-departamento.');
            return;
        }

        // Generar la clave automáticamente
        $clave = Str::uuid()->toString();

        // Guardar el logo si se proporciona
        $rutaLogo = null;
        if ($this->logo) {
            $rutaLogo = $this->logo->store('logos', 'public');
        }

        // Obtener los IDs de los cuestionarios seleccionados
        $cuestionariosSeleccionadosIds = [];
        foreach ($this->cuestionariosSeleccionados as $cuestionarioId => $seleccionado) {
            if ($seleccionado) {
                $cuestionariosSeleccionadosIds[] = $cuestionarioId;
            }
        }

        // Crear la encuesta
        $encuesta = Encuesta::create([
            'Clave' => $clave,
            'Empresa' => Empres::find($this->empresa)->nombre, // Obtener el nombre de la empresa
            'Actividades' => $this->Actividades,
            'sucursal_departament_id' => $sucursalDepartament->id,
            'FechaInicio' => $this->FechaInicio,
            'FechaFinal' => $this->FechaFinal,
            'NumeroEncuestas' => $this->NumeroEncuestas,
            'Formato' => implode(',', $cuestionariosSeleccionadosIds),
            'RutaLogo' => $rutaLogo,
            'Estado' => 0, // Por defecto, la encuesta está cerrada
        ]);

        // Guardar los cuestionarios seleccionados en la tabla pivote
        $encuesta->cuestionarios()->attach($cuestionariosSeleccionadosIds);

        session()->flash('message', 'Encuesta creada correctamente.');
        return redirect()->route('encuesta.index');
    }

    public function updatedEmpresa()
    {

        $this->sucursales=Empres::with('sucursales')->where('id',$this->empresa)->get();
    }

    public function render()
    {
        // // Obtener todas las empresas
        // $empresas = \App\Models\PortalRH\Empres::all();

        // // Obtener las sucursales relacionadas con la empresa seleccionada
        // $sucursales = [];
        // if ($this->empresa) {
        //     // Obtener las relaciones empresa-sucursal para la empresa seleccionada
        //     $empresasSucursales = \App\Models\PortalRH\EmpresSucursal::where('empresa', $this->empresa)->get();

        //     // Obtener las sucursales relacionadas
        //     foreach ($empresasSucursales as $empresaSucursal) {
        //         $sucursal = \App\Models\PortalRH\Sucursal::find($empresaSucursal->sucursal);
        //         if ($sucursal) {
        //             $sucursales[] = $sucursal;
        //         }
        //     }
        // }

        // // Obtener los departamentos relacionados con la sucursal seleccionada
        // $departamentos = [];
        // if ($this->sucursal) {
        //     // Obtener las relaciones sucursal-departamento para la sucursal seleccionada
        //     $sucursalesDepartamentos = \App\Models\PortalRH\SucursalDepartament::where('sucursal', $this->sucursal)->get();

        //     // Obtener los departamentos relacionados
        //     foreach ($sucursalesDepartamentos as $sucursalDepartamento) {
        //         $departamento = \App\Models\PortalRH\Departament::find($sucursalDepartamento->departamento);
        //         if ($departamento) {
        //             $departamentos[] = $departamento;
        //         }
        //     }
        // }

        // Obtener todos los cuestionarios
        // $cuestionarios = Cuestionario::all();

        return view('livewire.dx035.encuestas.agregar-encuesta')
            ->layout('layouts.dx035');
    }
}
