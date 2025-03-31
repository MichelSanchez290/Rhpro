<?php

namespace App\Livewire\Portal360\Compromiso\CompromisoEmpresa;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\Compromiso;
use App\Models\Encuestas360\Pregunta;
use App\Models\Encuestas360\RespuestaUsuario;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditarCompromisoEmpresa extends Component
{
    public $compromisoId;
    public $alta;
    public $vencimiento;
    public $compromiso;
    public $verificado = false;
    public $users_id;
    public $preguntas_id;

    public $users;
    public $preguntas;

    public function mount($id)
    {
        // Cargar el compromiso a editar
        $compromiso = Compromiso::where('id', $id)
            ->whereHas('user', function ($query) {
                $query->where('empresa_id', Auth::user()->empresa_id);
            })
            ->firstOrFail();

        $this->compromisoId = $compromiso->id;
        $this->alta = Carbon::parse($compromiso->alta)->format('Y-m-d');
        $this->vencimiento = Carbon::parse($compromiso->vencimiento)->format('Y-m-d');
        $this->compromiso = $compromiso->compromiso;
        $this->verificado = $compromiso->verificado;
        $this->users_id = $compromiso->users_id;
        $this->preguntas_id = $compromiso->preguntas_id;

        // Cargar usuarios (calificadores y calificados) que hayan participado en asignaciones completadas
        // y pertenezcan a la misma empresa que el usuario autenticado
        $asignacionesCompletadas = Asignacion::where('realizada', true)->get();
        $userIds = $asignacionesCompletadas->pluck('calificador_id')->merge($asignacionesCompletadas->pluck('calificado_id'))->unique();
        $this->users = User::whereIn('id', $userIds)
            ->where('empresa_id', Auth::user()->empresa_id)
            ->get();

        // Cargar preguntas relacionadas con el usuario seleccionado
        $this->preguntas = $this->loadPreguntasByUserId($this->users_id);
    }

    public function updatedUsersId($userId)
    {
        // Resetear la pregunta seleccionada cuando cambie el usuario
        $this->preguntas_id = null;

        if ($userId) {
            Log::info('Cargando preguntas para el usuario:', ['userId' => $userId]);
            $this->preguntas = $this->loadPreguntasByUserId($userId);
        } else {
            $this->preguntas = collect(); // Vaciar preguntas si no hay usuario seleccionado
        }
    }

    protected function loadPreguntasByUserId($userId)
    {
        // Cargar preguntas contestadas por el usuario seleccionado
        $preguntasContestadasIds = RespuestaUsuario::whereHas('asignacion', function ($query) use ($userId) {
            $query->where('calificado_id', $userId);
        })
            ->with('respuesta360.pregunta')
            ->distinct()
            ->get()
            ->pluck('respuesta360.pregunta.id')
            ->unique();

        return Pregunta::whereIn('id', $preguntasContestadasIds)->get() ?? collect();
    }

    protected $rules = [
        'alta' => 'required|date',
        'vencimiento' => 'required|date|after_or_equal:alta',
        'compromiso' => 'required|string|max:255',
        'verificado' => 'boolean',
        'users_id' => 'required|exists:users,id',
        'preguntas_id' => 'nullable|exists:preguntas,id',
    ];

    protected $messages = [
        'alta.required' => 'La fecha de alta es obligatoria.',
        'vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
        'vencimiento.after_or_equal' => 'El vencimiento debe ser igual o posterior a la fecha de alta.',
        'compromiso.required' => 'El compromiso es obligatorio.',
        'users_id.required' => 'Debes seleccionar un usuario.',
        'users_id.exists' => 'El usuario seleccionado no es válido.',
        'preguntas_id.exists' => 'La pregunta seleccionada no es válida.',
    ];

    public function save()
    {
        $this->validate();

        try {
            $compromiso = Compromiso::where('id', $this->compromisoId)
                ->whereHas('user', function ($query) {
                    $query->where('empresa_id', Auth::user()->empresa_id);
                })
                ->firstOrFail();

            $compromiso->update([
                'alta' => $this->alta,
                'vencimiento' => $this->vencimiento,
                'compromiso' => $this->compromiso,
                'verificado' => $this->verificado,
                'users_id' => $this->users_id,
                'preguntas_id' => $this->preguntas_id,
            ]);

            $this->dispatch('toastr-success', message: 'Compromiso actualizado exitosamente.');
            return redirect()->route('portal360.compromiso.compromiso-empresa.mostrar-compromiso-empresa');
        } catch (\Exception $e) {
            Log::error('Error al actualizar compromiso: ' . $e->getMessage());
            session()->flash('error', 'Hubo un error al actualizar el compromiso. Por favor, intenta de nuevo.');
        }
    }
    public function render()
    {
        return view('livewire.portal360.compromiso.compromiso-empresa.editar-compromiso-empresa')->layout('layouts.portal360');
    }
}
