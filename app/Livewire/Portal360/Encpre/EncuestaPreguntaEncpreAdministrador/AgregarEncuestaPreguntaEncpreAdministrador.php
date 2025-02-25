<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreAdministrador;

use App\Models\Encuestas360\Encpre;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Pregunta;
use Livewire\Component;

class AgregarEncuestaPreguntaEncpreAdministrador extends Component
{
    public $formData = [
        'encuestas_id' => '',
        'preguntas_id' => ''
    ];

    public $encuestas = [];
    public $preguntas = [];

    protected $rules = [
        'formData.encuestas_id' => 'required|exists:360_encuestas,id',
        'formData.preguntas_id' => 'required|exists:preguntas,id'
    ];

    protected $messages = [
        'formData.encuestas_id.required' => 'Debe seleccionar una encuesta.',
        'formData.encuestas_id.exists' => 'La encuesta seleccionada no es válida.',
        'formData.preguntas_id.required' => 'Debe seleccionar una pregunta.',
        'formData.preguntas_id.exists' => 'La pregunta seleccionada no es válida.'
    ];

    public function mount()
    {
        $this->encuestas = Encuesta360::select('id', 'nombre')->get();
        $this->preguntas = Pregunta::select('id', 'texto')->get();
    }

    public function guardarAdministracion()
    {
        $this->validate();

        try {
            // Verificar si la combinación ya existe
            $existe = Encpre::where('encuestas_id', $this->formData['encuestas_id'])
                          ->where('preguntas_id', $this->formData['preguntas_id'])
                          ->exists();

            if ($existe) {
                $this->dispatch('toastr-error',  'Esta combinación de encuesta y pregunta ya existe.');
                return;
            }

            // Crear nueva relación
            Encpre::create($this->formData);

            // Limpiar formulario
            $this->formData = [
                'encuestas_id' => '',
                'preguntas_id' => ''
            ];

            // Notificación de éxito
            $this->dispatch('toastr-success',  'Relación guardada correctamente.');
            
            // Redireccionar
            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-administrador.mostrar-encuesta-pregunta-encpre-administrador');

        } catch (\Exception $e) {
            $this->dispatch('toastr-error',  'Error al guardar: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.portal360.encpre.encuesta-pregunta-encpre-administrador.agregar-encuesta-pregunta-encpre-administrador')->layout('layouts.portal360');
    }
}
