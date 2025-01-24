<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escaneardc extends Model
{
    use HasFactory;

    // Especificar la tabla en la base de datos
    protected $table = 'escaneardcs';

    // Definir la clave primaria
    protected $primaryKey = 'id';

    // Columnas asignables masivamente
    protected $fillable = [
        'id',
        'urlEsca',
        'grupocursos_capacitaciones_id'
    ];

    // Relación con la tabla Escaneardc3s (uno a muchos)
    public function grupocursos_capacitaciones()
    {
        return $this->hasMany(GrupocursoCapacitacion::class, 'grupocursos_capacitaciones_id');
    }
}