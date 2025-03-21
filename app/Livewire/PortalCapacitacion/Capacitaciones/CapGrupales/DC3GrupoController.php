<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapGrupales;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class DC3GrupoController
{
    public function descargar(Request $request, $id)
    {
        $grupoCursosCapacitacionesId = Crypt::decrypt($id);

        // Obtener datos adicionales del request
        $instructor = $request->input('instructor');
        $patron = $request->input('patron');
        $representante = $request->input('representante');

        if (!$instructor || !$patron || !$representante) {
            return redirect()->back()->with('error', 'Todos los campos son obligatorios.');
        }

        // Obtener todos los participantes del grupo
        $participantes = DB::table('participante_user')
            ->where('grupocursos_capacitaciones_id', $grupoCursosCapacitacionesId)
            ->join('users', 'participante_user.users_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.puesto_id', 'users.empresa_id')
            ->get();

        if ($participantes->isEmpty()) {
            return redirect()->back()->with('error', 'No hay participantes en este grupo.');
        }

        // Obtener información del curso
        $capacitacion = DB::table('grupocursos_capacitaciones')
            ->where('id', $grupoCursosCapacitacionesId)
            ->select('cursos_id')
            ->first();

        if (!$capacitacion) {
            return redirect()->back()->with('error', 'No se encontró la capacitación.');
        }

        $curso = DB::table('cursos')
            ->where('id', $capacitacion->cursos_id)
            ->select('nombre', 'horas', 'tematicas_id')
            ->first();

        $tematica = DB::table('tematicas')->where('id', $curso->tematicas_id)->value('nombre');

        $fechas = DB::table('grupocursos_capacitaciones')
            ->where('id', $grupoCursosCapacitacionesId)
            ->select('fechaIni', 'fechaFin')
            ->first();

        // Obtener datos de cada participante
        $data = [];

        foreach ($participantes as $user) {
            $puesto = DB::table('puestos')->where('id', $user->puesto_id)->value('nombre_puesto');
            $curp = DB::table('trabajadores')->where('user_id', $user->id)->value('curp') ??
                    DB::table('becarios')->where('user_id', $user->id)->value('curp') ??
                    DB::table('practicantes')->where('user_id', $user->id)->value('curp') ??
                    DB::table('instructores')->where('user_id', $user->id)->value('curp');

            $empresa = DB::table('empresas')
                ->where('id', $user->empresa_id)
                ->select('razon_social', 'rfc')
                ->first();

            $data[] = [
                'user' => $user,
                'puesto' => $puesto,
                'curp' => $curp,
                'empresa' => $empresa,
                'curso' => $curso,
                'tematica' => $tematica,
                'fechas' => $fechas,
                'instructor' => $instructor,
                'patron' => $patron,
                'representante' => $representante,
            ];
        }

        // Generar un PDF con todos los DC3 en una sola descarga
        $pdf = Pdf::loadView('livewire.portal-capacitacion.capacitaciones.dc3-grupal', ['data' => $data])
            ->setPaper('a4', 'portrait');

        return $pdf->download('DC3_Grupo.pdf');
    }
}
