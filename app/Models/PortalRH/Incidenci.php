<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidenci extends Model
{
    use HasFactory;

    //define que este modelo corresponde a la tabla xxx en la base de datos.
    protected $table = 'incapacidades';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'tipo_incidencia', 
        'fecha_inicio',
        'fecha_final'
    ];

    public function usuarios()
    {
        //un becario pertenece a un user
        return $this->belongsToMany(User::class);
    }
}
