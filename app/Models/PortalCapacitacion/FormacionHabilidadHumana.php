<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormacionHabilidadHumana extends Model
{
    use HasFactory;
    // Especificar la tabla en la base de datos
    protected $table = 'formaciones_humanas';

    // Definir la clave primaria
    protected $primaryKey = 'id';

    // Columnas asignables masivamente
    protected $fillable = ['id', 'descripcion', 'nivel'];

    // Relación muchos a muchos con perfiles_puestos
    public function perfiles_puestos()
    {
        return $this->belongsToMany(PerfilPuesto::class, 'formacion_humana_perfil_puesto', 'perfiles_puestos_id', 'formaciones_humanas_id'); // Modelo relacionado
    }
}
