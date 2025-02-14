<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nom035Levpedido extends Model
{
    use HasFactory;

    protected $table = 'nom035_levpedido';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'nombre_cliente', 'nombre_empresa', 'giro_empresa', 'ubicacion_empresa','medio_cesrh', 'responsable_comercial', 'tipo_servicio', 'fecha', 'correo_cliente', 'telefono_cliente', 'leadsCli_id', 'users_id', '035info_id'];

    public function Cursos()
    {
        return $this->belongsToMany(CrmCurso::class);
    }

    public function LevantamientoPedidosTraining()
    {
        return $this->belongsTo(TrainingLevantamiento::class);
    }
}