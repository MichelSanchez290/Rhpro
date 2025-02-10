<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PortalRh\Inicio;

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


    // EMPRESAS ---------------------------------------------------------------
    Route::get( 
        '/empresas',
            MostrarEmpres::class
    )->name('mostrarempresas');


    Route::get( 
        '/create-empresa',
            AgregarEmpres::class
    )->name('agregarempresa');

    Route::get( 
        '/edit-empresa/{id}',
            EditarEmpres::class
    )->name('editarempresa');


    // Sucursales ---------------------------------------------------------------
    Route::get( 
        '/sucursales',
            MostrarSucursal::class
    )->name('mostrarsucursal');


    Route::get( 
        '/create-sucursal',
            AgregarSucursal::class
    )->name('agregarsucursal');


    // Reg Patronal ---------------------------------------------------------------
    Route::get( 
        '/reg-patronal',
            MostrarRegPatronal::class
    )->name('mostrarregpatronal');

    Route::get( 
        '/create-regpatronal',
            AgregarRegPatronal::class
    )->name('agregarregpatronal');


    Route::get( 
        '/edit-sucursal/{id}',
            EditarSucursal::class
    )->name('editarsucursal');

    // DEPARTAMENTOS  ---------------------------------------------------------------
    Route::get( 
        '/departamentos',
            MostarDepartament::class
    )->name('mostrardepa');

    Route::get( 
        '/create-departament',
            AgregarDepartament::class
    )->name('agregardepa');

    Route::get( 
        '/edit-departament/{id}',
            EditarDepartament::class
    )->name('editardepa');

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
    )->name('mostrarpuesto');

    Route::get( 
        '/create-puest',
            AgregarPuest::class
    )->name('agregarpuesto');

    Route::get( 
        '/edit-puest/{id}',
            EditarPuest::class
    )->name('editarpuesto');

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
    )->name('mostrartrabajador');

    Route::get( 
        '/create-trabajador',
            AgregarTrabajador::class
    )->name('agregartrabajador');

    Route::get( 
        '/edit-trabajador/{id}',
            EditarTrabajador::class
    )->name('editartrabajador');

    Route::get( 
        '/cards-trabajadores',
            MostrarCardTrabajador::class
    )->name('mostrarcardtrabajador');

    Route::get( 
        '/card-trabajador/{id}',
            CardTrabajador::class
    )->name('cardtrabajador');

    // INSTRUCTOR ---------------------------------------------------------------
    Route::get( 
        '/instructores',
            MostrarInstructor::class
    )->name('mostrarinstructor');

    Route::get( 
        '/create-instructor',
            AgregarInstructor::class
    )->name('agregarinstructor');

    Route::get( 
        '/edit-instructor/{id}',
            EditarInstructor::class
    )->name('editarinstructor');

    Route::get( 
        '/cards-instructores',
            MostrarCardInstructor::class
    )->name('mostrarcardinstructor');

    Route::get( 
        '/card-instructor/{id}',
            CardInstructor::class
    )->name('cardinstructor');


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

    // INSTRUCTOR ---------------------------------------------------------------
    Route::get( 
        '/becarios',
            MostrarBecario::class
    )->name('mostrarbecario');

    Route::get( 
        '/create-becario',
            AgregarBecario::class
    )->name('agregarbecario');

    Route::get( 
        '/edit-becario/{id}',
            EditarBecario::class
    )->name('editarbecario');

    Route::get( 
        '/cards-becarios',
            MostrarCardBecario::class
    )->name('mostrarcardbecario');

    Route::get( 
        '/card-becario/{id}',
            CardBecario::class
    )->name('cardbecario');