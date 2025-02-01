<?php

namespace App\Models\Encuestas360;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaUsuario extends Model
{
    use HasFactory;

    protected $table = 'respuestas_usuarios';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'respuestas_id', 'asignaciones_id'];
    public function respuesta()
    {
        return $this->belongsTo(Respuesta::class, 'respuestas_id');
    }
    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class, 'asignaciones_id');
    }
}
