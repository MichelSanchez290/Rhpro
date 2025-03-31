<?php

namespace App\Livewire\PortalCapacitacion\Evidencias\Grupales\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\Evidencia;
use Illuminate\Support\Facades\Crypt;
use App\Models\PortalCapacitacion\Escaneardc;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MostrarEvidenciasGeneralGrupales extends Component
{
    public $caps_grupales_id;  
    public $evidencias_pendientes;
    public $evidencias_aprobadas;
    public $evidencias_rechazadas;
    public $documentos;
    public $tieneEvidenciasAprobadas = false;
    public $evidencias=[];
    public $participantes=[];
    public $participanteSeleccionado;
    public $grupoEvidencias;

    protected $listeners = ['rechazarEvidencias'];

    public function mount($id)
    {
        $this->caps_grupales_id = Crypt::decrypt($id);
        $this->cargarEvidencias();
        $this->cargarParticipantes();
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
        $this->evidencias_pendientes = $evidencias->where('status', 'pendiente');
        $this->evidencias_aprobadas = $evidencias->where('status', 'aprobado');
        $this->evidencias_rechazadas = $evidencias->where('status', 'rechazado');

        // Verificar si hay alguna evidencia con status 'aprobado'
        $this->tieneEvidenciasAprobadas = $this->evidencias_aprobadas->isNotEmpty();

        // Obtener documentos escaneados
        $this->documentos = Escaneardc::where('grupocursos_capacitaciones_id', $this->caps_grupales_id)->get();

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

    public function cargarParticipantes()
    {
        $this->participantes = DB::table('participante_user')
            ->join('users', 'participante_user.users_id', '=', 'users.id')
            ->where('participante_user.grupocursos_capacitaciones_id', $this->caps_grupales_id) // <-- Corregido
            ->select('users.id as user_id', 'users.name')
            ->get();
    }    

    public function render()
    {
        return view('livewire.portal-capacitacion.evidencias.grupales.admin-general.mostrar-evidencias-grupales-general', [
            'evidencias_pendientes' => $this->evidencias_pendientes,
            'evidencias_aprobadas' => $this->evidencias_aprobadas,
            'evidencias_rechazadas' => $this->evidencias_rechazadas,
            'documentos' => $this->documentos,
            'tieneEvidenciasAprobadas' => $this->tieneEvidenciasAprobadas,
            'participantes' => $this->participantes,
            'grupoEvidencias' => $this->grupoEvidencias,
        ])->layout("layouts.portal_capacitacion");
    }
}
