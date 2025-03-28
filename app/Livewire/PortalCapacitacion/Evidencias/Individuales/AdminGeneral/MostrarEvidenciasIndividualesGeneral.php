<?php

namespace App\Livewire\PortalCapacitacion\Evidencias\Individuales\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\CapacitacionIndividual;
use App\Models\PortalCapacitacion\Evidencia;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\PortalCapacitacion\Escaneardc;

class MostrarEvidenciasIndividualesGeneral extends Component
{
    public $caps_individuales_id;
    public $evidencias_pendientes;
    public $evidencias_aprobadas;
    public $evidencias_rechazadas;
    public $tieneEvidenciasAprobadas = false;
    public $documentos;
    public $evidencias=[];

    protected $listeners = ['rechazarEvidencias'];

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
        $this->evidencias_pendientes = $evidencias->where('status', 'pendiente');
        $this->evidencias_aprobadas = $evidencias->where('status', 'aprobado');
        $this->evidencias_rechazadas = $evidencias->where('status', 'rechazado');

        $this->tieneEvidenciasAprobadas = $this->evidencias_aprobadas->isNotEmpty();
        // Obtener documentos escaneados
        $this->documentos = Escaneardc::where('capacitacion_individual_id', $this->caps_individuales_id)->get();

        $this->grupoEvidencias = $evidencias;
    }

    public function aprobarEvidencias()
    {
        DB::table('evidencias')
            ->whereIn('id', $this->evidencias_pendientes->pluck('id'))
            ->update([
                'status' => 'aprobado',
                'fecha' => Carbon::now()->toDateTimeString(),
            ]);

        $this->cargarEvidencias();
    }

    public function rechazarEvidencias($comentario)
    {
        DB::table('evidencias')
            ->whereIn('id', $this->evidencias_pendientes->pluck('id'))
            ->update([
                'status' => 'rechazado',
                'comentarios' => $comentario,
                'fecha' => Carbon::now()->toDateTimeString(),
            ]);

        $this->cargarEvidencias();
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.evidencias.individuales.admin-general.mostrar-evidencias-individuales-general', [
            'evidenciasPendientes' => $this->evidencias_pendientes,
            'evidenciasAprobadas' => $this->evidencias_aprobadas,
            'evidenciasRechazadas' => $this->evidencias_rechazadas,
            'documentos' => $this->documentos,
            'tieneEvidenciasAprobadas' => $this->tieneEvidenciasAprobadas
        ])->layout("layouts.portal_capacitacion");
    }
}
