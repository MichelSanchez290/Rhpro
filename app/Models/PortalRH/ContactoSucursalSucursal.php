<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoSucursalSucursal extends Model
{
    use HasFactory;

    protected $table = 'contacto_sucursal_sucursal';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'contacto_sucursal_id',
        'sucursal_id',
        'status',
    ];
}
