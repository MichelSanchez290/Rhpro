<?php

namespace App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminSucursal;

use App\Models\ActivoFijo\Activos\ActivoSouvenir;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
class Asignarsousu extends Component
{
    use WithFileUploads;

    public $empresa;
    public $sucursal;
    public $activosFiltrados = [];
    public $usuariosFiltrados = [];
    public $usuarioSeleccionado;
    public $activoSeleccionado;
    public $observaciones;

    public function mount()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $this->empresa = Empresa::find($user->empresa_id);
        $this->sucursal = Sucursal::find($user->sucursal_id);

        if (!$user->hasRole('SusursalAdmin')) {
            session()->flash('error', 'No tienes permiso para realizar esta acción.');
            return redirect()->route('mostrarasignsousu');
        }

        // Filtrar activos por sucursal y status 'Activo'
        $this->activosFiltrados = ActivoSouvenir::where('sucursal_id', $this->sucursal->id)
            ->where('status', 'Activo')
            ->get();

        $this->usuariosFiltrados = User::where('sucursal_id', $this->sucursal->id)
            ->where('empresa_id', $user->empresa_id)
            ->whereHas('roles', function ($query) {
                $query->where('name', 'Trabajador GLOBAL');
            })
            ->get();   
    }

    public function asignarActivo()
    {
        $this->validate([
            'usuarioSeleccionado' => 'required|exists:users,id',
            'activoSeleccionado' => 'required|exists:activos_souvenirs,id',
            'observaciones' => 'required|string',
        ], [
            'usuarioSeleccionado.required' => 'El usuario es obligatorio.',
            'activoSeleccionado.required' => 'El activo es obligatorio.',
            'observaciones.required' => 'Las observaciones son obligatorias.',
        ]);

        $usuario = User::find($this->usuarioSeleccionado);
        $activo = ActivoSouvenir::find($this->activoSeleccionado);

        if (!$usuario || !$activo) {
            session()->flash('error', 'Usuario o activo no encontrado.');
            return;
        }

        if ($activo->status != 'Activo') {
            session()->flash('error', 'El activo seleccionado no está disponible para asignación.');
            return;
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($usuario->empresa_id != $user->empresa_id) {
            session()->flash('error', 'El usuario no pertenece a tu empresa.');
            return;
        }

        if ($usuario->sucursal_id != $this->sucursal->id) {
            session()->flash('error', 'El usuario no pertenece a tu sucursal.');
            return;
        }

        if ($activo->sucursal_id != $this->sucursal->id) {
            session()->flash('error', 'El activo no pertenece a tu sucursal.');
            return;
        }

        $rutaBase = 'ActivoFijo/Activos/ActivoSouvenir/Asignaciones/SusursalAdmin';
        $nombreActivo = $activo->nombre ?? 'activo_' . $activo->id;

        $usuario->activosSouvenir()->attach($activo->id, [
            'fecha_asignacion' => now(),
            'fecha_devolucion' => null,
            'observaciones' => $this->observaciones,
            'status' => 1,

        ]);

        $activo->update([
            'status' => 'Asignado',
            'updated_at' => now(),
        ]);

        $this->reset([
            'usuarioSeleccionado',
            'activoSeleccionado',
            'observaciones',
        ]);

        session()->flash('success', 'Activo asignado correctamente.');
        return redirect()->route('mostrarasignsousu');
    }
    public function render()
    {
        return view('livewire.activo-fijo.activos.activo-souvenir.admin-sucursal.asignarsousu')->layout('layouts.navactivos');
    }
}
