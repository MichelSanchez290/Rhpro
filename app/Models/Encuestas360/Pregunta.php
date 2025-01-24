<?php

namespace App\Models\Encuestas360;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'preguntas';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'texto', 'descripcion'];
}
