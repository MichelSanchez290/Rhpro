<?php
namespace App\Livewire\PortalCapacitacion\Cursos\Tematicas\AdminEmpresa;

use Livewire\Component;
use App\Models\PortalCapacitacion\Tematica;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Empresa;
use Illuminate\Support\Facades\Auth;

class AgregarTematicaEmpresa extends Component
{
    public $empresas = [];
    public $sucursales = [];
    public $empresa_id;
    public $sucursal_id; 
    public $tematica = [];

    protected $rules = [
        'empresa_id' => 'required',
        'sucursal_id' => 'required',
        'tematica.nombre' => 'required',
    ];

    protected $messages = [
        'empresa_id.required' => 'Debe seleccionar una empresa.',
        'sucursal_id.required' => 'Debe seleccionar una sucursal.',
        'tematica.nombre.required' => 'La función específica es obligatoria.',
    ];

    public function mount()
    {
        // Obtener la empresa del usuario autenticado
        $user = Auth::user();
        $this->empresa_id = $user->empresa_id;  // Asumiendo que el usuario tiene un campo `empresa_id`
        
        // Obtener las sucursales de la empresa del usuario
        $empresa = Empresa::find($this->empresa_id);
        $this->sucursales = $empresa ? $empresa->sucursales : [];
    }

    public function updatedEmpresaId()
    {
        // Obtener las sucursales de la empresa seleccionada (esto se puede ajustar si quieres permitir que cambien de empresa)
        $this->sucursales = Empresa::find($this->empresa_id)?->sucursales ?? [];
        // Resetear la sucursal seleccionada al cambiar de empresa
        $this->sucursal_id = null;
    }

    public function agregarTematica()
    {
        $this->validate();

        Tematica::create([
            'empresa_id' => $this->empresa_id,
            'sucursal_id' => $this->sucursal_id,
            'nombre' => $this->tematica['nombre']
        ]);

        // Resetear valores después de guardar
        $this->empresa_id = null;
        $this->sucursal_id = null;
        $this->tematica = [];
        $this->sucursales = [];

        session()->flash('message', 'Tematica agregada correctamente.');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.cursos.tematicas.admin-empresa.agregar-tematica-empresa')->layout("layouts.portal_capacitacion");
    }
}
