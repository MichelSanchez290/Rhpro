<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapacitacionIndividual extends Model
{
    use HasFactory;
    
    // Especificar la tabla en la base de datos
    protected $table = 'caps_individuales';

    // Definir la clave primaria
    protected $primaryKey = 'id';

    // Columnas asignables masivamente
    protected $fillable = ['id','fechaIni', 'fechaFin', 'nombreCapacitacion', 'objetivoCapacitacion', 'cursos_id'];

    public function cursos()
    {
        return $this->belongsTo(Curso::class, 'cursos_id');
    }

    public function evidencias()
    {
        return $this->belongsToMany(Evidencia::class);
    }
}
