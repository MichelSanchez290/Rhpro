<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipodocument; // Importa el modelo
use App\Models\User;

class Documento extends Model
{
    use HasFactory;

    //define que este modelo corresponde a la tabla xxx en la base de datos.
    protected $table = 'documentos';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'archivo', 
        'fecha_subida',
        'status',
        'numero',
        'original',
        'comentarios',
        'tipo_documento'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_documento', 'documento_id', 'user_id')->withTimestamps();
    }
}
