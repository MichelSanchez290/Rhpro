<?php

namespace App\Models\Dx035;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $primaryKey = 'Clave'; // Especificar que la clave primaria es 'Clave'
    public $incrementing = false;   // Indicar que no es autoincremental
    protected $keyType = 'string';  // Especificar el tipo de la clave primaria

    protected $fillable = [
        'Clave', 'Empresa', 'RutaLogo', 'FechaInicio', 'Caducidad',
        'Estado', 'NumeroEncuestas', 'Formato', 'EncuestasContestadas',
        'Actividades', 'Numero', 'Dep', 'Cerrable', 'usuariosdx035_CorreoElectronico', 'FechaFinal'
    ];

    // Relación con la tabla pivote encuesta_cuestionario
    public function cuestionarios()
    {
        return $this->belongsToMany(Cuestionario::class, 'encuesta_cuestionario', 'encuesta_clave', 'cuestionario_id');
    }

    // Relación con Departament
    public function departamento()
    {
        return $this->belongsTo(Departament::class, 'Dep', 'id');
    }

    // Relación con TrabajadorEncuesta
    public function trabajadoresEncuestas()
    {
        return $this->hasMany(TrabajadorEncuesta::class, 'Clave', 'Clave');
    }
}
