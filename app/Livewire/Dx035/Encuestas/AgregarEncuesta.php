<?php

namespace App\Livewire\Dx035\Encuestas;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Dx035\Encuesta;
use App\Models\Dx035\Cuestionario;

use App\Models\PortalRH\Departament;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\SucursalDepartament;

use Illuminate\Support\Str;

class AgregarEncuesta extends Component
{
    use WithFileUploads;

    public $Empresa, $Actividades, $sucursalDepartamentId;
    public $FechaInicio, $FechaFinal, $NumeroEncuestas;
    public $cuestionariosSeleccionados = [];
    public $logo;

    protected $rules = [
        'Empresa' => 'required|string',
        'Actividades' => 'required|string',
        'sucursalDepartamentId' => 'required|exists:sucursal_departament,id',
        'FechaInicio' => 'required|date',
        'FechaFinal' => 'required|date|after_or_equal:FechaInicio',
        'NumeroEncuestas' => 'required|integer|min:1',
        'cuestionariosSeleccionados' => 'required|array|min:1',
        'logo' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        // Inicializar el array de cuestionarios seleccionados
        $cuestionarios = Cuestionario::all();
        foreach ($cuestionarios as $cuestionario) {
            $this->cuestionariosSeleccionados[$cuestionario->id] = false;
        }
    }

    public function submit()
    {
        $this->validate();

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
            'Empresa' => $this->Empresa,
            'Actividades' => $this->Actividades,
            'sucursal_departament_id' => $this->sucursalDepartamentId,
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

    public function render()
    {
        // Obtener todas las relaciones sucursal-departamento
        $sucursalDepartamentos = SucursalDepartament::all();

        // Obtener las sucursales y departamentos relacionados 
        $sucursales = [];
        $departamentos = [];

        foreach ($sucursalDepartamentos as $sucursalDepartamento) {
            $sucursal = \App\Models\PortalRH\Sucursal::find($sucursalDepartamento->sucursal_id);
            $departamento = \App\Models\PortalRH\Departament::find($sucursalDepartamento->departamento_id);

            if ($sucursal && $departamento) {
                $sucursalDepartamento->sucursal_nombre = $sucursal->nombre_sucursal;
                $sucursalDepartamento->departamento_nombre = $departamento->nombre_departamento;
            } else {
                $sucursalDepartamento->sucursal_nombre = 'Desconocido';
                $sucursalDepartamento->departamento_nombre = 'Desconocido';
            }
        }

        $cuestionarios = Cuestionario::all();

        return view('livewire.dx035.encuestas.agregar-encuesta', compact('sucursalDepartamentos', 'cuestionarios'))
            ->layout('layouts.dx035');
    }
}
