<?php

namespace App\Http\Controllers\ActivoFijo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NotificacionController extends Controller
{
    public function marcarNotificacionVista(Request $request)
    {
        $id = $request->input('id');
        $tipo = $request->input('tipo');

        // Agregar la notificación a la lista de vistas en la sesión
        $notificacionesVistas = Session::get('notificaciones_vistas', []);
        $clave = $id . '-' . $tipo;
        if (!in_array($clave, $notificacionesVistas)) {
            $notificacionesVistas[] = $clave;
            Session::put('notificaciones_vistas', $notificacionesVistas);
        }

        // No necesitamos recalcular el total aquí porque el frontend lo maneja
        return response()->json(['success' => true]);
    }
}
