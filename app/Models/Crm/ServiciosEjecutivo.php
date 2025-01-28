<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosEjecutivo extends Model
{
    use HasFactory;

    protected $table = 'serviesp_infoesp';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'head_asesor', 'correo', 'telefono', 'num_cotizacion', 'cotizacion_emitida', 'levantamientoPed_id'];

    public function ejectcotizacionesaprobadas()
    {
        return $this->hasMany(ejectcotizacionesaprobadas::class);
    }

    public function levantamientopedidos()
    {
        return $this->belongsTo(levantamientopedidos::class);
    }
}
