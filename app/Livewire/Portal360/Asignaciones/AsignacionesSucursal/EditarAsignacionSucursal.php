<?php

namespace App\Livewire\Portal360\Asignaciones\AsignacionesSucursal;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Relacion;
use App\Models\PortalRH\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class EditarAsignacionSucursal extends Component
{
    public $asignacion;
    public $asignacionId;
    public $tipo_user_calificador;
    public $calificador_id;
    public $tipo_user_calificado;
    public $calificado_id;
    public $relacion_id;
    public $encuesta_id;
    public $fecha;
    public $realizada;
    public $resetRealizada = false;

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

    protected $rules = [
        'tipo_user_calificador' => 'required|in:Becario,Trabajador,Instructor,Practicante',
        'calificador_id' => 'required|exists:users,id',
        'tipo_user_calificado' => 'required|in:Becario,Trabajador,Instructor,Practicante',
        'calificado_id' => 'required|exists:users,id|different:calificador_id',
        'relacion_id' => 'required|exists:relaciones,id',
        'encuesta_id' => 'required|exists:360_encuestas,id',
        'fecha' => 'required|date|after_or_equal:today',
        'resetRealizada' => 'boolean'
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

    public function mount($id)
    {
        $this->asignacionId = Crypt::decrypt($id);
        $this->cargarDatosAsignacion();
    }

    protected function cargarDatosAsignacion()
    {
        $this->asignacion = Asignacion::with(['calificador', 'calificado', 'relacion', 'encuesta'])
            ->findOrFail($this->asignacionId);

        $this->calificador_id = $this->asignacion->calificador_id;
        $this->calificado_id = $this->asignacion->calificado_id;
        $this->relacion_id = $this->asignacion->relaciones_id;
        $this->encuesta_id = $this->asignacion->{'360_encuestas_id'};
        $this->fecha = Carbon::parse($this->asignacion->fecha)->format('Y-m-d');
        $this->realizada = $this->asignacion->realizada;
        $this->resetRealizada = false;

        $calificador = $this->asignacion->calificador;
        $this->tipo_user_calificador = $calificador ? $calificador->tipo_user : null;
        $calificado = $this->asignacion->calificado;
        $this->tipo_user_calificado = $calificado ? $calificado->tipo_user : null;

        // Cargar datos para los selects
        $this->usuarios = User::where('sucursal_id', Auth::user()->sucursal_id)
            ->where('empresa_id', Auth::user()->empresa_id)
            ->get();
        $this->relaciones = Relacion::orderBy('nombre')->get(['id', 'nombre']);
        $this->encuestas = Encuesta360::where('empresa_id', Auth::user()->empresa_id)
            ->orderBy('nombre')
            ->get(['id', 'nombre']);

        $this->filtrarUsuariosPorTipo();
    }

    protected function filtrarUsuariosPorTipo()
    {
        if (!empty($this->tipo_user_calificador)) {
            $this->usuarios_calificador = $this->usuarios->where('tipo_user', $this->tipo_user_calificador);
        } else {
            $this->usuarios_calificador = collect();
        }

        if (!empty($this->tipo_user_calificado)) {
            $this->usuarios_calificado = $this->usuarios->where('tipo_user', $this->tipo_user_calificado);
        } else {
            $this->usuarios_calificado = collect();
        }
    }

    public function updatedTipoUserCalificador($value)
    {
        if (!empty($value)) {
            $this->usuarios_calificador = $this->usuarios->where('tipo_user', $value);
            $currentCalificador = $this->usuarios->firstWhere('id', $this->calificador_id);
            if (!$currentCalificador || $currentCalificador->tipo_user !== $value) {
                $this->reset('calificador_id');
            }
        } else {
            $this->usuarios_calificador = collect();
            $this->reset('calificador_id');
        }
    }

    public function updatedTipoUserCalificado($value)
    {
        if (!empty($value)) {
            $this->usuarios_calificado = $this->usuarios->where('tipo_user', $value);
            $currentCalificado = $this->usuarios->firstWhere('id', $this->calificado_id);
            if (!$currentCalificado || $currentCalificado->tipo_user !== $value) {
                $this->reset('calificado_id');
            }
        } else {
            $this->usuarios_calificado = collect();
            $this->reset('calificado_id');
        }
    }

    public function saveAsignacionSucursal()
    {
        $this->validate();

        try {
            $encuesta = Encuesta360::findOrFail($this->encuesta_id);
            if ($encuesta->empresa_id !== Auth::user()->empresa_id) {
                $this->dispatch('swal-error', message: 'La encuesta seleccionada no pertenece a tu empresa.');
                return;
            }

            $this->asignacion->update([
                'calificador_id' => $this->calificador_id,
                'calificado_id' => $this->calificado_id,
                'relaciones_id' => $this->relacion_id,
                '360_encuestas_id' => $this->encuesta_id,
                'fecha' => Carbon::parse($this->fecha),
                'realizada' => $this->resetRealizada ? false : $this->asignacion->realizada,
                'empresa_id' => Auth::user()->empresa_id,
                'sucursal_id' => Auth::user()->sucursal_id,
            ]);

            $message = 'Asignación actualizada correctamente.';
            if ($this->resetRealizada) {
                $message .= ' El estado de la encuesta se ha restablecido para poder contestarla nuevamente.';
            }
            $this->dispatch('toastr-success', message: $message);
            return redirect()->route('portal360.asignaciones.asignaciones-sucursal.mostrar-asignacion-sucursal');
        } catch (\Exception $e) {
            $this->dispatch('swal-error', message: 'Error al actualizar la asignación: ' . $e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.portal360.asignaciones.asignaciones-sucursal.editar-asignacion-sucursal')->layout('layouts.portal360');
    }

    // public function render()
    // {
    //     return view('livewire.portal360.asignaciones.asignaciones-sucursal.editar-asignacion-sucursal');
    // }
}
