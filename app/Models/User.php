<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\ActivoFijo\Activos\ActivoMobiliario;
use App\Models\ActivoFijo\Activos\ActivoOficina;
use App\Models\ActivoFijo\Activos\ActivoPapeleria;
use App\Models\ActivoFijo\Activos\ActivoSouvenir;
use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use App\Models\ActivoFijo\Activos\ActivoUniforme;
use App\Models\Crm\EsmartLevantamiento;
use App\Models\Crm\LeadCliente;
use App\Models\Crm\LeadsCliente;
use App\Models\Crm\Nom035Levpedido;
use App\Models\Crm\TrainingLevantamiento;
use App\Models\Dx035\DatoTrabajador;
use App\Models\Encuestas360\Asignacion;
use App\Models\PortalCapacitacion\PerfilPuesto;
use App\Models\PortalRH\Becari;
use App\Models\PortalRH\Becario;
use App\Models\PortalRH\CambioSalario;
use App\Models\PortalRH\Documento;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Incapacidad;
use App\Models\PortalRH\Incidencia;
use App\Models\PortalRH\Retardo;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\Puesto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'password', 'empresa_id', 'sucursal_id', 'tipo_user', 'departamento_id', 'puesto_id'];

    /**sucursal_id
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = ['profile_photo_url'];

    /* RELACIONES MODULO RH */

    public function becarios()
    {
        return $this->hasMany(Becario::class);
    }




    public function activosMobiliario()
    {
        return $this->belongsToMany(ActivoMobiliario::class, 'activos_mobiliario_user', 'user_id', 'activos_mobiliarios_id')
            ->withPivot('fecha_asignacion', 'fecha_devolucion', 'observaciones', 'status', 'foto1')
            ->withTimestamps();
    }
    public function activosOficina()
    {
        return $this->belongsToMany(ActivoOficina::class, 'activos_oficina_user', 'user_id', 'activos_oficinas_id')
            ->withPivot('fecha_asignacion', 'fecha_devolucion', 'observaciones', 'status', 'foto')
            ->withTimestamps();
    }
    public function activosPapeleria()
    {
        return $this->belongsToMany(ActivoPapeleria::class, 'activos_papeleria_user', 'user_id', 'activos_papelerias_id')
            ->withPivot('fecha_asignacion', 'fecha_devolucion', 'observaciones', 'status')
            ->withTimestamps();
    }
    public function activosSouvenir()
    {
        return $this->belongsToMany(ActivoPapeleria::class, 'activos_souvenir_user', 'user_id', 'activos_souvenirs_id')
            ->withPivot('fecha_asignacion', 'fecha_devolucion', 'observaciones', 'status')
            ->withTimestamps();
    }
    public function activosTecnologia()
    {
        return $this->belongsToMany(ActivoTecnologia::class, 'activos_tecnologia_user', 'user_id', 'activos_tecnologias_id')
            ->withPivot('fecha_asignacion', 'fecha_devolucion', 'observaciones', 'status', 'foto1', 'foto2', 'foto3')
            ->withTimestamps();
    }

    public function activosUniforme()
    {
        return $this->belongsToMany(ActivoUniforme::class, 'activos_uniforme_user', 'user_id', 'activos_uniformes_id')
            ->withPivot('fecha_asignacion', 'fecha_devolucion', 'observaciones', 'status', 'foto')
            ->withTimestamps();
    }

    //  /* RELACIONES MODULO CAPACITACION */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    // public function asignacion()
    // {
    //     //un user peertence a un becario
    //     return $this->hasMany(Asignacion::class);
    // }

    public function asignacion()
{
    return $this->hasMany(Asignacion::class, 'calificado_id', 'id');
}

    public function perfilesPuestos(): BelongsToMany
    {
        return $this->belongsToMany(PerfilPuesto::class, 'perfil_puesto_user', 'users_id', 'perfiles_puestos_id')->withPivot(['status', 'fecha_inicio', 'fecha_final', 'motivo_cambio']);
    }

    public function perfilActual()
    {
        return $this->perfilesPuestos()->latest()->first();
    }

    //Por favor no tocar porque aqui son de mi asignaciones para que mueste el nombre de la empresa y sucursal 
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }

    public function leadcliente()
    {
        return $this->hasMany(LeadCliente::class, 'users_id');
    }

    public function esmart_levantamientos()
    {
        return $this->hasMany(EsmartLevantamiento::class);
    }

    public function nom035levpedidos()
    {
        return $this->hasMany(Nom035Levpedido::class);
    }

    public function traininglevantamientos()
    {
        return $this->hasMany(TrainingLevantamiento::class);
    }
    // Dx035
    public function datoTrabajadores()
    {
        return $this->hasMany(DatoTrabajador::class, 'users_id');
    }

    
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function puesto()
{
    return $this->belongsTo(Puesto::class, 'puesto_id');
}
}
