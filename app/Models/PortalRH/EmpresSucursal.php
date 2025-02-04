<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresSucursal extends Model
{
    use HasFactory;

    protected $table = 'empresa_sucursal';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'empresa_id',
        'sucursal_id',
        'status',
    ];
}
