<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importa el modelo User

class RegistPatronal extends Model
{
    use HasFactory;

    //define que este modelo corresponde a la tabla xxx en la base de datos.
    protected $table = 'registros_patronales';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'registro_patronal', 
        'rfc',
        'nombre_o_razon_social',
        'regimen_capital',
        'regimen_fiscal',
        'actividad_economica',
        'imss_calle_manzana',
        'imms_num_exterior',
        'imms_num_int',
        'imms_colonia',
        'imms_codigo_postal',
        'imms_estado',
        'imms_municipio',
        'imms_telefono',
        'imms_convenio_rembolso_subsidios',
        'imms_tipo_contribucion',
        'area_geografica',
        'delegacion_imms',
        'subdelegacion_imms',
        'prima_año',
        'prima_mes',
        'porcentaje_prima_rt',
        'clase_riesgo_trabajo',
        'acreditacion_stps',
        'representante_legal',
        'puesto_representante',
        'cuenta_contable',
        'user_id',
    ];

    //alcanze con el modelo User
    public function usuario()
    {
        return $this->hasMany(User::class);
    }

    public function sucursales()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function empresas()
    {
        return $this->belongsToMany(Empres::class);
    }
}
