<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmContacto extends Model
{
    use HasFactory;

    protected $table = 'crm_contactos';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'nombre', 'puesto', 'correo', 'correo2', 'telefono', 'telefono2'];
}
