<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmCurso extends Model
{
    use HasFactory;

    protected $table = 'crm_cursos';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 'nombre_curso', 'modalidad', 'participantes', 'grupos', 'puestos_participantes', 'experiencia', 
        'cual', 'objetivo_curso', 'fecha_tentativa', 'presupuesto', 'training_levantamientos_id',
    ];

    public function traininglevantamiento()
    {
        return $this->belongsTo(TrainingLevantamiento::class);
    }
}
