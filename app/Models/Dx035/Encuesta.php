<?php

namespace App\Models\Dx035;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PortalRH\SucursalDepartament;

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

    // Relación con SucursalDepartament
    public function sucursalDepartament()
    {
        return $this->belongsTo(SucursalDepartament::class, 'sucursal_departament_id');
    }

    // Relación con la tabla pivote encuesta_cuestionario
    public function cuestionarios()
    {
        return $this->belongsToMany(Cuestionario::class, 'encuesta_cuestionario', 'encuesta_clave', 'cuestionario_id');
    }

    // Método para calcular el avance de la encuesta
    public function avance()
    {
        if ($this->NumeroEncuestas > 0) {
            return ($this->EncuestasContestadas / $this->NumeroEncuestas) * 100;
        }
        return 0;
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
