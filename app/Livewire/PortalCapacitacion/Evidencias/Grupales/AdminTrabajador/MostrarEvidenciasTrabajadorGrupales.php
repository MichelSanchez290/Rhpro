<?php

namespace App\Livewire\PortalCapacitacion\Evidencias\Grupales\AdminTrabajador;

use Livewire\Component;
use App\Models\PortalCapacitacion\Escaneardc;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\PortalCapacitacion\Evidencia;

class MostrarEvidenciasTrabajadorGrupales extends Component
{
    public $caps_grupales_id;  
    public $evidenciasPendientes;
    public $evidenciasAprobadas;
    public $evidenciasRechazadas;
    public $documentos;
    public $tieneEvidenciasAprobadas = false;
    public $evidencias=[];


    protected $listeners = ['rechazarEvidencias'];

    public function mount($id)
    {
        $this->caps_grupales_id = Crypt::decrypt($id);
        $this->cargarEvidencias();
    }

    public function cargarEvidencias()
    {
        // Obtener evidencias separadas por su estado
        $evidencias = DB::table('evidencias')
            ->join('participante_evidencia', 'evidencias.id', '=', 'participante_evidencia.evidencias_id')
            ->join('participantes', 'participantes.id', '=', 'participante_evidencia.participantes_id')
            ->where('participante_evidencia.grupocursos_capacitaciones_id', $this->caps_grupales_id)
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

        // Verificar si hay alguna evidencia con status 'aprobado'
        $this->tieneEvidenciasAprobadas = $this->evidenciasAprobadas->isNotEmpty();

        // Obtener documentos escaneados
        $this->documentos = Escaneardc::where('grupocursos_capacitaciones_id', $this->caps_grupales_id)->get();

        $this->grupoEvidencias = $evidencias; // Para tener todas las evidencias agrupadas

    }

    public function render()
    {
        return view('livewire.portal-capacitacion.evidencias.grupales.admin-trabajador.mostrar-evidencias-grupales', [
            'evidenciasPendientes' => $this->evidenciasPendientes,
            'evidenciasAprobadas' => $this->evidenciasAprobadas,
            'evidenciasRechazadas' => $this->evidenciasRechazadas,
            'documentos' => $this->documentos,
            'tieneEvidenciasAprobadas' => $this->tieneEvidenciasAprobadas,
            'grupoEvidencias' => $this->grupoEvidencias,
        ])->layout("layouts.portal_capacitacion");
    }
}
