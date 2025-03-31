<?php

namespace App\Livewire\PortalCapacitacion\Cursos\Tematicas\AdminEmpresa;

use Livewire\Component;
use App\Models\PortalCapacitacion\Tematica;
use App\Models\PortalRh\Empresa;
use App\Models\PortalRh\Sucursal;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class EditarTematicaEmpresa extends Component
{
    public $tematicas_id, $nombre;
    public $empresa_id, $sucursal_id;
    public $empresas = [], $sucursales = [];

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $tematica = Tematica::findOrFail($id);
    
        // Asignar datos al componente
        $this->tematicas_id = $tematica->id;
        $this->nombre = $tematica->nombre;
        $this->empresa_id = $tematica->empresa_id;
    
        // Obtener la empresa del usuario autenticado
        $user = Auth::user();
        $this->empresa_id = $user->empresa_id;  // Asumiendo que el usuario tiene un campo `empresa_id`
    
        // Cargar las sucursales correspondientes a la empresa seleccionada
        $empresa = Empresa::find($this->empresa_id);
        $this->sucursales = $empresa ? $empresa->sucursales : [];
    
        // Asignar la sucursal correspondiente
        $this->sucursal_id = $tematica->sucursal_id;
    }
    
    public function updatedEmpresaId()
    {
        // Obtener las sucursales de la empresa seleccionada
        $this->sucursales = Empresa::find($this->empresa_id)?->sucursales ?? [];
        // Resetear la sucursal seleccionada al cambiar de empresa
        $this->sucursal_id = null;
    }
    

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'empresa_id' => 'required',
            'sucursal_id' => 'required',
        ]);

        // Buscar la tematica existente y actualizarla
        Tematica::updateOrCreate(['id' => $this->tematicas_id], [
            'nombre' => $this->nombre,
            'empresa_id' => $this->empresa_id,
            'sucursal_id' => $this->sucursal_id,
        ]);

        session()->flash('success', 'Temática actualizada exitosamente.');

        return redirect()->route('verTematicasEmpresa');
    }


    public function render()
    {
        return view('livewire.portal-capacitacion.cursos.tematicas.admin-empresa.editar-tematica-empresa')->layout("layouts.portal_capacitacion");
    }
}
