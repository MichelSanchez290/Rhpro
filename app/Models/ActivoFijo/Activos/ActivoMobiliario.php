<?php

namespace App\Models\ActivoFijo\Activos;

use App\Models\ActivoFijo\Anioestimado;
use App\Models\ActivoFijo\Foto;
use App\Models\ActivoFijo\Tipoactivo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivoMobiliario extends Model
{
    use HasFactory;
    protected $table = 'activos_mobiliarios';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'num_serie',
        'num_activo',
        'ubicacion_fisica',
        'fecha_adquisicion',
        'fecha_baja',
        'tipo_activo_id',
        'precio_adquisicion',
        'aniosestimado_id'
    ];

    public function tipoactivo()
    {
        return $this->belongsTo(Tipoactivo::class);
    }

    public function anioestimado()
    {
        return $this->belongsTo(Anioestimado::class);
    }

    //Relaciones muchos a muchos
    public function fotos()
    {
        return $this->belongsToMany(Foto::class);
    }
    public function usuarios()
    {
        return $this->belongsToMany(User::class);
    }

}
