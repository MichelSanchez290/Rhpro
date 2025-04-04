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
        'preguntas_id' => [],
        'empresa_id' => '',
        'sucursal_id' => ''
    ];

    public $empresas = [];
    public $encuestas = [];
    public $preguntas = [];
    public $sucursales = [];
    public $busquedaPreguntas = ''; // Added for search functionality

    protected $rules = [
        'formData.encuestas_id' => 'required|exists:360_encuestas,id',
        'formData.preguntas_id' => 'required|array|min:1',
        'formData.preguntas_id.*' => 'exists:preguntas,id',
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
            $encpre = Encpre::with(['encuesta', 'encuesta.empresa.sucursales'])->findOrFail($this->encpreId);

            // Cargar todas las empresas
            $this->empresas = Empresa::select('id', 'nombre')->get();

            // Inicializar datos del formulario
            $this->formData = [
                'empresa_id' => $encpre->encuesta->empresa_id,
                'sucursal_id' => $encpre->encuesta->sucursal_id,
                'encuestas_id' => $encpre->encuestas_id,
                'preguntas_id' => Encpre::where('encuestas_id', $encpre->encuestas_id)
                    ->pluck('preguntas_id')
                    ->toArray()
            ];

            // Cargar sucursales de la empresa seleccionada
            $empresa = Empresa::with('sucursales')->find($this->formData['empresa_id']);
            $this->sucursales = $empresa ? $empresa->sucursales : collect();

            // Cargar encuestas de la empresa
            $this->encuestas = Encuesta360::where('empresa_id', $this->formData['empresa_id'])
                ->where('sucursal_id', $this->formData['sucursal_id'])
                ->select('id', 'nombre')
                ->get();

            // Cargar todas las preguntas disponibles para la empresa
            $this->preguntas = Pregunta::whereHas('respuestas', function ($query) {
                $query->where('empresa_id', $this->formData['empresa_id'])
                    ->where('sucursal_id', $this->formData['sucursal_id']);
            })
                ->select('id', 'texto')
                ->distinct()
                ->get();
        } catch (\Exception $e) {
            Log::error('Error loading data: ' . $e->getMessage());
            session()->flash('error', 'Error al cargar los datos: ' . $e->getMessage());
            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-administrador.mostrar-encuesta-pregunta-encpre-administrador');
        }
    }

    public function updatedFormDataEmpresaId($value)
    {
        // Reemplazar reset() con asignaciones directas
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
        // Reemplazar reset() con asignaciones directas
        $this->formData['encuestas_id'] = '';
        $this->formData['preguntas_id'] = [];

        if (!empty($this->formData['empresa_id']) && !empty($this->formData['sucursal_id'])) {
            try {
                $this->encuestas = Encuesta360::where('empresa_id', $this->formData['empresa_id'])
                    ->where('sucursal_id', $this->formData['sucursal_id'])
                    ->select('id', 'nombre')
                    ->get();
            } catch (\Exception $e) {
                Log::error('Error loading encuestas: ' . $e->getMessage());
                $this->dispatch('toastr-error', message: 'Error al cargar encuestas: ' . $e->getMessage());
                $this->encuestas = collect();
            }
        } else {
            $this->encuestas = collect();
        }
        $this->preguntas = collect();
    }

    public function updatedFormDataEncuestasId()
    {
        $this->formData['preguntas_id'] = [];
        if (!empty($this->formData['empresa_id']) && !empty($this->formData['sucursal_id']) && !empty($this->formData['encuestas_id'])) {
            try {
                // Cargar preguntas asociadas a esta encuesta
                $this->preguntas = Pregunta::whereHas('respuestas', function ($query) {
                    $query->where('empresa_id', $this->formData['empresa_id'])
                        ->where('sucursal_id', $this->formData['sucursal_id']);
                })
                    ->select('id', 'texto')
                    ->distinct()
                    ->get();

                // Cargar las preguntas ya asociadas
                $this->formData['preguntas_id'] = Encpre::where('encuestas_id', $this->formData['encuestas_id'])
                    ->pluck('preguntas_id')
                    ->toArray();
            } catch (\Exception $e) {
                Log::error('Error loading preguntas: ' . $e->getMessage());
                $this->dispatch('toastr-error', message: 'Error al cargar preguntas: ' . $e->getMessage());
                $this->preguntas = collect();
            }
        } else {
            $this->preguntas = collect();
        }
    }

    // Agregar métodos para seleccionar/deseleccionar todas las preguntas
    public function seleccionarTodasPreguntas()
    {
        if (!empty($this->preguntas) && !$this->preguntas->isEmpty()) {
            $this->formData['preguntas_id'] = $this->preguntas->pluck('id')->toArray();
        }
    }

    public function deseleccionarTodasPreguntas()
    {
        $this->formData['preguntas_id'] = [];
    }

    // Agregar método para la búsqueda de preguntas
    public function updatedBusquedaPreguntas()
    {
        if (!empty($this->formData['empresa_id']) && !empty($this->formData['sucursal_id']) && !empty($this->formData['encuestas_id'])) {
            $this->preguntas = Pregunta::whereHas('respuestas', function ($query) {
                $query->where('empresa_id', $this->formData['empresa_id'])
                    ->where('sucursal_id', $this->formData['sucursal_id']);
            })
                ->where('texto', 'like', '%' . $this->busquedaPreguntas . '%')
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
            // Eliminar relaciones existentes
            Encpre::where('encuestas_id', $this->formData['encuestas_id'])->delete();

            // Crear nuevas relaciones
            foreach ($this->formData['preguntas_id'] as $preguntaId) {
                Encpre::create([
                    'encuestas_id' => $this->formData['encuestas_id'],
                    'preguntas_id' => $preguntaId,
                ]);
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
