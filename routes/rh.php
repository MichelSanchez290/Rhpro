<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PortalRh\Inicio;

use App\Livewire\PortalRh\Usuario\MostrarUsuario;
use App\Livewire\PortalRh\Usuario\AsignarRolUsuario;
use App\Livewire\PortalRh\Cumpleanios\VerCumpleanios;

use App\Livewire\PortalRh\Rol\MostrarRol;
use App\Livewire\PortalRh\Rol\AgregarRol;
use App\Livewire\PortalRh\Rol\EditarRol;
use App\Livewire\PortalRh\Rol\VerPermisos;

use App\Livewire\PortalRh\Empres\MostrarEmpres;
use App\Livewire\PortalRh\Empres\AgregarEmpres;
use App\Livewire\PortalRh\Empres\EditarEmpres;

use App\Livewire\PortalRh\Sucursal\MostrarSucursal;
use App\Livewire\PortalRh\Sucursal\AgregarSucursal;
use App\Livewire\PortalRh\Sucursal\EditarSucursal;

use App\Livewire\PortalRh\RegistPatronal\MostrarRegPatronal;
use App\Livewire\PortalRh\RegistPatronal\AgregarRegPatronal;
use App\Livewire\PortalRh\RegistPatronal\EditarRegPatronal;

use App\Livewire\PortalRh\Departament\MostarDepartament;
use App\Livewire\PortalRh\Departament\AgregarDepartament;
use App\Livewire\PortalRh\Departament\EditarDepartament;

// --- Pivote Sucursal con Depa --------------------
use App\Livewire\PortalRh\SucursalDepa\AgregarSucursalDepa;
use App\Livewire\PortalRh\SucursalDepa\MostarSucursalDepa;
use App\Livewire\PortalRh\SucursalDepa\EditarSucursalDepa;
// --------------------------------------------

use App\Livewire\PortalRh\Puest\MostarPuest;
use App\Livewire\PortalRh\Puest\AgregarPuest;
use App\Livewire\PortalRh\Puest\EditarPuest;

// --- Pivote Depa con Puesto --------------------
use App\Livewire\PortalRh\DepartamentPuesto\MostrarDepartamentPuesto;
use App\Livewire\PortalRh\DepartamentPuesto\AgregarDepartamentPuesto;
use App\Livewire\PortalRh\DepartamentPuesto\EditarDepartamentPuesto;
// --------------------------------------------

use App\Livewire\PortalRh\Trabajador\MostrarTrabajador;
use App\Livewire\PortalRh\Trabajador\AgregarTrabajador;
use App\Livewire\PortalRh\Trabajador\EditarTrabajador;
use App\Livewire\PortalRh\Trabajador\MostrarCardTrabajador;
use App\Livewire\PortalRh\Trabajador\CardTrabajador;

use App\Livewire\PortalRh\Instructor\MostrarInstructor;
use App\Livewire\PortalRh\Instructor\AgregarInstructor;
use App\Livewire\PortalRh\Instructor\EditarInstructor;
use App\Livewire\PortalRh\Instructor\MostrarCardInstructor;
use App\Livewire\PortalRh\Instructor\CardInstructor;

// --- Pivote Depa con Puesto --------------------
use App\Livewire\PortalRh\EmpresSucursal\MostrarEmpresSucursal;
use App\Livewire\PortalRh\EmpresSucursal\AgregarEmpresSucursal;
use App\Livewire\PortalRh\EmpresSucursal\EditarEmpresSucursal;
// --------------------------------------------

use App\Livewire\PortalRh\Becario\MostrarBecario;
use App\Livewire\PortalRh\Becario\AgregarBecario;
use App\Livewire\PortalRh\Becario\EditarBecario;
use App\Livewire\PortalRh\Becario\MostrarCardBecario;
use App\Livewire\PortalRh\Becario\CardBecario;
use App\Livewire\PortalRh\Becario\ReporteBecario;

use App\Livewire\PortalRh\Practicante\MostrarPracticante;
use App\Livewire\PortalRh\Practicante\AgregarPracticante;
use App\Livewire\PortalRh\Practicante\EditarPracticante;
use App\Livewire\PortalRh\Practicante\MostrarCardPracticante;
use App\Livewire\PortalRh\Practicante\CardPracticante;


use App\Livewire\PortalRh\Incidencias\MostrarIncidencias;
use App\Livewire\PortalRh\Incidencias\AgregarIncidencias;
use App\Livewire\PortalRh\Incidencias\EditarIncidencias;
use App\Livewire\PortalRh\Incidencias\VerIncidencias;

use App\Livewire\PortalRh\Incapacidad\MostrarIncapacidad;
use App\Livewire\PortalRh\Incapacidad\AgregarIncapacidad;
use App\Livewire\PortalRh\Incapacidad\AceptarIncapacidad;
use App\Livewire\PortalRh\Incapacidad\EditarIncapacidad;

use App\Livewire\PortalRh\Bajas\MostrarBaja;
use App\Livewire\PortalRh\Bajas\AgregarBaja;
use App\Livewire\PortalRh\Bajas\EditarBaja;

use App\Livewire\PortalRh\Retardos\MostrarRetardos;
use App\Livewire\PortalRh\Retardos\AgregarRetardos;
use App\Livewire\PortalRh\Retardos\EditarRetardos;
use App\Livewire\PortalRh\Retardos\VerRetardos;

use App\Livewire\PortalRh\CambioSalario\MostrarCambioSalario;
use App\Livewire\PortalRh\CambioSalario\AgregarCambioSalario;
use App\Livewire\PortalRh\CambioSalario\EditarCambioSalario;

use App\Livewire\PortalRh\Documentos\MostrarDocumento;
use App\Livewire\PortalRh\Documentos\AgregarDocumento;
use App\Livewire\PortalRh\Documentos\AgregarDocumentoAdmin;
use App\Livewire\PortalRh\Documentos\EditarDocumento;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Pagina de inicio
Route::get( 
        '/inicio',
            Inicio::class
    )->name('inicio');


    // ROLES ---------------------------------------------------------------
    Route::get( 
        '/roles',
            MostrarRol::class
    )->middleware('can:Mostrar Rol')->name('mostrarrol');

    Route::get( 
        '/create-rol',
            AgregarRol::class
    )->middleware('can:Agregar Rol')->name('agregarrol');

    Route::get( 
        '/edit-rol/{id}',
            EditarRol::class
    )->middleware('can:Editar Rol')->name('editarrol');

    Route::get( 
        '/permisos/{id}',
            VerPermisos::class
    )->middleware('can:Ver Permisos')->name('mostrarpermisos');

    // USER  ---------------------------------------------------------------
    Route::get( 
        '/usuarios',
            MostrarUsuario::class
    )->middleware('can:Mostrar Usuario')->name('mostraruser');

    Route::get( 
        '/asig-rol-user/{id}',
            AsignarRolUsuario::class
    )->middleware('can:Agregar Usuario')->name('agregarroluser');

    Route::get( 
        '/ver-cumpleaños',
            VerCumpleanios::class
    )->middleware('can:Ver Cumpleaños')->name('vercumple');


    // EMPRESAS ---------------------------------------------------------------
    Route::get( 
        '/empresas',
            MostrarEmpres::class
    )->middleware('can:Mostrar Empresas')->name('mostrarempresas');


    Route::get( 
        '/create-empresa',
            AgregarEmpres::class
    )->middleware('can:Agregar Empresa')->name('agregarempresa');

    Route::get( 
        '/edit-empresa/{id}',
            EditarEmpres::class
    )->middleware('can:Editar Empresa')->name('editarempresa');


    // Sucursales ---------------------------------------------------------------
    Route::get( 
        '/sucursales',
            MostrarSucursal::class
    )->middleware('can:Mostrar Sucursales')->name('mostrarsucursal');


    Route::get( 
        '/create-sucursal',
            AgregarSucursal::class
    )->middleware('can:Agregar Sucursal')->name('agregarsucursal');

    Route::get( 
        '/edit-sucursal/{id}',
            EditarSucursal::class
    )->middleware('can:Editar Sucursal')->name('editarsucursal');


    // Reg Patronal ---------------------------------------------------------------
    Route::get( 
        '/reg-patronal',
            MostrarRegPatronal::class
    )->middleware('can:Mostrar Reg Patronal')->name('mostrarregpatronal');

    Route::get( 
        '/create-regpatronal',
            AgregarRegPatronal::class
    )->middleware('can:Agregar Reg Patronal')->name('agregarregpatronal');

    Route::get( 
        '/edit-regpatronal/{id}',
            EditarRegPatronal::class
    )->middleware('can:Editar Reg Patronal')->name('editarregpatronal');

    // DEPARTAMENTOS  ---------------------------------------------------------------
    Route::get( 
        '/departamentos',
            MostarDepartament::class
    )->middleware('can:Mostrar Departamentos')->name('mostrardepa');

    Route::get( 
        '/create-departament',
            AgregarDepartament::class
    )->middleware('can:Agregar Departamento')->name('agregardepa');

    Route::get( 
        '/edit-departament/{id}',
            EditarDepartament::class
    )->middleware('can:Editar Departamento')->name('editardepa');

    // Relacion Sucursal con Depa - PIVOTE *******************************
    Route::get( 
        '/mostrar-sucursaldepa',
            MostarSucursalDepa::class
    )->name('mostrarsucursaldepa');

    Route::get( 
        '/agregar-sucursaldepa',
            AgregarSucursalDepa::class
    )->name('agregarsucursaldepa');

    Route::get( 
        '/edit-sucursaldepa/{id}',
            EditarSucursalDepa::class
    )->name('editarsucursaldepa');


    // PUESTOS ---------------------------------------------------------------
    Route::get( 
        '/puestos',
            MostarPuest::class
    )->middleware('can:Mostrar Puestos')->name('mostrarpuesto');

    Route::get( 
        '/create-puest',
            AgregarPuest::class
    )->middleware('can:Agregar Puesto')->name('agregarpuesto');

    Route::get( 
        '/edit-puest/{id}',
            EditarPuest::class
    )->middleware('can:Editar Puesto')->name('editarpuesto');

    // Relacion Depa con Puesto - PIVOTE *******************************
    Route::get( 
        '/mostrar-depapuesto',
            MostrarDepartamentPuesto::class
    )->name('mostrardepapuesto');

    Route::get( 
        '/agregar-depapuesto',
            AgregarDepartamentPuesto::class
    )->name('agregardepapuesto');

    Route::get( 
        '/edit-depapuesto/{id}',
            EditarDepartamentPuesto::class
    )->name('editardepapuesto');


    // Trabajador ---------------------------------------------------------------
    Route::get( 
        '/trabajadores',
            MostrarTrabajador::class
    )->middleware('can:Mostrar Trabajadores')->name('mostrartrabajador');

    Route::get( 
        '/create-trabajador',
            AgregarTrabajador::class
    )->middleware('can:Agregar Trabajador')->name('agregartrabajador');

    Route::get( 
        '/edit-trabajador/{id}',
            EditarTrabajador::class
    )->middleware('can:Editar Trabajador')->name('editartrabajador');

    Route::get( 
        '/cards-trabajadores',
            MostrarCardTrabajador::class
    )->middleware('can:Mostrar Card Trabajador')->name('mostrarcardtrabajador');

    Route::get( 
        '/card-trabajador/{id}',
            CardTrabajador::class
    )->middleware('can:Mostrar Card Trabajador')->name('cardtrabajador');

    // INSTRUCTOR ---------------------------------------------------------------
    Route::get( 
        '/instructores',
            MostrarInstructor::class
    )->middleware('can:Mostrar Instructores')->name('mostrarinstructor');

    Route::get( 
        '/create-instructor',
            AgregarInstructor::class
    )->middleware('can:Agregar Instructor')->name('agregarinstructor');

    Route::get( 
        '/edit-instructor/{id}',
            EditarInstructor::class
    )->middleware('can:Editar Instructor')->name('editarinstructor');

    Route::get( 
        '/cards-instructores',
            MostrarCardInstructor::class
    )->middleware('can:Mostrar Card Instructor')->name('mostrarcardinstructor');

    Route::get( 
        '/card-instructor/{id}',
            CardInstructor::class
    )->middleware('can:Mostrar Card Instructor')->name('cardinstructor');


    // Relacion Empresa con Sucursal - PIVOTE *******************************
    Route::get( 
        '/mostrar-empressucursal',
            MostrarEmpresSucursal::class
    )->name('mostrarempressucursal');

    Route::get( 
        '/agregar-empressucursal',
            AgregarEmpresSucursal::class
    )->name('agregarempressucursal');

    Route::get( 
        '/edit-empressucursal/{empresa_sucursal_id}',
            EditarEmpresSucursal::class
    )->name('editarempressucursal');

    // Becario ---------------------------------------------------------------
    Route::get( 
        '/becarios',
            MostrarBecario::class
    )->middleware('can:Mostrar Becarios')->name('mostrarbecario');

    Route::get( 
        '/create-becario',
            AgregarBecario::class
    )->middleware('can:Agregar Becario')->name('agregarbecario');

    Route::get( 
        '/edit-becario/{id}',
            EditarBecario::class
    )->middleware('can:Editar Becario')->name('editarbecario');

    Route::get( 
        '/cards-becarios',
            MostrarCardBecario::class
    )->middleware('can:Mostrar Card Becario')->name('mostrarcardbecario');

    Route::get( 
        '/card-becario/{id}',
            CardBecario::class
    )->middleware('can:Mostrar Card Becario')->name('cardbecario');

    // Practicante ---------------------------------------------------------------
    Route::get( 
        '/practicantes',
            MostrarPracticante::class
    )->middleware('can:Mostrar Practicantes')->name('mostrarpracticante');

    Route::get( 
        '/create-practicante',
            AgregarPracticante::class
    )->middleware('can:Agregar Practicante')->name('agregarpracticante');

    Route::get( 
        '/edit-practicante/{id}',
            EditarPracticante::class
    )->middleware('can:Editar Practicante')->name('editarpracticante');

    Route::get( 
        '/cards-practicantes',
            MostrarCardPracticante::class
    )->middleware('can:Mostrar Card Practicante')->name('mostrarcardpracticante');

    Route::get( 
        '/card-practicante/{id}',
            CardPracticante::class
    )->middleware('can:Mostrar Card Practicante')->name('cardpracticante');
    

    // INCIDENCIAS ---------------------------------------------------------------
    Route::get( 
        '/incidencias',
            MostrarIncidencias::class
    )->middleware('can:Mostrar Incidencias')->name('mostrarincidencia');

    Route::get( 
        '/create-incidencia',
            AgregarIncidencias::class
    )->middleware('can:Agregar Incidencia')->name('agregarincidencia');

    Route::get( 
        '/edit-incidencia/{id}',
            EditarIncidencias::class
    )->middleware('can:Editar Incidencia')->name('editarincidencia');

    Route::get( 
        '/mis-incidencias',
            VerIncidencias::class
    )->middleware('can:Ver Incidencias')->name('verincidencia');

    // INCAPACIDAD ---------------------------------------------------------------
    Route::get( 
        '/incapacidad',
            MostrarIncapacidad::class
    )->middleware('can:Mostrar Incapacidad')->name('mostrarincapacidad');

    Route::get( 
        '/create-incapacidad',
            AgregarIncapacidad::class
    )->middleware('can:Agregar Incapacidad')->name('agregarincapacidad');

    Route::get( 
        '/edit-incapacidad/{id}',
            EditarIncapacidad::class
    )->middleware('can:Editar Incapacidad')->name('editarincapacidad');

    Route::get( 
        '/aceptar-incapacidad',
            AceptarIncapacidad::class
    )->middleware('can:Aceptar Incapacidad')->name('aceptarincapacidad');

    // Bajas ---------------------------------------------------------------
    Route::get( 
        '/bajas',
            MostrarBaja::class
    )->middleware('can:Mostrar Baja')->name('mostrarbaja');

    Route::get( 
        '/create-baja',
            AgregarBaja::class
    )->middleware('can:Agregar Baja')->name('agregarbaja');

    Route::get( 
        '/edit-baja/{id}',
            EditarBaja::class
    )->middleware('can:Editar Baja')->name('editarbaja');

    // RETARDOS ---------------------------------------------------------------
     Route::get( 
        '/retardos',
            MostrarRetardos::class
    )->middleware('can:Mostrar Retardos')->name('mostrarretardo');

    Route::get( 
        '/create-retardo',
            AgregarRetardos::class
    )->middleware('can:Agregar Retardo')->name('agregarretardo');

    Route::get( 
        '/edit-retardo/{id}',
            EditarRetardos::class
    )->middleware('can:Editar Retardo')->name('editarretardo');

    Route::get( 
        '/mis-retardos',
            VerRetardos::class
    )->middleware('can:Ver Retardos')->name('verretardo');


    // CAMBIO SALARIO ---------------------------------------------------------------
    Route::get( 
        '/cambio-salario',
            MostrarCambioSalario::class
    )->middleware('can:Mostrar Cambio Salario')->name('mostrarcambiosal');

    Route::get( 
        '/create-cambio-salario',
            AgregarCambioSalario::class
    )->middleware('can:Agregar Cambio Salario')->name('agregarcambiosal');

    Route::get( 
        '/edit-cambio-salario/{id}',
            EditarCambioSalario::class
    )->middleware('can:Editar Cambio Salario')->name('editarcambiosal');

    // Documentos  ---------------------------------------------------------------
    Route::get( 
        '/documentos',
            MostrarDocumento::class
    )->middleware('can:Mostrar Documento')->name('mostrardoc');

    Route::get( 
        '/create-documento',
            AgregarDocumento::class
    )->middleware('can:Agregar Documento')->name('agregardoc');

    Route::get( 
        '/create-documento-admin',
            AgregarDocumentoAdmin::class
    )->middleware('can:Agregar Documento Admin')->name('agregardocadmin');

    Route::get( 
        '/edit-documento/{id}',
            EditarDocumento::class
    )->middleware('can:Editar Documento')->name('editardoc');


    /*

    */