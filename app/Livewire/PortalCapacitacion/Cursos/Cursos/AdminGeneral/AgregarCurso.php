<?php

namespace App\Livewire\PortalCapacitacion\Cursos\Cursos\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\Curso;
use App\Models\PortalCapacitacion\Tematica;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Empresa;

class AgregarCurso extends Component
{
    public $empresas = [];
    public $sucursales = [];
    public $empresa_id;
    public $sucursal_id; 
    public $curso = [];
    public $tematicas;
    public $tematica_id;
    public $modalidad; // 👉 Agregar esta variable para evitar el error
    public $otra_modalidad; // 👉 También si usarás el campo adicional
    public $tipoestatus = '';

    protected $rules = [
        'empresa_id' => 'required',
        'sucursal_id' => 'required',
        'curso.nombre' => 'required',
        'curso.horas' => 'required', 
        'curso.precio' => 'required', 
        'curso.tipoestatus' => 'required', 
        'tematica_id' => 'required', 
        'curso.modalidad' => 'required',
    ];

    protected $messages = [
        'empresa_id.required' => 'Debe seleccionar una empresa.',
        'sucursal_id.required' => 'Debe seleccionar una sucursal.',
        'curso.nombre.required' => 'La función específica es obligatoria.',
        'curso.horas.required' => 'Las horas son obligatorias.',
        'curso.precio.required' => 'El precio es obligatorio.',
        'curso.tipoestatus.required' => 'El tipo de estatus es obligatorio.',
        'tematica_id.required' => 'Debe seleccionar una temática.',
        'curso.modalidad.required' => 'La modalidad es obligatoria.',
    ];

    public function mount()
    {
        // Obtener todas las empresas
        $this->empresas = Empresa::all();
        // Iniciar las sucursales vacías hasta que se seleccione una empresa
        $this->sucursales = [];

        $this->tematicas = Tematica::all(); // Asegúrate de importar el modelo

        $this->curso = [
            'nombre' => '',
            'horas' => '',
            'precio' => '',
            'tipoestatus' => '',
        ];

    }

    public function updatedEmpresaId()
    {
        // Obtener las sucursales de la empresa seleccionada usando la tabla pivote
        $this->sucursales = Empresa::find($this->empresa_id)?->sucursales ?? [];
        // Resetear la sucursal seleccionada al cambiar de empresa
        $this->sucursal_id = null;
        $this->tematicas = [];
    }

    public function updatedSucursalId()
    {
        // Cargar temáticas basadas en la empresa y sucursal seleccionadas
        if ($this->empresa_id && $this->sucursal_id) {
            $this->tematicas = Tematica::where('empresa_id', $this->empresa_id)
                                       ->where('sucursal_id', $this->sucursal_id)
                                       ->get();
        } else {
            $this->tematicas = [];
        }
    }

    public function agregarCurso()
    {
        $this->validate();

                // Si el usuario elige "Otro", guardar el valor personalizado
        $modalidadFinal = ($this->modalidad === 'Otro') ? $this->otra_modalidad : $this->modalidad;

        Curso::create([
            'empresa_id' => $this->empresa_id,
            'sucursal_id' => $this->sucursal_id,
            'nombre' => $this->curso['nombre'] ?? '',
            'horas' => $this->curso['horas'] ?? 0,
            'precio' => $this->curso['precio'] ?? 0,
            'tipoestatus' => $this->curso['tipoestatus'] ?? '',
            'tematicas_id' => $this->tematicas_id,
            'modalidad' => $modalidadFinal, // ✅ Guardamos la modalidad correcta
        ]);

        // Reset de valores
        $this->reset(['curso', 'empresa_id', 'sucursal_id', 'sucursales']);

        session()->flash('message', 'Curso agregado correctamente.');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.cursos.cursos.admin-general.agregar-curso')->layout("layouts.portal_capacitacion");
    }
}
