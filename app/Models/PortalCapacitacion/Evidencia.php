<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    use HasFactory;
    
    // Especificar la tabla en la base de datos
    protected $table = 'evidencias';

    // Definir la clave primaria
    protected $primaryKey = 'id';

    // Columnas asignables masivamente
    protected $fillable = ['id', 'evidencias', 'comentarios', 'status', 'fecha'];

    // Relación muchos a muchos con CapacitacionesIndividuales
    public function capacitacionesIndividuales()
    {
        return $this->belongsToMany(CapacitacionIndividual::class);
    }

    // Relación muchos a muchos con Participantes
    public function participantes()
    {
        return $this->belongsToMany(Participante::class);
    }
}
