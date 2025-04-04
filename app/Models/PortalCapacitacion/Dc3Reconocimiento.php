<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PortalCapacitacion\GrupocursoCapacitacion;

class Dc3Reconocimiento extends Model
{
    use HasFactory;

    protected $table = 'dc3_reconocimientos'; // Nombre de la tabla en la BD

    protected $primaryKey = 'id';

    protected $fillable = [
        'grupocursos_capacitaciones_id',
        'dc3',
        'reconocimiento',
    ];
    
    public function grupoCursoCapacitacion()
    {
        return $this->belongsTo(GrupocursoCapacitacion::class, 'grupocursos_capacitaciones_id');
    }
    
}
