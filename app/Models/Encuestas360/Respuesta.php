<?php

namespace App\Models\Encuestas360;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $table = '360_respuestas';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'texto', 'puntuacion', 'preguntas_id'];
    
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'preguntas_id');
    }
}
