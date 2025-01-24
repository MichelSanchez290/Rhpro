<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacionExterna extends Model
{
    use HasFactory;
    // Especificar la tabla en la base de datos
    protected $table = 'relaciones_externas';

    // Definir la clave primaria
    protected $primaryKey = 'id';

    // Columnas asignables masivamente
    protected $fillable = ['id', 'nombre', 'razon_motivo', 'frecuencia'];

    // Relación muchos a muchos con perfiles_puestos
    public function perfiles_puestos()
    {
        return $this->belongsToMany(PerfilPuesto::class); // Modelo relacionado
    }
}
