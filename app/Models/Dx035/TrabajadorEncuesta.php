<?php

namespace App\Models\Dx035;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajadorEncuesta extends Model
{
    use HasFactory;

    protected $fillable = ['Avance', 'Clave', 'fecha_fin_encuesta', 'users_id'];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'trabajadores_encuestas_id');
    }

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class, 'Clave', 'Clave');
    }
}
