<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadLevantamientosPedido extends Model
{
    use HasFactory;

    protected $table = 'head_levantamiento_pedidos';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 'tipo_servicio', 'fecha',
        'hora', 'total_vacantes', 'operativos',
        'ejecutivos', 'numero_pedido'
    ];

    public function leadscliente()
    {
        return $this->belongsTo(LeadCliente::class);
    }

    // public function levantamientospedido()
    // {
    //     return $this->hasMany(levantamientospedido::class);
    // }
}