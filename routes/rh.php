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


    // EMPRESAS
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


    // Sucursales
    Route::get( 
        '/sucursales',
            MostrarSucursal::class
    )->name('mostrarsucursal');


    Route::get( 
        '/create-sucursal',
            AgregarSucursal::class
    )->name('agregarsucursal');


    // Reg Patronal
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

    // DEPARTAMENTOS
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
