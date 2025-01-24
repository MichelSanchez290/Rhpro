<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Especificar la tabla en la base de datos
    protected $table = 'cursos';

    // Definir la clave primaria
    protected $primaryKey = 'id';

    // Columnas asignables masivamente
    protected $fillable = ['id','CNombre', 'CHoras', 'CPrecio', 'Ctipoestatus', 'tematicas_id', 'Modalidad'];

    // Relación inversa (pertenece a una temática)
    public function tematica()
    {
        return $this->belongsTo(Tematica::class, 'tematicas_id');
    }
}

