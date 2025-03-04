<?php

namespace App\Models\Crm;

use App\Models\Empresa;
use App\Models\EsmartUniversity;
use App\Models\PortalRH\Sucursal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsmartLevantamiento extends Model
{
    use HasFactory;

    protected $table = 'esmart_levantamientos';
    protected $primaryKey = 'id';

    protected $fillable =
    [
        'id',
        'fecha',
        'hora',
        'numero_pedido',
        'users_id',
        'leads_clientes_id',
        'sucursales_id',
        'empresa_id',
        // 'numero_lead',
        // 'nombre_cliente',
        // 'medios_cesrh',
        // 'fecha_y_hora',
        // 'puesto',
        // 'correo',
        // 'correo_2',
        // 'telefono',
        // 'telefono_2',
        // 'nombre_contacto_2',
        // 'puesto_contacto_2',
        // 'tipo',
    ];

    public function leadscliente()
    {
        return $this->belongsTo(LeadCliente::class, 'leads_clientes_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursales_id');
    }

    public function esmartuniversitys()
    {
        return $this->hasMany(EsmartUniversity::class, 'esmart_levantamientos_id');
    }

    public function esmartaprobadas()
    {
        return $this->hasMany(EsmartAprobada::class);
    }
}
