<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCambioSalario extends Model
{
    use HasFactory;

    protected $table = 'user_cambio_salari';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id',
        'user_id', 
        'cambio_salario_id',
        'fecha',
    ];
}
