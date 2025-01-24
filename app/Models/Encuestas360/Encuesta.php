<?php

namespace App\Models\Encuestas360;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'encuestas';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nombre', 'descripcion', 'indicaciones'];
}
