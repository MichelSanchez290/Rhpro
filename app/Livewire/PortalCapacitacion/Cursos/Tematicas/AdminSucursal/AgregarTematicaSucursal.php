<?php
namespace App\Livewire\PortalCapacitacion\Cursos\Tematicas\AdminSucursal;

use Livewire\Component;
use App\Models\PortalCapacitacion\Tematica;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Empresa;
use Illuminate\Support\Facades\Auth;

class AgregarTematicaSucursal extends Component
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
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Asignar empresa y sucursal del usuario autenticado
        $this->empresa_id = $user->empresa_id;
        $this->sucursal_id = $user->sucursal_id;

        // Cargar las sucursales correspondientes a la empresa del usuario
        $empresa = Empresa::find($this->empresa_id);
        $this->sucursales = $empresa ? $empresa->sucursales : [];
    }

    public function updatedEmpresaId()
    {
        // Obtener las sucursales de la empresa seleccionada
        $this->sucursales = Empresa::find($this->empresa_id)?->sucursales ?? [];
        
        // Mantener la sucursal del usuario si pertenece a la nueva empresa, de lo contrario, resetearla
        if (!in_array($this->sucursal_id, $this->sucursales->pluck('id')->toArray())) {
            $this->sucursal_id = null;
        }
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
        $this->tematica = [];

        session()->flash('message', 'Tematica agregada correctamente.');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.cursos.tematicas.admin-sucursal.agregar-tematica-sucursal')->layout("layouts.portal_capacitacion");
    }
}
