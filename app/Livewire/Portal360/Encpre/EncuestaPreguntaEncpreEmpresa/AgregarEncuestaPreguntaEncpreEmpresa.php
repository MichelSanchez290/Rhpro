<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreEmpresa;

use App\Models\Encuestas360\Encpre;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Pregunta;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class AgregarEncuestaPreguntaEncpreEmpresa extends Component
{
    public $formData = [
        'sucursal_id' => '',
        'encuestas_id' => '',
        'preguntas_id' => ''
    ];

    public $sucursales = [];
    public $encuestas = [];
    public $preguntas = [];

    protected $rules = [
        'formData.sucursal_id' => 'required|exists:sucursales,id',
        'formData.encuestas_id' => 'required|exists:360_encuestas,id',
        'formData.preguntas_id' => 'required|exists:preguntas,id',
    ];

    protected $messages = [
        'formData.sucursal_id.required' => 'Debe seleccionar una sucursal.',
        'formData.sucursal_id.exists' => 'La sucursal seleccionada no es válida.',
        'formData.encuestas_id.required' => 'Debe seleccionar una encuesta.',
        'formData.encuestas_id.exists' => 'La encuesta seleccionada no es válida.',
        'formData.preguntas_id.required' => 'Debe seleccionar una pregunta.',
        'formData.preguntas_id.exists' => 'La pregunta seleccionada no es válida.'
    ];

    public function mount()
    {
        // Cargar sucursales a través de la relación con Empresa usando Auth
        $empresa = Empresa::find(Auth::user()->empresa_id);
        $this->sucursales = $empresa->sucursales()
            ->select('sucursales.id', 'sucursales.nombre_sucursal')
            ->get();

        $this->encuestas = collect();
        $this->preguntas = collect();
    }

    public function updatedFormDataSucursalId($value)
    {
        $this->formData['encuestas_id'] = '';
        $this->formData['preguntas_id'] = '';
        $this->encuestas = collect();
        $this->preguntas = collect();

        if (!empty($value)) {
            try {
                // Filtrar encuestas por sucursal y empresa del usuario autenticado
                $this->encuestas = Encuesta360::where('sucursal_id', $value)
                    ->where('empresa_id', Auth::user()->empresa_id)
                    ->select('id', 'nombre')
                    ->get();
            } catch (\Exception $e) {
                Log::error('Error al cargar encuestas: ' . $e->getMessage());
                $this->dispatch('toastr-error', message: 'Error al cargar encuestas: ' . $e->getMessage());
            }
        }
    }

    public function updatedFormDataEncuestasId($value)
    {
        $this->formData['preguntas_id'] = '';
        $this->preguntas = collect();

        if (!empty($value)) {
            try {
                // Filtrar preguntas por empresa del usuario autenticado
                $this->preguntas = Pregunta::whereHas('respuestas', function ($query) {
                    $query->where('empresa_id', Auth::user()->empresa_id);
                })
                ->select('id', 'texto')
                ->get();

                Log::info('Preguntas cargadas:', ['preguntas' => $this->preguntas->toArray()]);
            } catch (\Exception $e) {
                Log::error('Error al cargar preguntas: ' . $e->getMessage());
                $this->dispatch('toastr-error', message: 'Error al cargar preguntas: ' . $e->getMessage());
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
                $this->dispatch('toastr-warning', message: 'Esta combinación de encuesta y pregunta ya existe.');
                return;
            }

            // Crear nueva relación
            Encpre::create([
                'encuestas_id' => $this->formData['encuestas_id'],
                'preguntas_id' => $this->formData['preguntas_id']
            ]);

            // Resetear formulario
            $this->formData = [
                'sucursal_id' => '',
                'encuestas_id' => '',
                'preguntas_id' => ''
            ];
            $this->encuestas = collect();
            $this->preguntas = collect();

            $this->dispatch('toastr-success', message: 'Relación guardada correctamente.');
            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-empresa.mostrar-encuesta-pregunta-encpre-empresa');
        } catch (\Exception $e) {
            Log::error('Error al guardar: ' . $e->getMessage());
            $this->dispatch('toastr-error', message: 'Error al guardar: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.portal360.encpre.encuesta-pregunta-encpre-empresa.agregar-encuesta-pregunta-encpre-empresa')->layout('layouts.portal360');
    }
}
