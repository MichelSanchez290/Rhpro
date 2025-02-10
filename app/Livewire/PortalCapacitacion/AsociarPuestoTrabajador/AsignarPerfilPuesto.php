<?php

namespace App\Livewire\PortalCapacitacion\AsociarPuestoTrabajador;

use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\PortalCapacitacion\PerfilPuesto;
use App\Models\PortalRH\Trabajador;
use App\Models\PortalRH\Becari;
use App\Models\PortalRH\Practicant;

class AsignarPerfilPuesto extends Component
{
    public $usuario;
    public $perfiles;
    public $perfilSeleccionado;
    public $status;
    public $fecha_inicio;
    public $fecha_final;
    public $motivo_cambio;
    public $tipoUsuario; // 👈 Agregamos esta propiedad pública para que Livewire la reciba

    public function mount($id, $tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario; // Guardar el tipo de usuario recibido

        $id = Crypt::decrypt($id); // Desencripta el ID

        // Buscar el usuario en la tabla correspondiente según el tipo de usuario
        switch ($tipoUsuario) {
            case 'trabajador':
                $modelo = Trabajador::with('usuarios')->find($id);
                break;
            case 'becario':
                $modelo = Becari::with('usuarios')->find($id);
                break;
            case 'practicante':
                $modelo = Practicant::with('usuarios')->find($id);
                break;
            default:
                abort(404, 'Tipo de usuario no válido.');
        }

        if (!$modelo || !$modelo->usuarios) {
            abort(404, 'Usuario no encontrado.');
        }

        // Asignamos la información del usuario correcto
        $this->usuario = $modelo->usuarios;
        $this->perfiles = PerfilPuesto::all();
    }

    public function asignarPerfil()
    {
        $this->validate([
            'perfilSeleccionado' => 'required',
            'status' => 'required|string|in:pendiente,aprobado,fallido',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'motivo_cambio' => 'required|string',
        ]);

         // Asigna el perfil de puesto al usuario en la tabla pivote
        $this->usuario->perfilesPuestos()->attach($this->perfilSeleccionado, [
            'status' => $this->status,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final,
            'motivo_cambio' => $this->motivo_cambio,
        ]);
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.asociar-puesto-trabajador.asignar-perfil-puesto')
            ->layout("layouts.portal_capacitacion");
    }
}
