<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreSucursal;

use App\Models\Encuestas360\Encpre;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Pregunta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class EditarEncuestaPreguntaEncpreSucursal extends Component
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
        'formData.preguntas_id' => 'required|exists:preguntas,id',
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

            $this->formData['encuestas_id'] = $encpre->encuestas_id;
            $this->formData['preguntas_id'] = $encpre->preguntas_id;

            // Cargar encuestas disponibles para la empresa del usuario
            $this->encuestas = Encuesta360::where('empresa_id', Auth::user()->empresa_id)
                ->select('id', 'nombre')
                ->get();

            // Cargar preguntas disponibles
            $this->preguntas = Pregunta::whereHas('respuestas', function ($query) {
                $query->where('empresa_id', Auth::user()->empresa_id);
            })
            ->select('id', 'texto')
            ->get();

        } catch (\Exception $e) {
            Log::error('Error al montar el componente: ' . $e->getMessage());
            $this->dispatch('toastr-error', message: 'Error al cargar los datos');
            return redirect()->route('portal360.encpre.mostrar-encuesta-pregunta');
        }
    }

    public function updatedFormDataEncuestasId($value)
    {
        $this->preguntas = collect();

        if (!empty($value)) {
            try {
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

    public function editarEncuestaSucursal()
    {
        $this->validate();

        try {
            $encpre = Encpre::findOrFail($this->encpreId);

            // Verificar si la combinación ya existe (excluyendo el registro actual)
            $existe = Encpre::where('encuestas_id', $this->formData['encuestas_id'])
                ->where('preguntas_id', $this->formData['preguntas_id'])
                ->where('id', '!=', $this->encpreId)
                ->exists();

            if ($existe) {
                $this->dispatch('toastr-warning', message: 'Esta combinación ya existe.');
                return;
            }

            // Actualizar el registro
            $encpre->update([
                'encuestas_id' => $this->formData['encuestas_id'],
                'preguntas_id' => $this->formData['preguntas_id']
            ]);

            $this->dispatch('toastr-success', message: 'Relación actualizada correctamente.');
            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-sucursal.mostrar-encuesta-pregunta-encpre-sucursal');

        } catch (\Exception $e) {
            Log::error('Error al actualizar: ' . $e->getMessage());
            $this->dispatch('toastr-error', message: 'Error al actualizar');
        }
    }
    public function render()
    {
        return view('livewire.portal360.encpre.encuesta-pregunta-encpre-sucursal.editar-encuesta-pregunta-encpre-sucursal')->layout('layouts.portal360');
    }
}
