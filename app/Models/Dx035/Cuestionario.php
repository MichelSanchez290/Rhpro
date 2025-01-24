<?php

namespace App\Models\Dx035;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'giasreferencias_id'];

    public function preguntasBases()
    {
        return $this->hasMany(PreguntaBase::class, 'cuestionarios_id');
    }

    public function giaReferencia()
    {
        return $this->belongsTo(GiaReferencia::class, 'giasreferencias_id');
    }
}
