<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingLevantamiento extends Model
{
    use HasFactory;

    protected $table = 'training_levantamientos';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'nombre_cliente', 'nombre_empresa', 'giro_empresa', 'ubicacion_empresa', 'tamano_empresa', 'primera_vez_o_recompra', 'medio_cesrh', 'responsable_comercial', 'fecha', 'correo_cliente', 'telefono_cliente', 'leadsCli_id', 'users_id'];

    public function LeadsClientes()
    {
        return $this->belongsTo(LeadsClientes::class);
    }

    public function Users()
    {
        return $this->belongsTo(Users::class);
    }

    public function trainingservicio()
    {
        return $this->hasMany(trainingservicio::class);
    }
}
