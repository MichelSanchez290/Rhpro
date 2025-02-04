<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaSucursal extends Model
{
    use HasFactory;

    protected $table = 'empresa_sucursal';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'sucursal_id', 'empresa_id'];
}
