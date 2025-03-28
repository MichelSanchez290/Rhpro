<?php

namespace App\Livewire\Portal360\Asignaciones\AsignacionesSucursal;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Relacion;
use App\Models\PortalRH\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AgregarAsignacionSucursal extends Component
{
    // Propiedades principales
    public $tipo_user_calificador = '';
    public $calificador_id = '';
    public $tipo_user_calificado = '';
    public $calificado_id = '';
    public $relacion_id = '';
    public $encuesta_id = '';
    public $fecha;

    // Colecciones para los selects
    public $usuarios;
    public $usuarios_calificador;
    public $usuarios_calificado;
    public $relaciones;
    public $encuestas;
    public $tipos_usuario = [
        'Becario',
        'Trabajador',
        'Instructor',
        'Practicante'
    ];

    public $step = 1;
    public $maxSteps = 7;

    protected $rules = [
        'tipo_user_calificador' => 'required|in:Becario,Trabajador,Instructor,Practicante',
        'calificador_id' => 'required|exists:users,id',
        'tipo_user_calificado' => 'required|in:Becario,Trabajador,Instructor,Practicante',
        'calificado_id' => 'required|exists:users,id|different:calificador_id',
        'relacion_id' => 'required|exists:relaciones,id',
        'encuesta_id' => 'required|exists:360_encuestas,id',
        'fecha' => 'required|date|after_or_equal:today',
    ];

    protected $messages = [
        'tipo_user_calificador.required' => 'El tipo de usuario del calificador es obligatorio.',
        'tipo_user_calificador.in' => 'El tipo de usuario del calificador no es válido.',
        'calificador_id.required' => 'El calificador es obligatorio.',
        'calificador_id.exists' => 'El calificador seleccionado no es válido.',
        'tipo_user_calificado.required' => 'El tipo de usuario del calificado es obligatorio.',
        'tipo_user_calificado.in' => 'El tipo de usuario del calificado no es válido.',
        'calificado_id.required' => 'El calificado es obligatorio.',
        'calificado_id.exists' => 'El calificado seleccionado no es válido.',
        'calificado_id.different' => 'El calificado debe ser diferente del calificador.',
        'relacion_id.required' => 'La relación es obligatoria.',
        'relacion_id.exists' => 'La relación seleccionada no es válida.',
        'encuesta_id.required' => 'La encuesta es obligatoria.',
        'encuesta_id.exists' => 'La encuesta seleccionada no es válida.',
        'fecha.required' => 'La fecha es obligatoria.',
        'fecha.date' => 'La fecha debe ser una fecha válida.',
        'fecha.after_or_equal' => 'La fecha debe ser hoy o una fecha futura.',
    ];

    public function mount()
    {
        // Cargar usuarios de la sucursal del usuario autenticado
        $this->usuarios = User::where('sucursal_id', Auth::user()->sucursal_id)
            ->where('empresa_id', Auth::user()->empresa_id)
            ->get();

        // Cargar relaciones para la empresa del usuario autenticado
        $this->relaciones = Relacion::orderBy('nombre')->get(['id', 'nombre']);

        // Cargar encuestas para la empresa del usuario autenticado
        $this->encuestas = Encuesta360::where('empresa_id', Auth::user()->empresa_id)
            ->orderBy('nombre')
            ->get(['id', 'nombre']);

        // Inicializar colecciones vacías
        $this->usuarios_calificador = collect();
        $this->usuarios_calificado = collect();

        // Fecha por defecto
        $this->fecha = Carbon::today()->format('Y-m-d');
    }

    public function updatedTipoUserCalificador($value)
    {
        if (!empty($value)) {
            $this->usuarios_calificador = $this->usuarios->where('tipo_user', $value);
            $this->reset('calificador_id');
            $this->step = 2;
        } else {
            $this->reset('calificador_id');
            $this->step = 1;
        }
    }

    public function updatedCalificadorId($value)
    {
        if (!empty($value)) {
            $this->step = 3;
        }
    }

    public function updatedTipoUserCalificado($value)
    {
        if (!empty($value)) {
            $this->usuarios_calificado = $this->usuarios->where('tipo_user', $value);
            $this->reset('calificado_id');
            $this->step = 4;
        } else {
            $this->reset('calificado_id');
            $this->step = 3;
        }
    }

    public function updatedCalificadoId($value)
    {
        if (!empty($value)) {
            $this->step = 5;
        }
    }

    public function updatedRelacionId($value)
    {
        if (!empty($value)) {
            $this->step = 6;
        }
    }

    public function updatedEncuestaId($value)
    {
        if (!empty($value)) {
            $this->step = 7;
        }
    }

    public function save()
    {
        $this->validate();

        try {
            Asignacion::create([
                'calificador_id' => $this->calificador_id,
                'calificado_id' => $this->calificado_id,
                'relaciones_id' => $this->relacion_id,
                '360_encuestas_id' => $this->encuesta_id,
                'fecha' => Carbon::parse($this->fecha),
                'realizada' => false,
                'empresa_id' => Auth::user()->empresa_id,
                'sucursal_id' => Auth::user()->sucursal_id,
            ]);

            $this->dispatch('toastr-success', message: 'Asignación creada correctamente.');
            $this->resetForm();
            return redirect()->route('portal360.asignaciones.asignaciones-sucursal.mostrar-asignacion-sucursal');
        } catch (\Exception $e) {
            $this->dispatch('swal-error', message: 'Error al crear la asignación: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->reset([
            'tipo_user_calificador',
            'calificador_id',
            'tipo_user_calificado',
            'calificado_id',
            'relacion_id',
            'encuesta_id',
        ]);
        $this->fecha = Carbon::today()->format('Y-m-d');
        $this->step = 1;
    }

    public function render()
    {
        $canSubmit = !empty($this->tipo_user_calificador) &&
            !empty($this->calificador_id) &&
            !empty($this->tipo_user_calificado) &&
            !empty($this->calificado_id) &&
            !empty($this->relacion_id) &&
            !empty($this->encuesta_id) &&
            !empty($this->fecha);

        return view('livewire.portal360.asignaciones.asignaciones-sucursal.agregar-asignacion-sucursal', [
            'canSubmit' => $canSubmit
        ])->layout('layouts.portal360');
    }

    // public function render()
    // {
    //     return view('livewire.portal360.asignaciones.asignaciones-sucursal.agregar-asignacion-sucursal')->layout('layouts.portal360');
    // }
}
