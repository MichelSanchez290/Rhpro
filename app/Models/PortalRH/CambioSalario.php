<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CambioSalario extends Model
{
    use HasFactory;

    //define que este modelo corresponde a la tabla xxx en la base de datos.
    protected $table = 'cambio_salarios';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'fecha_cambio', 
        'salario_anterior',
        'salario_nuevo',
        'motivo',
        'documento',
        'observaciones'
    ];

    public function usuarios()
    {
        //un becario pertenece a un user
        return $this->belongsToMany(User::class);
    }
}
