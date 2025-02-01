<?php

namespace App\Models\Dx035;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Encuesta extends Model
{
    use HasFactory;

    protected $primaryKey = 'Clave';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'Clave', 'Empresa', 'RutaLogo', 'FechaInicio', 'Caducidad',
        'Estado', 'NumeroEncuestas', 'Formato', 'EncuestasContestadas',
        'Actividades', 'Numero', 'Dep', 'Cerrable', 'usuariosdx035_CorreoElectronico', 'FechaFinal'
    ];

    public function trabajadoresEncuestas()
    {
        return $this->hasMany(TrabajadorEncuesta::class, 'Clave', 'Clave');
    }

    // Relación con Departament
    public function departamento()
    {
        return $this->belongsTo(Departament::class, 'Dep', 'id'); // 'Dep' es la clave foránea en Encuesta
    }
}
