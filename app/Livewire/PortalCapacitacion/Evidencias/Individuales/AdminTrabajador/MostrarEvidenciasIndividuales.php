<?php

namespace App\Livewire\PortalCapacitacion\Evidencias\Individuales\AdminTrabajador;

use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\PortalCapacitacion\CapacitacionIndividual;

class MostrarEvidenciasIndividuales extends Component
{
    public $caps_individuales_id;  
    public $evidenciasPendientes;
    public $evidenciasAprobadas;
    public $evidenciasRechazadas;
    public $tieneEvidenciasAprobadas = false;

    public function mount($id)
    {
        $this->caps_individuales_id = Crypt::decrypt($id);
        $this->cargarEvidencias();
    }

    public function cargarEvidencias()
    {
        // Obtener las evidencias asociadas a la capacitación individual
        $evidencias = DB::table('evidencias')
            ->join('evidencia_cap_individual', 'evidencias.id', '=', 'evidencia_cap_individual.evidencias_id')
            ->where('evidencia_cap_individual.caps_individuales_id', $this->caps_individuales_id)
            ->select(
                'evidencias.id',
                'evidencias.evidencias', // Ruta de la imagen
                'evidencias.comentarios',
                'evidencias.fecha',
                'evidencias.status'
            )
            ->get();

        // Clasificar evidencias según su estado
        $this->evidenciasPendientes = $evidencias->where('status', 'pendiente');
        $this->evidenciasAprobadas = $evidencias->where('status', 'aprobado');
        $this->evidenciasRechazadas = $evidencias->where('status', 'rechazado');

        $this->tieneEvidenciasAprobadas = $this->evidenciasAprobadas->isNotEmpty();
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.evidencias.individuales.admin-trabajador.mostrar-evidencias-individuales', [
            'evidenciasPendientes' => $this->evidenciasPendientes,
            'evidenciasAprobadas' => $this->evidenciasAprobadas,
            'evidenciasRechazadas' => $this->evidenciasRechazadas,
            'tieneEvidenciasAprobadas' => $this->tieneEvidenciasAprobadas
        ])->layout("layouts.portal_capacitacion");
    }
}
