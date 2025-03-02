<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionesEjecutivo extends Model
{
    use HasFactory;

    protected $table = 'datos_fiscales';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'numeroCotizacion', 'servicio', 'ubicacion', 'puesto', 'cantidad', 'sueldoMensual', 'comision', 'puPorVacante', 'puSinIva'];
}
