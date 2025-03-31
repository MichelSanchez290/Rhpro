<?php

namespace App\Livewire\PortalCapacitacion\Cursos\Tematicas\AdminSucursal;

use Livewire\Component;
use App\Models\PortalCapacitacion\Tematica;
use App\Models\PortalRh\Empresa;
use App\Models\PortalRh\Sucursal;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class EditarTematicaSucursal extends Component
{
    public $tematicas_id, $nombre;
    public $empresa_id, $sucursal_id;
    public $empresas = [], $sucursales = [];

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $tematica = Tematica::findOrFail($id);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Asignar empresa y sucursal del usuario autenticado
        $this->empresa_id = $user->empresa_id;
        $this->sucursal_id = $user->sucursal_id;

        // Cargar las sucursales correspondientes a la empresa seleccionada
        $empresa = Empresa::find($this->empresa_id);
        $this->sucursales = $empresa ? $empresa->sucursales : [];

        // Asignar datos de la temática (pero manteniendo la empresa y sucursal del usuario)
        $this->tematicas_id = $tematica->id;
        $this->nombre = $tematica->nombre;
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

        return redirect()->route('verTematicasSucursal');
    }


    public function render()
    {
        return view('livewire.portal-capacitacion.cursos.tematicas.admin-sucursal.editar-tematica-sucursal')->layout("layouts.portal_capacitacion");
    }
}
