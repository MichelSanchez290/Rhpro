<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapIndividuales;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DC3Controller
{
  public function descargar(Request $request, $id)
  {
      $capsIndividualesId = Crypt::decrypt($id);
  
      // Obtener datos adicionales del request
      $instructor = $request->input('instructor');
      $patron = $request->input('patron');
      $representante = $request->input('representante');
  
      // Validar que los datos estén completos
      if (!$instructor || !$patron || !$representante) {
          return redirect()->back()->with('error', 'Todos los campos son obligatorios.');
      }
  
      // Obtener datos del usuario, puesto, curp, empresa, curso y fechas
      $user = DB::table('users')
          ->join('cap_individual_user', 'users.id', '=', 'cap_individual_user.users_id')
          ->where('cap_individual_user.caps_individuales_id', $capsIndividualesId)
          ->select('users.id', 'users.name', 'users.puesto_id', 'users.empresa_id')
          ->first();

      $nombreCompleto = explode(" ", trim($user->name));

          // Si hay al menos 3 partes, asumir que el formato es correcto
          if (count($nombreCompleto) >= 3) {
              $apellidoPaterno = $nombreCompleto[count($nombreCompleto) - 2]; // Penúltima palabra
              $apellidoMaterno = $nombreCompleto[count($nombreCompleto) - 1]; // Última palabra
              $nombres = implode(" ", array_slice($nombreCompleto, 0, count($nombreCompleto) - 2)); // Resto del nombre
          } else {
              // Si hay menos de 3 partes, asumir que solo hay nombre y un apellido
              $apellidoPaterno = $nombreCompleto[1] ?? ''; 
              $apellidoMaterno = '';
              $nombres = $nombreCompleto[0] ?? ''; 
          }
          
          // Concatenar en el orden correcto
     $nombreFormatoCD3 = strtoupper("$apellidoPaterno $apellidoMaterno $nombres");
  
      $puesto = DB::table('puestos')
        ->where('id', $user->puesto_id)
        ->value('nombre_puesto');

      $curp = DB::table('trabajadores')->where('user_id', $user->id)->value('curp') ??
              DB::table('becarios')->where('user_id', $user->id)->value('curp') ??
              DB::table('practicantes')->where('user_id', $user->id)->value('curp') ??
              DB::table('instructores')->where('user_id', $user->id)->value('curp');
  
      $curso = DB::table('caps_individuales')
          ->join('cursos', 'caps_individuales.cursos_id', '=', 'cursos.id')
          ->where('caps_individuales.id', $capsIndividualesId)
          ->select('cursos.nombre', 'cursos.horas', 'cursos.tematicas_id')
          ->first();
  
      $tematica = DB::table('tematicas')->where('id', $curso->tematicas_id)->value('nombre');
  
      $empresa = DB::table('empresas')
          ->where('id', $user->empresa_id)
          ->select('razon_social', 'rfc')
          ->first();
  
      $fechas = DB::table('caps_individuales')
          ->where('id', $capsIndividualesId)
          ->select('fechaIni', 'fechaFin', 'ocupacion_especifica')
          ->first();
  
      // Generar el PDF con los datos
      $pdf = Pdf::loadView('livewire.portal-capacitacion.capacitaciones.dc3', [
          'user' => $user,
          'nombreFormatoCD3' => $nombreFormatoCD3,
          'puesto' => strtoupper((string) $puesto),
          'curp' => strtoupper((string) $curp), 
          'curso' => $curso,
          'tematica' => $tematica,
          'empresa' => $empresa,
          'fechas' => $fechas,
          'instructor' => $instructor,
          'patron' => $patron,
          'representante' => $representante,
          'ocupacion_especifica' => $fechas->ocupacion_especifica,
      ])->setPaper('a4', 'portrait');
  
      return $pdf->download('DC3.pdf');
  }
  
}
