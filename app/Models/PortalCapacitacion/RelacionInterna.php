<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacionInterna extends Model
{
    use HasFactory;
    // Especificar la tabla en la base de datos
    protected $table = 'relaciones_internas';

    // Definir la clave primaria
    protected $primaryKey = 'id';

    // Columnas asignables masivamente
    protected $fillable = ['id', 'puesto', 'razon_motivo', 'frecuencia'];

    // Relación muchos a muchos con perfiles_puestos
    public function perfiles_puestos()
    {
        return $this->belongsToMany(PerfilPuesto::class, 'relacion_interna_perfil_puesto'); // Modelo relacionado
    }
}
