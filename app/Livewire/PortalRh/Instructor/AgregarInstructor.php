<?php

namespace App\Livewire\PortalRh\Instructor;

use Livewire\Component;
use App\Models\PortalRH\Instructor;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\PortalRH\Documento;
use Livewire\WithFileUploads;

class AgregarInstructor extends Component
{
    use WithFileUploads;
    public $instructor = [], $sucursales=[], $departamentos=[], $puestos=[], 
    $user=[], $documento=[];

    public $usuarios, $registros_patronales, 
    $empresas, $empresa, $nombre, $apellido_p, $apellido_m, $password,
    $sucursal, $departamento;

    public $roles, $rol;

    //var para documentos
    public $dc5_doc, $cuenta_doc, $ine_doc, $curp_doc, $sat_doc, $domicilio_doc;

    public function mount()
    {
        $this->instructor = ['tipoinstructor' => ''];

        $this->usuarios = User::all();
        $this->registros_patronales = RegistroPatronal::all();
        $this->empresas = Empresa::all();
        $this->roles = Role::all();
    }

    public function updatedEmpresa()
    {
        //dd();
        $this->sucursales = Empresa::with('sucursales')->where('id', $this->empresa)->get();
    }

    public function updatedSucursal()
    {
        $this->departamentos = Sucursal::with('departamentos')->where('id', $this->sucursal)->get();
    }

    public function updatedDepartamento()
    {
        // Obtener los puestos del departamento seleccionado
        $this->puestos = Departamento::with('puestos')->where('id', $this->departamento)->get();
    }

    protected function rules()
    {
        $rules = [
            // Campos para persona física (siempre requeridos)
            'instructor.tipoinstructor'   => 'required',
            'instructor.telefono1'        => 'required|digits:10',
            'instructor.telefono2'        => 'required|digits:10',
            'instructor.registroStps'     => 'required',
            'instructor.rfc'              => 'required|min:12|max:13|unique:instructores,rfc',
            'instructor.regimen'          => 'required',
            'instructor.estado'           => 'required',
            'instructor.municipio'        => 'required',
            'instructor.codigopostal'     => 'required|digits:5',
            'instructor.colonia'          => 'required',
            'instructor.calle'            => 'required',
            'instructor.numero'           => 'required',
            'instructor.honorarios'       => 'required|numeric',
            'instructor.status'           => 'required',
            'instructor.dc5'              => 'required',
            'instructor.cuentabancaria'   => 'required|digits:16|unique:instructores,cuentabancaria',
            'instructor.ine'              => 'required|size:15|unique:instructores,ine',
            'instructor.curp'             => 'required|size:18|unique:instructores,curp',
            'instructor.sat'              => 'required',
            'instructor.domicilio'        => 'required',
            'instructor.registro_patronal_id'=> 'required|exists:registros_patronales,id',

            // Campos siempre requeridos para la tabla users
            'nombre'                    => 'required',
            'apellido_p'                => 'required',
            'apellido_m'                => 'required',
            'user.email'                => 'required|unique:users,email',
            'password'                  => 'required',
            'empresa'                   => 'required',
            'sucursal'                  => 'required',
            'departamento'              => 'required',
            'user.puesto_id'            => 'required|exists:puestos,id',

            // Campos siempre requeridos para la tabla documentos 
            'dc5_doc'                    => 'required|file',
            'cuenta_doc'                 => 'required|file',
            'ine_doc'                    => 'required|file',
            'curp_doc'                   => 'required|file',
            'sat_doc'                    => 'required|file',
            'domicilio_doc'              => 'required|file',

            'rol' => 'required|exists:roles,id',
        ];

        // Si el tipo de instructor es "Moral", se agregan las reglas para persona moral
        if (($this->instructor['tipoinstructor'] ?? '') === 'Moral') {
            $rules = array_merge($rules, [
                'instructor.nombre_empresa'      => 'required',
                'instructor.rfc_empre'           => 'required|min:12|max:13',
                'instructor.calle_empre'         => 'required',
                'instructor.numero_empre'        => 'required',
                'instructor.colonia_empre'       => 'required',
                'instructor.municipio_empre'     => 'required',
                'instructor.estado_empre'        => 'required',
                'instructor.postal_empre'        => 'required|digits:5',
                'instructor.regimen_empre'       => 'required',
                
            ]);
        }

        return $rules;
    }

    // MENSAJES DE VALIDACIÓN
    protected $messages = [
        'instructor.*.required' => 'Este campo es obligatorio',
        'instructor.codigopostal.digits' => 'El código postal debe tener 5 dígitos.',
        'instructor.postal_empre.digits' => 'El código postal debe tener 5 dígitos.',
        'instructor.ine.size' => 'El CIC debe tener exactamente 15 caracteres (ejem. IDMEX1836173420).',
        'instructor.curp.size' => 'La CURP debe tener exactamente 18 caracteres.',
        'instructor.rfc.min' => 'El RFC debe tener al menos 12 caracteres.',
        'instructor.rfc.max' => 'El RFC no debe exceder los 13 caracteres.',
        'instructor.rfc_empre.min' => 'El RFC debe tener al menos 12 caracteres.',
        'instructor.rfc_empre.max' => 'El RFC no debe exceder los 13 caracteres.',
        'instructor.telefono1.digits' => 'El número de celular debe tener 10 dígitos.',
        'instructor.telefono2.digits' => 'El número de celular debe tener 10 dígitos.',
        'instructor.registro_patronal_id.exists' => 'El Reg Patronal seleccionado no existe.',
        'instructor.honorarios.numeric' => 'Ingrese solo números',

        'instructor.cuentabancaria.digits' => 'El número de cuenta debe tener 16 dígitos.',
        'instructor.rfc.unique' => 'Esta RFC ya esta asignada a otro instructor.',
        'instructor.cuentabancaria.unique' => 'Esta cuenta ya esta asignada a otro instructor.',
        'instructor.curp.unique' => 'Esta CURP ya esta asignada a otro instructor.',
        'instructor.ine.unique' => 'Esta CIC ya esta asignada a otro instructor.',

        'nombre.required' => 'Este campo es obligatorio.',
        'apellido_p.required' => 'Este campo es obligatorio.',
        'apellido_m.required' => 'Este campo es obligatorio.',
        'user.email.required' => 'Este campo es obligatorio.',
        'user.email.unique' => 'Este correo ya esta en uso.',
        'password.required' => 'Este campo es obligatorio.',
        'empresa.required' => 'Este campo es obligatorio.',
        'sucursal.required' => 'Este campo es obligatorio.',
        'departamento.required' => 'Este campo es obligatorio.',
        'user.puesto_id.required' => 'Este campo es obligatorio.',
        'user.puesto_id.exists' => 'El puesto seleccionado no existe.',

        'dc5_doc.required' => 'El archivo es requerido, solo formato PDF.',
        'dc5_doc.file' => 'Adjunta un archivo en formato PDF.',
        'cuenta_doc.required' => 'Este campo es obligatorio, solo formato PDF.',
        'cuenta_doc.file' => 'Adjunta un archivo en formato PDF.',
        'ine_doc.required' => 'Este campo es obligatorio, solo formato PDF.',
        'ine_doc.file' => 'Adjunta un archivo en formato PDF.',
        'curp_doc.required' => 'Este campo es obligatorio, solo formato PDF.',
        'curp_doc.file' => 'Adjunta un archivo en formato PDF.',
        'sat_doc.required' => 'Este campo es obligatorio, solo formato PDF.',
        'sat_doc.file' => 'Adjunta un archivo en formato PDF.',
        'domicilio_doc.required' => 'Este campo es obligatorio, solo formato PDF.',
        'domicilio_doc.file' => 'Adjunta un archivo en formato PDF.',

        'rol.required' => 'Debe seleccionar un rol para el becario.',
        'rol.exists' => 'El rol seleccionado no existe en la base de datos.',
    ];



    // Método para guardar el registro patronal
    public function saveInstructor()
    {
        //dd();
        $this->validate();

        // Guardar valores necesarios antes de limpiar $this->instructor
        $dc5 = $this->instructor['dc5'];
        $cuentabancaria = $this->instructor['cuentabancaria'];
        $ine = $this->instructor['ine'];
        $curp = $this->instructor['curp'];
        $sat = $this->instructor['sat'];

        $this->user['name'] = $this->nombre." ".$this->apellido_p." ".$this->apellido_m;
        $this->user['password'] =  Hash::make($this->password);
        $this->user['empresa_id'] = $this->empresa;
        $this->user['sucursal_id'] = $this->sucursal;
        $this->user['departamento_id'] = $this->departamento;
        $this->user['tipo_user'] = "Instructor";

        $guardaUser = new User($this->user);
        $guardaUser -> save();

        $role = Role::findOrFail($this->rol);
        $guardaUser->assignRole($role);

        $this->instructor['user_id'] = $guardaUser->id;
        Instructor::create($this->instructor);

        $documentos = [
            'dc5_doc' => [
                'tipo_documento' => 'DC5',
                'numero' => $dc5,
                'original' => 'Sí',
                'comentarios' => 'Documento DC5 del instructor',
                'status' => 'Activo',
                'fecha_subida' => now()->format('Y-m-d')
            ],
            'cuenta_doc' => [
                'tipo_documento' => 'Cuenta Bancaria',
                'numero' => $cuentabancaria,
                'original' => 'Sí',
                'comentarios' => 'Comprobante de cuenta bancaria',
                'status' => 'Activo',
                'fecha_subida' => now()->format('Y-m-d')
            ],
            'ine_doc' => [
                'tipo_documento' => 'INE',
                'numero' => $ine,
                'original' => 'Sí',
                'comentarios' => 'Identificación oficial INE',
                'status' => 'Activo',
                'fecha_subida' => now()->format('Y-m-d')
            ],
            'curp_doc' => [
                'tipo_documento' => 'CURP',
                'numero' => $curp,
                'original' => 'Sí',
                'comentarios' => 'Documento CURP',
                'status' => 'Activo',
                'fecha_subida' => now()->format('Y-m-d')
            ],
            'sat_doc' => [
                'tipo_documento' => 'SAT',
                'numero' => $sat,
                'original' => 'Sí',
                'comentarios' => 'Documento del SAT',
                'status' => 'Activo',
                'fecha_subida' => now()->format('Y-m-d')
            ],
            'domicilio_doc' => [
                'tipo_documento' => 'Comprobante de domicilio',
                'numero' => 'NA',
                'original' => 'Sí',
                'comentarios' => 'Comprobante de domicilio',
                'status' => 'Activo',
                'fecha_subida' => now()->format('Y-m-d')
            ]
        ];

        foreach ($documentos as $field => $documentoData) {
            if ($this->$field) {
                $nombreArchivo = $guardaUser->id.'_'.time().'_'.$documentoData['tipo_documento'].'.pdf';
                
                // Guardar archivo
                $this->$field->storeAs('PortalRH/Documentos', $nombreArchivo, 'subirDocs');
                
                // Crear registro en documentos
                $nuevoDoc = new Documento($documentoData);
                $nuevoDoc->archivo = "PortalRH/Documentos/".$nombreArchivo;
                $nuevoDoc->save();
                
                // Relacionar con usuario
                $nuevoDoc->users()->attach($guardaUser->id);
            }
        }

        // Limpiar datos al final
        $this->instructor = [];
        
        session()->flash('message', 'Instructor Agregado.');
    }

    public function redirigirInstructor()
    {
        return redirect()->route('mostrarinstructor');
    }

    public function render()
    {
        return view('livewire.portal-rh.instructor.agregar-instructor')->layout('layouts.client');
    }
}
