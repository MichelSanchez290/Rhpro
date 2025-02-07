<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaRegistroPatronal extends Model
{
    use HasFactory;

    protected $table = 'empresa_registro_patronal';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'empresa_id',
        'registro_patronal_id',
        'status',
    ];
}
