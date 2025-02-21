<?php

namespace App\Models\Crm;

use App\Models\User;
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
        'nom035_informaciones_id', 'users_id',
    ];

    public function crmcursos()
    {
        return $this->belongsToMany(CrmCurso::class);
    }

    public function leadcliente()
    {
        return $this->belongsTo(LeadCliente::class);
    }

    public function Nom035Cotizaciones()
    {
        return $this->hasMany(Nom035Cotizacione::class);
    }

    public function Nom035Informaciones()
    {
        return $this->belongsTo(Nom035Informacione::class);
    }
}