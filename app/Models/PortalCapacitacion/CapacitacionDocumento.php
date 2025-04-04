<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PortalCapacitacion\CapacitacionIndividual;

class CapacitacionDocumento extends Model
{
    use HasFactory;

    protected $table = 'capacitacion_documentos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'caps_individuales_id',
        'tipo',
        'archivo'
    ];

    // Relación con la tabla de capacitaciones individuales
    public function capacitacionIndividual()
    {
        return $this->belongsTo(CapacitacionIndividual::class, 'caps_individuales_id');
    }
}
