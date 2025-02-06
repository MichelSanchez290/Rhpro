<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosEspecializado extends Model
{
    use HasFactory;

    protected $table = 'servicios_especializados';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'head_asesor', 'correo', 'telefono', 'num_cotizacion', 'cotizacion_emitida', 'cotizacion_valida_hasta', 'levantamientoPed_id', 'primera_vez_o_recompra', 'medio_cesrh', 'numero_vacantes', 'operativas', 'especializadas', 'ejecutivas', 'correo_cliente', 'telefono', 'status', 'leadCli_id'];

    public function serviciosejecutivo()
    {
        return $this->hasMany(serviciosejecutivos::class);
    }

    public function leadscliente()
    {
        return $this->belongsTo(leadscliente::class);
    }
}
