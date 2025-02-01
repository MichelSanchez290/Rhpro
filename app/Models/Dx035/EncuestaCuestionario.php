<?php

namespace App\Models\Dx035;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestaCuestionario extends Model
{
    use HasFactory;

    protected $table = 'encuesta_cuestionario';

    protected $fillable = [
        'encuesta_clave', 'cuestionario_id'
    ];

    // Relación con Encuesta
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class, 'encuesta_clave', 'Clave');
    }

    // Relación con Cuestionario
    public function cuestionario()
    {
        return $this->belongsTo(Cuestionario::class, 'cuestionario_id');
    }
}
