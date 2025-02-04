<?php

namespace App\Models\Encuestas360;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta360 extends Model
{
    use HasFactory;
    protected $table = '360_encuestas';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nombre', 'descripcion', 'indicaciones'];


}
