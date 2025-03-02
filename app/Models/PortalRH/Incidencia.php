<?php

namespace App\Models\PortalRH;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    //define que este modelo corresponde a la tabla xxx en la base de datos.
    protected $table = 'incapacidades';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'tipo_incidencia', //seleccionar vacaciones, permisos, etc
        'fecha_inicio',
        'fecha_final'
    ];

    public function usuarios()
    {
        //un becario pertenece a un user
        return $this->belongsToMany(User::class)->withPivot('user_id', 'incidencia_id');
    }
}
