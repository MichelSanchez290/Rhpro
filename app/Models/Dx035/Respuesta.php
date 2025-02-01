<?php

namespace App\Models\Dx035;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = ['ValorRespuesta', 'preguntasbases_id', 'trabajadores_encuestas_id'];

    public function preguntaBase()
    {
        return $this->belongsTo(PreguntaBase::class, 'preguntasbases_id');
    }

    public function trabajadorEncuesta()
    {
        return $this->belongsTo(TrabajadorEncuesta::class, 'trabajadores_encuestas_id');
    }
}
