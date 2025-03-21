<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapIndividuales;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReconocimientoControllerInd
{
    public function descargar($id)
    {
        $capsIndividualesId = Crypt::decrypt($id);
    
        // Verificar si hay evidencias aprobadas antes de permitir la descarga
        $tieneEvidenciasAprobadas = DB::table('evidencias')
            ->whereIn('id', function ($query) use ($capsIndividualesId) {
                $query->select('evidencias_id')
                    ->from('evidencia_cap_individual')
                    ->where('caps_individuales_id', $capsIndividualesId);
            })
            ->where('status', 'aprobado')
            ->exists();
    
        if (!$tieneEvidenciasAprobadas) {
            return redirect()->back()->with('error', 'No se puede descargar el reconocimiento sin evidencias aprobadas.');
        }
        
        $capacitacion = DB::table('caps_individuales')
            ->where('id', $capsIndividualesId)
            ->select('cursos_id')
            ->first();

        if (!$capacitacion) {
            return redirect()->back()->with('error', 'No se encontró la capacitación.');
        }

        $curso = DB::table('cursos')
            ->where('id', $capacitacion->cursos_id)
            ->select('nombre', 'horas')
            ->first();;
    
        // Obtener datos de las fechas de inicio y fin del curso
        $fechas = DB::table('caps_individuales')
            ->where('id', $capsIndividualesId)
            ->select('fechaIni', 'fechaFin')
            ->first();
    
        // 🔥 Obtener el usuario correcto desde la tabla pivote
        $user = DB::table('users')
            ->join('cap_individual_user', 'users.id', '=', 'cap_individual_user.users_id')
            ->where('cap_individual_user.caps_individuales_id', $capsIndividualesId)
            ->select('users.id', 'users.name')
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'No se encontró el usuario asociado a esta capacitación.');
        }
    
        // Generar el PDF con los datos del curso, fechas y usuario
        $pdf = Pdf::loadView('livewire.portal-capacitacion.capacitaciones.reconocimiento', [
            'id' => $capsIndividualesId,
            'curso' => $curso,
            'fechas' => $fechas,
            'user' => $user,
        ])->setPaper('a4', 'landscape');
    
        return $pdf->download('Reconocimiento.pdf');
    }
    

}

