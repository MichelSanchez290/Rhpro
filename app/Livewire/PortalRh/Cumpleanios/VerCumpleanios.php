<?php

namespace App\Livewire\PortalRh\Cumpleanios;

use Livewire\Component;
use App\Models\User;
use App\Models\PortalRH\Trabajador;
use App\Models\PortalRH\Becario;
use App\Models\PortalRH\Practicante;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class VerCumpleanios extends Component
{
    public $cumpleaniosCalendario = [];

    public function mount()
    {
        $user = Auth::user();
        $rol = $user->getRoleNames()->first(); // Obtener el primer rol del usuario

        // Obtener cumpleaños según el rol
        $this->cumpleaniosCalendario = $this->obtenerCumpleaniosSegunRol($user, $rol);
    }

    protected function obtenerCumpleaniosSegunRol($user, $rol)
    {
        $cumpleanios = [];

        // 1. Obtener cumpleaños de trabajadores
        $queryTrabajadores = Trabajador::with('user')
            ->whereNotNull('fecha_nacimiento');

        // 2. Obtener cumpleaños de becarios
        $queryBecarios = Becario::with('user')
            ->whereNotNull('fecha_nacimiento');

        // 3. Obtener cumpleaños de practicantes
        $queryPracticantes = Practicante::with('user')
            ->whereNotNull('fecha_nacimiento');

        // Aplicar filtros según el rol
        if ($rol !== 'GoldenAdmin') {
            if ($rol === 'EmpresaAdmin') {
                $queryTrabajadores->whereHas('user', fn($q) => $q->where('empresa_id', $user->empresa_id));
                $queryBecarios->whereHas('user', fn($q) => $q->where('empresa_id', $user->empresa_id));
                $queryPracticantes->whereHas('user', fn($q) => $q->where('empresa_id', $user->empresa_id));
            } elseif ($rol === 'SucursalAdmin') {
                $queryTrabajadores->whereHas('user', fn($q) => $q->where('empresa_id', $user->empresa_id)
                    ->where('sucursal_id', $user->sucursal_id));
                $queryBecarios->whereHas('user', fn($q) => $q->where('empresa_id', $user->empresa_id)
                    ->where('sucursal_id', $user->sucursal_id));
                $queryPracticantes->whereHas('user', fn($q) => $q->where('empresa_id', $user->empresa_id)
                    ->where('sucursal_id', $user->sucursal_id));
            }
        }

        // Procesar trabajadores
        foreach ($queryTrabajadores->get() as $trabajador) {
            $cumpleanios[] = $this->formatearCumpleanio($trabajador->user, $trabajador->fecha_nacimiento);
        }

        // Procesar becarios
        foreach ($queryBecarios->get() as $becario) {
            $cumpleanios[] = $this->formatearCumpleanio($becario->user, $becario->fecha_nacimiento);
        }

        // Procesar practicantes
        foreach ($queryPracticantes->get() as $practicante) {
            $cumpleanios[] = $this->formatearCumpleanio($practicante->user, $practicante->fecha_nacimiento);
        }

        return $cumpleanios;
    }

    protected function formatearCumpleanio($user, $fecha_nacimiento)
    {
        return [
            'title' => "🎂 {$user->name}",
            'start' => date('Y') . '-' . date('m-d', strtotime($fecha_nacimiento)),
            'color' => '#FFD700',
            'name' => $user->name,
        ];
    }

    public function render()
    {
        return view('livewire.portal-rh.cumpleanios.ver-cumpleanios', [
            'eventosCalendario' => $this->cumpleaniosCalendario,
        ])->layout('layouts.client');
    }
}
