<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoPuesto extends Model
{
    use HasFactory;

    protected $table = 'departament_puest';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'departamento_id',
        'puesto_id',
        'status',
    ];
}
