<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreAdministrador;

use App\Models\Encuestas360\Encpre;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Pregunta;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class EditarEncuestaPreguntaEncpreAdministrador extends Component
{

    public $encpreId;
    public $formData = [
        'encuestas_id' => '',
        'preguntas_id' => [], // Changed to array for multiple selections
        'empresa_id' => '',
        'sucursal_id' => ''
    ];

    public $empresas = [];
    public $encuestas = [];
    public $preguntas = [];
    public $sucursales = [];

    protected $rules = [
        'formData.encuestas_id' => 'required|exists:360_encuestas,id',
        'formData.preguntas_id' => 'required|array|min:1', // Updated for array
        'formData.preguntas_id.*' => 'exists:preguntas,id', // Validation for each item
        'formData.empresa_id' => 'required|exists:empresas,id',
        'formData.sucursal_id' => 'required|exists:sucursales,id'
    ];

    protected $messages = [
        'formData.encuestas_id.required' => 'Debe seleccionar una encuesta.',
        'formData.encuestas_id.exists' => 'La encuesta seleccionada no es válida.',
        'formData.preguntas_id.required' => 'Debe seleccionar al menos una pregunta.',
        'formData.preguntas_id.array' => 'Las preguntas deben ser un arreglo válido.',
        'formData.preguntas_id.min' => 'Debe seleccionar al menos una pregunta.',
        'formData.preguntas_id.*.exists' => 'Una o más preguntas seleccionadas no son válidas.',
        'formData.empresa_id.required' => 'Debe seleccionar una empresa.',
        'formData.empresa_id.exists' => 'La empresa seleccionada no es válida.',
        'formData.sucursal_id.required' => 'Debe seleccionar una sucursal.',
        'formData.sucursal_id.exists' => 'La sucursal seleccionada no es válida.'
    ];

    public function mount($id)
    {
        try {
            $this->encpreId = Crypt::decrypt($id);
            $encpre = Encpre::with(['encuesta', 'pregunta', 'encuesta.empresa.sucursales'])->findOrFail($this->encpreId);

            // Load initial data
            $this->empresas = Empresa::select('id', 'nombre')->get();

            // Set empresa_id first
            $this->formData['empresa_id'] = $encpre->encuesta->empresa_id;

            // Load and set sucursales
            $empresa = Empresa::with('sucursales')->find($this->formData['empresa_id']);
            $this->sucursales = $empresa ? $empresa->sucursales : collect();
            $this->formData['sucursal_id'] = $encpre->sucursal_id;

            // Load and set encuestas
            $this->encuestas = Encuesta360::where('empresa_id', $this->formData['empresa_id'])
                ->select('id', 'nombre')
                ->get();
            $this->formData['encuestas_id'] = $encpre->encuestas_id;

            // Load and set preguntas (only the one associated initially)
            $this->preguntas = Pregunta::whereHas('respuestas', function ($query) {
                $query->where('empresa_id', $this->formData['empresa_id'])
                      ->where('sucursal_id', $this->formData['sucursal_id']);
            })
            ->select('id', 'texto')
            ->distinct()
            ->get();
            $this->formData['preguntas_id'] = [$encpre->preguntas_id]; // Start with the existing pregunta as an array

        } catch (\Exception $e) {
            Log::error('Error loading data: ' . $e->getMessage());
            session()->flash('error', 'Error al cargar los datos: ' . $e->getMessage());
            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-administrador.mostrar-encuesta-pregunta-encpre-administrador');
        }
    }

    public function updatedFormDataEmpresaId($value)
    {
        $this->formData['encuestas_id'] = '';
        $this->formData['preguntas_id'] = [];
        $this->formData['sucursal_id'] = '';

        if (!empty($value)) {
            try {
                $empresa = Empresa::with('sucursales')->findOrFail($value);
                $this->sucursales = $empresa->sucursales;
                $this->encuestas = Encuesta360::where('empresa_id', $value)
                    ->select('id', 'nombre')
                    ->get();
            } catch (\Exception $e) {
                Log::error('Error loading sucursales/encuestas: ' . $e->getMessage());
                $this->dispatch('toastr-error', message: 'Error al cargar datos: ' . $e->getMessage());
                $this->sucursales = collect();
                $this->encuestas = collect();
            }
        } else {
            $this->sucursales = collect();
            $this->encuestas = collect();
        }
        $this->preguntas = collect();
    }

    public function updatedFormDataSucursalId()
    {
        $this->formData['encuestas_id'] = '';
        $this->formData['preguntas_id'] = [];
        $this->preguntas = collect();
    }

    public function updatedFormDataEncuestasId()
    {
        $this->formData['preguntas_id'] = [];

        if (!empty($this->formData['empresa_id']) && !empty($this->formData['sucursal_id']) && !empty($this->formData['encuestas_id'])) {
            $this->preguntas = Pregunta::whereHas('respuestas', function ($query) {
                $query->where('empresa_id', $this->formData['empresa_id'])
                      ->where('sucursal_id', $this->formData['sucursal_id']);
            })
            ->select('id', 'texto')
            ->distinct()
            ->get();
        } else {
            $this->preguntas = collect();
        }
    }

    public function actualizarAdministrador()
    {
        $this->validate();

        try {
            $encpre = Encpre::findOrFail($this->encpreId);

            // Update the existing record with the first selected pregunta
            $encpre->update([
                'encuestas_id' => $this->formData['encuestas_id'],
                'preguntas_id' => $this->formData['preguntas_id'][0], // Update with the first pregunta
            ]);

            // Handle additional preguntas if more than one is selected
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
            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-administrador.mostrar-encuesta-pregunta-encpre-administrador');

        } catch (\Exception $e) {
            Log::error('Error al actualizar: ' . $e->getMessage());
            $this->dispatch('toastr-error', message: 'Error al actualizar: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.portal360.encpre.encuesta-pregunta-encpre-administrador.editar-encuesta-pregunta-encpre-administrador')->layout('layouts.portal360');
    }
}
