<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupocursoCapacitacion extends Model
{
    use HasFactory;

    // Especificar la tabla en la base de datos
    protected $table = 'grupocursos_capacitaciones';

    // Definir la clave primaria
    protected $primaryKey = 'id';

    // Columnas asignables masivamente
    protected $fillable = [
        'id',
        'NombreGrupo',
        'FechaIni',
        'FechaFin',
        'objetivo_capacitacion',
        'cursos_id'
    ];

    // Relación con la tabla Cursos (muchos a uno)
    public function curso()
    {
        return $this->belongsToMnay(Curso::class, 'cursos_id');
    }

    // Relación con la tabla Participantes (uno a muchos)
    public function participantes()
    {
        return $this->TobelongsMany(Participante::class, 'grupocursos_capacitaciones_id');
    }

    // Relación con la tabla Escaneardc3s (uno a muchos)
    public function escaneos()
    {
        return $this->TobelongsMany(Escaneardc::class, 'grupocursos_capacitaciones_id');
    }
}
