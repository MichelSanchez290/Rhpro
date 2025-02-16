<?php

namespace App\Models\ActivoFijo;

use App\Models\ActivoFijo\Activos\ActivoMobiliario;
use App\Models\ActivoFijo\Activos\ActivoOficina;
use App\Models\ActivoFijo\Activos\ActivoSouvenir;
use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anioestimado extends Model
{
    use HasFactory;
    protected $table = 'aniosestimados';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id',
        'vida_util_año',
        'tipo_activo_id'
    ];

    public function tipoactivos()
    {
        return $this->belongsTo(Tipoactivo::class);
    }
    public function activosouvenirs()
    {
        return $this->hasMany(ActivoSouvenir::class);
    }
    public function activooficinas()
    {
        return $this->hasMany(ActivoOficina::class);
    }
    public function activotecnologias()
    {
        return $this->hasMany(ActivoTecnologia::class);
    }
    public function activomobiliarios()
    {
        return $this->hasMany(ActivoMobiliario::class);
    }
}
