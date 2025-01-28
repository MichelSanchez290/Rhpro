<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadLevantamientosPedido extends Model
{
    use HasFactory;
    
    protected $table = 'head_levantamientos_pedidos';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'responsable_comercial', 'fecha', 'nombre_cliente', 'puesto', 'empresa', 'ubicacion_empresa', 'tamano_empresa', 'primera_vez_o_recompra', 'medio_cesrh', 'numero_vacantes', 'operativas', 'especializadas', 'ejecutivas', 'correo_cliente', 'telefono', 'status', 'leadCli_id'];

    public function leadscliente()
    {
        return $this->belongsTo(leadscliente::class);
    }

    public function levantamientospedido()
    {
        return $this->hasMany(levantamientospedido::class)
    }
}
