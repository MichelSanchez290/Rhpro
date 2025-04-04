<?php

namespace App\Livewire\Portal360\Asignaciones\AsignacionesAdministrador;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Relacion;
use App\Models\PortalRH\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AgregarAsignacionesAdministrador extends Component
{
    // Propiedades principales
    public $empresa_id = '';
    public $sucursal_id = '';
    public $tipo_user_calificador = '';
    public $calificador_id = '';
    public $tipo_user_calificado = '';
    public $calificado_id = '';
    public $relacion_id = '';
    public $encuesta_id = '';
    public $realizada;

    // Colecciones para los selects
    public $usuarios;
    public $usuarios_calificador;
    public $usuarios_calificado;
    public $relaciones;
    public $encuestas;
    public $empresas;
    public $sucursales = [];
    public $tipos_usuario = [
        'Becario',
        'Trabajador',
        'Instructor',
        'Practicante'
    ];

    public $step = 1;
    public $maxSteps = 9;

    protected $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'sucursal_id' => 'required|exists:sucursales,id',
        'tipo_user_calificador' => 'required|in:Becario,Trabajador,Instructor,Practicante',
        'calificador_id' => 'required|exists:users,id',
        'tipo_user_calificado' => 'required|in:Becario,Trabajador,Instructor,Practicante',
        'calificado_id' => 'required|exists:users,id',
        'relacion_id' => 'required|exists:relaciones,id',
        'encuesta_id' => 'required|exists:360_encuestas,id',
        'realizada' => 'required|date'
    ];

    public function mount()
    {
        $this->empresas = Empresa::all();
        $this->relaciones = Relacion::all();
        $this->encuestas = Encuesta360::all();
        $this->usuarios = collect();
        $this->usuarios_calificador = collect();
        $this->usuarios_calificado = collect();
        $this->sucursales = collect();
        $this->realizada = now()->format('Y-m-d\TH:i');
    }

    public function updatedEmpresaId($value)
    {
        if (!empty($value)) {
            try {
                $empresa = Empresa::with('sucursales')->findOrFail($value);
                $this->sucursales = $empresa->sucursales;
                $this->encuestas = Encuesta360::where('empresa_id', $value)->get();

                if ($this->sucursales->isEmpty()) {
                    $this->dispatch('toastr-error', message: 'No se encontraron sucursales para esta empresa');
                }

                $this->reset([
                    'sucursal_id',
                    'tipo_user_calificador',
                    'calificador_id',
                    'tipo_user_calificado',
                    'calificado_id',
                    'encuesta_id'
                ]);

                $this->step = 2;
            } catch (\Exception $e) {
                $this->dispatch('toastr-error', message: 'Error al cargar las sucursales y encuestas: ' . $e->getMessage());
                $this->sucursales = collect();
                $this->encuestas = collect();
            }
        } else {
            $this->reset([
                'sucursal_id',
                'tipo_user_calificador',
                'calificador_id',
                'tipo_user_calificado',
                'calificado_id',
                'encuesta_id'
            ]);
            $this->sucursales = collect();
            $this->encuestas = collect();
            $this->step = 1;
        }
    }

    public function updatedSucursalId($value)
    {
        if (!empty($value)) {
            try {
                $usuarios_sucursal = User::where('sucursal_id', $value)
                    ->where('empresa_id', $this->empresa_id)
                    ->get();

                if ($usuarios_sucursal->isEmpty()) {
                    $this->usuarios = User::where('empresa_id', $this->empresa_id)->get();
                    $this->dispatch('toastr-info', message: 'Se han cargado usuarios de toda la empresa ya que esta sucursal no tiene usuarios específicos');
                } else {
                    $this->usuarios = $usuarios_sucursal;
                }

                $this->reset(['tipo_user_calificador', 'calificador_id', 'tipo_user_calificado', 'calificado_id']);
                $this->step = 3;
            } catch (\Exception $e) {
                $this->dispatch('toastr-error', message: 'Error al cargar los usuarios: ' . $e->getMessage());
                $this->usuarios = collect();
            }
        } else {
            $this->reset(['tipo_user_calificador', 'calificador_id', 'tipo_user_calificado', 'calificado_id']);
            $this->usuarios = collect();
            $this->step = 2;
        }
    }

    public function updatedTipoUserCalificador($value)
    {
        if (!empty($value)) {
            $this->usuarios_calificador = $this->usuarios->where('tipo_user', $value);
            $this->reset('calificador_id');
            $this->step = 4;
        } else {
            $this->reset('calificador_id');
            $this->step = 3;
        }
    }

    public function updatedCalificadorId($value)
    {
        if (!empty($value)) {
            // Resetear encuesta seleccionada al cambiar calificador
            $this->reset('encuesta_id');

            // Cargar todas las encuestas de la empresa
            $this->encuestas = Encuesta360::where('empresa_id', $this->empresa_id)->get();

            // Verificar si el calificador ya usó todas las encuestas
            $encuestasUsadas = Asignacion::where('calificador_id', $value)
                ->pluck('360_encuestas_id')
                ->toArray();

            $todasEncuestasUsadas = $this->encuestas->every(function ($encuesta) use ($encuestasUsadas) {
                return in_array($encuesta->id, $encuestasUsadas);
            });

            if ($todasEncuestasUsadas) {
                $this->dispatch(
                    'toastr-warning',
                    message: 'Este calificador ya ha utilizado todas las encuestas disponibles'
                );
            }

            $this->step = 5;
        }
    }

    public function updatedTipoUserCalificado($value)
    {
        if (!empty($value)) {
            $this->usuarios_calificado = $this->usuarios->where('tipo_user', $value);
            $this->reset('calificado_id');
            $this->step = 6;
        } else {
            $this->reset('calificado_id');
            $this->step = 5;
        }
    }

    public function updatedCalificadoId($value)
    {
        if (!empty($value)) {
            $this->step = 7;
        }
    }

    public function updatedRelacionId($value)
    {
        if (!empty($value)) {
            $this->step = 8;
        }
    }

    public function updatedEncuestaId($value)
    {
        if (!empty($value)) {
            $this->step = 9;
        }
    }

    /**
     * Verifica si el calificador ya usó la encuesta seleccionada 
     */
    public function encuestaUsadaPorCalificador($calificador_id, $encuesta_id)
    {
        return Asignacion::where('calificador_id', $calificador_id)
            ->where('360_encuestas_id', $encuesta_id)
            ->exists();
    }

    public function saveAsignacionAdministradordev()
    {
        $this->validate();

        // Validar si la encuesta ya fue usada por el calificador
        if ($this->encuestaUsadaPorCalificador($this->calificador_id, $this->encuesta_id)) {
            $this->dispatch(
                'toastr-error',
                message: 'Esta encuesta ya ha sido utilizada por este calificador'
            );
            return;
        }

        try {
            $asignacion = Asignacion::create([
                'calificador_id' => $this->calificador_id,
                'calificado_id' => $this->calificado_id,
                'relaciones_id' => $this->relacion_id,
                '360_encuestas_id' => $this->encuesta_id,
                'realizada' => false,
                'fecha' => Carbon::parse($this->realizada),
                'empresa_id' => $this->empresa_id,
                'sucursal_id' => $this->sucursal_id,
            ]);

            $this->dispatch('toastr-success', message: 'Asignación creada correctamente');
            return redirect()->route('portal360.asignaciones.asignaciones-administrador.mostrar-asignaciones-administrador');
        } catch (\Exception $e) {
            logger($e->getMessage());
            $this->dispatch('toastr-error', message: 'Error al guardar la Asignación: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $canSubmit = !empty($this->empresa_id) &&
            !empty($this->sucursal_id) &&
            !empty($this->tipo_user_calificador) &&
            !empty($this->calificador_id) &&
            !empty($this->tipo_user_calificado) &&
            !empty($this->calificado_id) &&
            !empty($this->relacion_id) &&
            !empty($this->encuesta_id) &&
            !empty($this->realizada);

        $encuestasUsadas = $this->calificador_id ?
            Asignacion::where('calificador_id', $this->calificador_id)
            ->pluck('360_encuestas_id')
            ->toArray() : [];

        $todasUsadas = $this->calificador_id && $this->encuestas->count() > 0 &&
            $this->encuestas->every(function ($e) use ($encuestasUsadas) {
                return in_array($e->id, $encuestasUsadas);
            });

        return view('livewire.portal360.asignaciones.asignaciones-administrador.agregar-asignaciones-administrador', [
            'canSubmit' => $canSubmit,
            'encuestasUsadas' => $encuestasUsadas,
            'todasUsadas' => $todasUsadas
        ])->layout('layouts.portal360');
    }
}
