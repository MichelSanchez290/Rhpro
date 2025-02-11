<?php

namespace App\Models\ActivoFijo\Activos;

use App\Models\ActivoFijo\Anioestimado;
use App\Models\ActivoFijo\Tipoactivo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivoSouvenir extends Model
{
    use HasFactory;
    protected $table = 'activos_souvenirs';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id',
        'codigo',
        'productos',
        'descripcion',
        'color',
        'medida',
        'marca',
        'precio',
        'estado',
        'disponible',
        'fecha_adquisicion',
        'tipo_activo_id',
        'aniosestimado_id',
        'foto1',
        'foto2',
        'foto3',
        'empresa_id',
        'sucursal_id'
    ];

    public function tipoactivo()
    {
        return $this->belongsTo(Tipoactivo::class,'tipo_activo_id','id');
    }

    public function anioEstimado()
    {
        return $this->belongsTo(AnioEstimado::class, 'aniosestimado_id', 'id');
    }
}
