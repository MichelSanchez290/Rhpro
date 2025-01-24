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
    protected $fillable = ['id', 'realizada', 'fecha', 'calificador_id', 'calificado_id'];
    public function calificador()
    {
        return $this->belongsTo(User::class, 'calificador_id');
    }
    public function calificado()
    {
        return $this->belongsTo(User::class, 'calificado_id');
    }
}
