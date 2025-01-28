<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PortalRh\Inicio;

use App\Livewire\PortalRh\Empres\MostrarEmpres;
use App\Livewire\PortalRh\Empres\AgregarEmpres;
use App\Livewire\PortalRh\Empres\EditarEmpres;

use App\Livewire\PortalRh\Sucursal\MostrarSucursal;
use App\Livewire\PortalRh\Sucursal\AgregarSucursal;
use App\Livewire\PortalRh\Sucursal\EditarSucursal;


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
