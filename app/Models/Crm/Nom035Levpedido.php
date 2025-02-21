<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nom035Levpedido extends Model
{
    use HasFactory;

    protected $table = 'nom035_levpedidos';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 'tipo_servicio', 'fecha', 'hora', 
    ];

    public function Cursos()
    {
        return $this->belongsToMany(CrmCurso::class);
    }

    public function LevantamientoPedidosTraining()
    {
        return $this->belongsTo(TrainingLevantamiento::class);
    }
}