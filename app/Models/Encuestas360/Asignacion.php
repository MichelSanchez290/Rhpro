<?php

namespace App\Models\Encuestas360;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $table = 'asignaciones';
    protected $primaryKey = 'id';
    protected $fillable = [
        'calificador_id',
        'calificado_id',
        'relaciones_id',
        '360_encuestas_id',
        'realizada',
        'fecha'
    ];

    public function calificador()
    {
        return $this->belongsTo(User::class, 'calificador_id');
    }

    public function calificado()
    {
        return $this->belongsTo(User::class, 'calificado_id');
    }

    public function relacion()
    {
        return $this->belongsTo(Relacion::class, 'relaciones_id');
    }

    public function encuesta()
    {
        return $this->belongsTo(Encuesta360::class, '360_encuestas_id');
    }
}

