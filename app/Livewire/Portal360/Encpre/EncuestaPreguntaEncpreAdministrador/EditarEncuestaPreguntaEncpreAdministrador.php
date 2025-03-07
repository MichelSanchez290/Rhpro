<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreAdministrador;

use App\Models\Encuestas360\Encpre;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Pregunta;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class EditarEncuestaPreguntaEncpreAdministrador extends Component
{
    
    public $encpreId;
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

    public function mount($id)
    {
        try {
            $this->encpreId = Crypt::decrypt($id);
            $encpre = Encpre::findOrFail($this->encpreId);
            
            $this->formData = [
                'encuestas_id' => $encpre->encuestas_id,
                'preguntas_id' => $encpre->preguntas_id
            ];

            $this->encuestas = Encuesta360::select('id', 'nombre')->get();
            $this->preguntas = Pregunta::select('id', 'texto')->get();
        } catch (\Exception $e) {
            session()->flash('error', 'Error al cargar los datos: ' . $e->getMessage());
            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-administrador.mostrar-encuesta-pregunta-encpre-administrador');
        }
    }

    public function actualizarAdministrador()
    {
        $this->validate();

        try {
            $encpre = Encpre::findOrFail($this->encpreId);

            // Verificar si la combinación ya existe
            $existe = Encpre::where('encuestas_id', $this->formData['encuestas_id'])
                          ->where('preguntas_id', $this->formData['preguntas_id'])
                          ->where('id', '!=', $this->encpreId)
                          ->exists();

            if ($existe) {
                $this->dispatch('toastr-error', message: 'Esta combinación de encuesta y pregunta ya existe.');
                return;
            }

            // Actualizar la relación
            $encpre->update($this->formData);

            // Notificación de éxito
            $this->dispatch('toastr-success', message: 'Relación actualizada correctamente.');

            // Redireccionar
            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-administrador.mostrar-encuesta-pregunta-encpre-administrador');

        } catch (\Exception $e) {
            $this->dispatch('toastr-error', message: 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.portal360.encpre.encuesta-pregunta-encpre-administrador.editar-encuesta-pregunta-encpre-administrador')->layout('layouts.portal360');
    }
}
