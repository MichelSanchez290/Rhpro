<?php

namespace App\Livewire\Portal360\Compromiso\CompromisoEmpresa;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\Compromiso;
use App\Models\Encuestas360\Pregunta;
use App\Models\Encuestas360\RespuestaUsuario;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AgregarCompromisoEmpresa extends Component
{

    public $alta;
    public $vencimiento;
    public $compromiso;
    public $verificado = false;
    public $users_id;
    public $preguntas_id;

    public $users;
    public $preguntas;

    public function mount()
    {
        // Cargar usuarios (calificadores y calificados) que hayan participado en asignaciones completadas
        // y pertenezcan a la misma empresa que el usuario autenticado
        $asignacionesCompletadas = Asignacion::where('realizada', true)->get();
        $userIds = $asignacionesCompletadas->pluck('calificador_id')->merge($asignacionesCompletadas->pluck('calificado_id'))->unique();
        $this->users = User::whereIn('id', $userIds)
            ->where('empresa_id', Auth::user()->empresa_id) // Filtrar por empresa del usuario autenticado
            ->get();

        // Inicializar preguntas como una colección vacía
        $this->preguntas = collect();

        // Fechas por defecto
        $this->alta = now()->format('Y-m-d');
        $this->vencimiento = now()->addDays(7)->format('Y-m-d');
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
            $query->where('calificado_id', $userId); // Filtrar por el usuario calificado
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
            Compromiso::create([
                'alta' => $this->alta,
                'vencimiento' => $this->vencimiento,
                'compromiso' => $this->compromiso,
                'verificado' => $this->verificado,
                'users_id' => $this->users_id,
                'preguntas_id' => $this->preguntas_id,
            ]);

            $this->dispatch('toastr-success', message: 'Compromiso agregado exitosamente.');
            return redirect()->route('portal360.compromiso.compromiso-empresa.mostrar-compromiso-empresa');
        } catch (\Exception $e) {
            Log::error('Error al agregar compromiso: ' . $e->getMessage());
            session()->flash('error', 'Hubo un error al agregar el compromiso. Por favor, intenta de nuevo.');
        }
    }
    public function render()
    {
        return view('livewire.portal360.compromiso.compromiso-empresa.agregar-compromiso-empresa')->layout('layouts.portal360');
    }
}
