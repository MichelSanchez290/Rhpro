<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\ActivoFijo\Activos\ActivoMobiliario;
use App\Models\ActivoFijo\Activos\ActivoOficina;
use App\Models\ActivoFijo\Activos\ActivoPapeleria;
use App\Models\ActivoFijo\Activos\ActivoSouvenir;
use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use App\Models\ActivoFijo\Activos\ActivoUniforme;
use App\Models\Encuestas360\Asignacion;
use App\Models\PortalCapacitacion\PerfilPuesto;
use App\Models\PortalRH\Becari;
use App\Models\PortalRH\Becario;
use App\Models\PortalRH\CambioSalario;
use App\Models\PortalRH\Documento;
use App\Models\PortalRH\Empres;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Incapacidad;
use App\Models\PortalRH\Incidencia;
use App\Models\PortalRH\Retardo;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Baja;
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

    public function cambioSalario()
    {
        return $this->belongsToMany(CambioSalario::class, 'user_cambio_salario', 'user_id', 'cambio_salario_id')->withTimestamps();
    }


    public function documentos()
    {
        return $this->belongsToMany(Documento::class, 'user_documento', 'documento_id', 'user_id')->withTimestamps();
    }

    public function incapacidades()
    {
        return $this->belongsToMany(Incapacidad::class, 'user_incapacidad', 'user_id', 'incapacidad_id')->withTimestamps();
    }

    public function incidencias()
    {
        return $this->belongsToMany(Incidencia::class, 'user_incidencia', 'user_id', 'incidencia_id')->withTimestamps();
    }

    public function retardos()
    {
        return $this->belongsToMany(Retardo::class, 'user_retardo', 'retardo_id', 'user_id')->withTimestamps();
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }

    public function bajas()
    {
        //un user tiene una baja
        return $this->hasMany(Baja::class);
    }
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    

    public function infonavitCreditos()
    {
        //un user peertence a un becario
        return $this->hasMany(Practicant::class);
    }


    public function regPatronales()
    {
        //cada trabajador pertenece a
        return $this->hasMany(RegisPatronal::class);
    }

    public function departamentos()
    {
        return $this->belongsTo(Departament::class);
    }

    public function puesto()
    {
        return $this->belongsTo(Puest::class);
    }

    public function trabajador()
    {
        //un user peertence a un becario
        return $this->hasMany(Trabajador::class);
    }

    public function becario()
    {
        //un user peertence a un becario
        return $this->hasMany(Becari::class);
    }

    public function practicantes()
    {
        //un user peertence a un becario
        return $this->hasMany(Practicant::class);
    }
    ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

    /* RELACIONES MODULO ACTIVO FIJO */
    public function activomoviliario()
    {
        return $this->belongsToMany(ActivoMobiliario::class);
    }
    public function activooficina()
    {
        return $this->belongsToMany(ActivoOficina::class);
    }
    public function activopapeleria()
    {
        return $this->belongsToMany(ActivoPapeleria::class);
    }
    public function activosouvenir()
    {
        return $this->belongsToMany(ActivoSouvenir::class);
    }
    public function activotecnologias()
    {
        return $this->belongsToMany(ActivoTecnologia::class);
    }
    public function activouniformes()
    {
        return $this->belongsToMany(ActivoUniforme::class);
    }

    //  /* RELACIONES MODULO CAPACITACION */
    public function perfiles_puestos()
    {
        return $this->belongsToMany(PerfilPuesto::class, 'perfil_puesto_user', 'users_id', 'perfiles_puestos_id'); // Modelo relacionado
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function asignacion()
    {
        //un user peertence a un becario
        return $this->hasMany(Asignacion::class);
    }

    public function perfilesPuestos(): BelongsToMany
    {
        return $this->belongsToMany(PerfilPuesto::class, 'perfil_puesto_user', 'users_id', 'perfiles_puestos_id')->withPivot(['status', 'fecha_inicio', 'fecha_final', 'motivo_cambio']);
    }

    public function perfilActual()
    {
        return $this->perfilesPuestos()->latest()->first();
    }


    // **********
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}
