<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreSucursal;

use App\Models\Encuestas360\Encpre;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Pregunta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class AgregarEncuestaPreguntaEncpreSucursal extends Component
{

public $formData = [
    'encuestas_id' => '',
    'preguntas_id' => ''
];

public $encuestas = [];
public $preguntas = [];

protected $rules = [
    'formData.encuestas_id' => 'required|exists:360_encuestas,id',
    'formData.preguntas_id' => 'required|exists:preguntas,id',
];

protected $messages = [
    'formData.encuestas_id.required' => 'Debe seleccionar una encuesta.',
    'formData.encuestas_id.exists' => 'La encuesta seleccionada no es válida.',
    'formData.preguntas_id.required' => 'Debe seleccionar una pregunta.',
    'formData.preguntas_id.exists' => 'La pregunta seleccionada no es válida.'
];

public function mount()
{
    // Cargar todas las encuestas disponibles para el usuario
    $this->encuestas = Encuesta360::where('empresa_id', Auth::user()->empresa_id)
        ->select('id', 'nombre')
        ->get();

    $this->preguntas = collect();
}

public function updatedFormDataEncuestasId($value)
{
    $this->formData['preguntas_id'] = '';
    $this->preguntas = collect();

    if (!empty($value)) {
        try {
            // Cargar preguntas disponibles
            $this->preguntas = Pregunta::whereHas('respuestas', function ($query) {
                $query->where('empresa_id', Auth::user()->empresa_id);
            })
            ->select('id', 'texto')
            ->get();
        } catch (\Exception $e) {
            Log::error('Error al cargar preguntas: ' . $e->getMessage());
            $this->dispatch('toastr-error', message: 'Error al cargar preguntas');
        }
    }
}

public function guardar()
{
    $this->validate();

    try {
        // Verificar si la combinación ya existe
        $existe = Encpre::where('encuestas_id', $this->formData['encuestas_id'])
            ->where('preguntas_id', $this->formData['preguntas_id'])
            ->exists();

        if ($existe) {
            $this->dispatch('toastr-warning', message: 'Esta combinación ya existe.');
            return;
        }

        // Crear nueva relación
        Encpre::create([
            'encuestas_id' => $this->formData['encuestas_id'],
            'preguntas_id' => $this->formData['preguntas_id']
        ]);

        // Resetear formulario
        $this->formData = [
            'encuestas_id' => '',
            'preguntas_id' => ''
        ];
        $this->preguntas = collect();

        $this->dispatch('toastr-success', message: 'Relación guardada correctamente.');
        return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-sucursal.mostrar-encuesta-pregunta-encpre-sucursal');
    } catch (\Exception $e) {
        Log::error('Error al guardar: ' . $e->getMessage());
        $this->dispatch('toastr-error', message: 'Error al guardar');
    }
}

    public function render()
    {
        return view('livewire.portal360.encpre.encuesta-pregunta-encpre-sucursal.agregar-encuesta-pregunta-encpre-sucursal')->layout('layouts.portal360');
    }
}

