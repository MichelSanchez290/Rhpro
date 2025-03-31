<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapGrupales\Dc3ReconocimientosAdmin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PortalCapacitacion\Dc3Reconocimiento;
use Illuminate\Support\Facades\Crypt;

class Dc3Reconocimientos extends Component
{
    use WithFileUploads;

    public $dc3;
    public $reconocimiento;
    public $capacitacionId;

    public function mount($id)
    {
        try {
            $this->capacitacionId = Crypt::decrypt($id);
        } catch (\Exception $e) {
            abort(403, "ID de capacitación inválido.");
        }
    }

    public function guardarArchivos()
    {
        $this->validate([
            'dc3' => 'nullable|mimes:pdf|max:2048',
            'reconocimiento' => 'nullable|mimes:pdf|max:2048',
        ]);

        $dc3Reconocimiento = Dc3Reconocimiento::create(
            ['grupocursos_capacitaciones_id' => $this->capacitacionId]
        );

        if ($this->dc3) {
            if ($dc3Reconocimiento->dc3) {
                Storage::disk('public')->delete($dc3Reconocimiento->dc3);
            }
            // Guardar con nombre original
            $dc3Path = $this->dc3->storeAs(
                'dc3', 
                $this->dc3->getClientOriginalName(), 
                'public'
            );
            $dc3Reconocimiento->dc3 = $dc3Path;
        }

        if ($this->reconocimiento) {
            if ($dc3Reconocimiento->reconocimiento) {
                Storage::disk('public')->delete($dc3Reconocimiento->reconocimiento);
            }
            // Guardar con nombre original
            $reconocimientoPath = $this->reconocimiento->storeAs(
                'reconocimientos', 
                $this->reconocimiento->getClientOriginalName(), 
                'public'
            );
            $dc3Reconocimiento->reconocimiento = $reconocimientoPath;
        }

        $dc3Reconocimiento->save();

        session()->flash('success', 'Archivos actualizados correctamente.');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.capacitaciones.cap-grupales.dc3-reconocimiento-admins.dc3-reconocimientos')
            ->layout("layouts.portal_capacitacion");
    }
}