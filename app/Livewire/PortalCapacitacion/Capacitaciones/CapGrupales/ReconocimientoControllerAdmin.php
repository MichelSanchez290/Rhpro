<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapGrupales;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReconocimientoControllerAdmin
{
    
    public function descargar($caps_grupales_id, $participante_id)
    {
        $caps_grupales_id = Crypt::decrypt($caps_grupales_id);
        $participante_id = Crypt::decrypt($participante_id);

        // Verificar si hay evidencias aprobadas antes de permitir la descarga
        $tieneEvidenciasAprobadas = DB::table('evidencias')
            ->whereIn('id', function ($query) use ($caps_grupales_id) {
                $query->select('evidencias_id')
                    ->from('participante_evidencia')
                    ->where('grupocursos_capacitaciones_id', $caps_grupales_id);
            })
            ->where('status', 'aprobado')
            ->exists();

        if (!$tieneEvidenciasAprobadas) {
            return redirect()->back()->with('error', 'No se puede descargar el reconocimiento sin evidencias aprobadas.');
        }

        // Obtener datos del curso
        $curso = DB::table('cursos')
            ->where('id', $caps_grupales_id)
            ->select('nombre', 'horas')
            ->first();

        // Obtener datos de las fechas de inicio y fin del curso
        $fechas = DB::table('grupocursos_capacitaciones')
            ->where('id', $caps_grupales_id)
            ->select('fechaIni', 'fechaFin')
            ->first();

        $user = DB::table('users')
            ->join('participante_user', 'users.id', '=', 'participante_user.users_id')
            ->where('participante_user.users_id', $participante_id) // <- Aquí se corrige
            ->where('participante_user.grupocursos_capacitaciones_id', $caps_grupales_id)
            ->select('users.id', 'users.name')
            ->first();   

        // Generar el PDF con los datos del curso, fechas y usuario
        $pdf = Pdf::loadView('livewire.portal-capacitacion.capacitaciones.reconocimiento', [
            'id' => $caps_grupales_id,
            'curso' => $curso,
            'fechas' => $fechas,
            'user' => $user, // Ahora contiene el nombre del usuario seleccionado
        ]);

        return $pdf->download('Reconocimiento.pdf');
    }      

}

