<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreEmpresa;

use App\Models\Encuestas360\Encpre;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Pregunta;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class EditarEncuestaPreguntaEncpreEmpresa extends Component
{

    public $encpreId;
    public $formData = [
        'sucursal_id' => '',
        'encuestas_id' => '',
        'preguntas_id' => [], // Changed to array for multiple selections
    ];

    public $sucursales = [];
    public $encuestas = [];
    public $preguntas = [];

    protected $rules = [
        'formData.sucursal_id' => 'required|exists:sucursales,id',
        'formData.encuestas_id' => 'required|exists:360_encuestas,id',
        'formData.preguntas_id' => 'required|array|min:1', // Updated for array
        'formData.preguntas_id.*' => 'exists:preguntas,id', // Validation for each item
    ];

    protected $messages = [
        'formData.sucursal_id.required' => 'Debe seleccionar una sucursal.',
        'formData.sucursal_id.exists' => 'La sucursal seleccionada no es válida.',
        'formData.encuestas_id.required' => 'Debe seleccionar una encuesta.',
        'formData.encuestas_id.exists' => 'La encuesta seleccionada no es válida.',
        'formData.preguntas_id.required' => 'Debe seleccionar al menos una pregunta.',
        'formData.preguntas_id.array' => 'Las preguntas deben ser un arreglo válido.',
        'formData.preguntas_id.min' => 'Debe seleccionar al menos una pregunta.',
        'formData.preguntas_id.*.exists' => 'Una o más preguntas seleccionadas no son válidas.',
    ];

    public function mount($id)
    {
        $this->encpreId = Crypt::decrypt($id); // Descifrar el ID recibido

        // Cargar sucursales a través de la relación con Empresa usando Auth
        $empresa = Empresa::find(Auth::user()->empresa_id);
        $this->sucursales = $empresa->sucursales()
            ->select('sucursales.id', 'sucursales.nombre_sucursal')
            ->get();

        // Cargar datos existentes
        $encpre = Encpre::findOrFail($this->encpreId);
        $encuesta = Encuesta360::findOrFail($encpre->encuestas_id);

        $this->formData = [
            'sucursal_id' => $encuesta->sucursal_id,
            'encuestas_id' => $encpre->encuestas_id,
            'preguntas_id' => [$encpre->preguntas_id], // Initialize as array with existing pregunta
        ];

        // Cargar encuestas y preguntas iniciales filtradas por empresa del usuario
        $this->encuestas = Encuesta360::where('sucursal_id', $this->formData['sucursal_id'])
            ->where('empresa_id', Auth::user()->empresa_id)
            ->select('id', 'nombre')
            ->get();

        $this->preguntas = Pregunta::whereHas('respuestas', function ($query) {
            $query->where('empresa_id', Auth::user()->empresa_id);
        })
            ->select('id', 'texto')
            ->get();
    }

    public function updatedFormDataSucursalId($value)
    {
        $this->formData['encuestas_id'] = '';
        $this->formData['preguntas_id'] = [];
        $this->encuestas = collect();
        $this->preguntas = collect();

        if (!empty($value)) {
            try {
                $this->encuestas = Encuesta360::where('sucursal_id', $value)
                    ->where('empresa_id', Auth::user()->empresa_id)
                    ->select('id', 'nombre')
                    ->get();
            } catch (\Exception $e) {
                Log::error('Error al cargar encuestas: ' . $e->getMessage());
                $this->dispatch('toastr-error', message: 'Error al cargar encuestas');
            }
        }
    }

    public function updatedFormDataEncuestasId($value)
    {
        $this->formData['preguntas_id'] = [];
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

    public function actualizar()
    {
        $this->validate();

        try {
            $encpre = Encpre::findOrFail($this->encpreId);

            // Actualizar el registro existente con la primera pregunta seleccionada
            $encpre->update([
                'encuestas_id' => $this->formData['encuestas_id'],
                'preguntas_id' => $this->formData['preguntas_id'][0], // Primera pregunta para el registro actual
            ]);

            // Manejar preguntas adicionales si hay más de una seleccionada
            if (count($this->formData['preguntas_id']) > 1) {
                foreach (array_slice($this->formData['preguntas_id'], 1) as $preguntaId) {
                    $existe = Encpre::where('encuestas_id', $this->formData['encuestas_id'])
                        ->where('preguntas_id', $preguntaId)
                        ->exists();

                    if (!$existe) {
                        Encpre::create([
                            'encuestas_id' => $this->formData['encuestas_id'],
                            'preguntas_id' => $preguntaId,
                        ]);
                    }
                }
            }

            $this->dispatch('toastr-success', message: 'Relación actualizada correctamente.');
            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-empresa.mostrar-encuesta-pregunta-encpre-empresa');
        } catch (\Exception $e) {
            Log::error('Error al actualizar: ' . $e->getMessage());
            $this->dispatch('toastr-error', message: 'Error al actualizar: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.portal360.encpre.encuesta-pregunta-encpre-empresa.editar-encuesta-pregunta-encpre-empresa')->layout('layouts.portal360');
    }
}
