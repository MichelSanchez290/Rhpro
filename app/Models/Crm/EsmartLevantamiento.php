<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsmartLevantamiento extends Model
{
    use HasFactory;

    protected $table = 'esmart_levantamientos', $primaryKey = 'id';

    protected $fillable = 
    ['nombre_cliente', 'nombre_empresa', 'giro_empresa', 'ubicacion_empresa', 
    'tamaño_empresa', 'primera_o_recompra', 'medio_cesrh', 'responsable_comercial',
    'fecha', 'correo_cliente', 'telefono_cliente', 
    ];
}
