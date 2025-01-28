<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EjectCotizacionesAprobada extends Model
{
    use HasFactory;

    protected $table = 'eject_cotizaciones_aprobadas';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'fecha_aprobacion', 'correo_enviado', 'serviEjec_id'];

    public function ServiciosEjecutivos()
    {
        return $this->belongsTo(ServiciosEjecutivos::class);
    }
}
