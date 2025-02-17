<?php

use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminEmpresa\AgregarMobiliario;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminEmpresa\EditarMobiliario;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminEmpresa\MostrarMobiliario;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminSucursal\Agregaractmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminSucursal\Editaractmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminSucursal\Mostraractmob;

use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminSucursal\Agregaractofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminSucursal\Editaractofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminSucursal\Mostraractofi;

use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\AdminSucursal\Agregaractpape;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\AdminSucursal\Editaractpape;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\AdminSucursal\Mostraractpape;

use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminSucursal\Agregaractsou;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminSucursal\Editaractsou;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminSucursal\Mostraractsou;

use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminEmpresa\AgregarTecnologia;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminEmpresa\EditarTecnologia;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminEmpresa\MostrarTecnologia;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminSucursal\Agregaracttec;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminSucursal\Editaracttec;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminSucursal\Mostraracttec;

use App\Livewire\ActivoFijo\Activos\ActivoUniforme\AdminSucursal\Agregaractuni;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\AdminSucursal\Editaractuni;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\AdminSucursal\Mostraractuni;
use App\Livewire\ActivoFijo\InicioActivo;
use App\Livewire\ActivoFijo\TipoActivo\Agregartipoactivo;
use App\Livewire\ActivoFijo\TipoActivo\Editartipoactivo;
use App\Livewire\ActivoFijo\TipoActivo\Mostrartipoactivo;

use App\Livewire\ActivoFijo\Notas\Agregarnotas;
use App\Livewire\ActivoFijo\Notas\Editarnotas;
use App\Livewire\ActivoFijo\Notas\Mostrarnotas;
use Illuminate\Support\Facades\Route;

Route::get('/principal', function () {
    return view('principal');
})->name('dashboardaf');

Route::get('af/inicio',InicioActivo::class)->name('inicio-activo');

Route::get('af/agregartipoactivo', Agregartipoactivo::class)->middleware('can:Tipo activo')->name('agregartipoactivo');
Route::get('af/mostrartipoactivo', Mostrartipoactivo::class)->middleware('can:Tipo activo')->name('mostrartipoactivo');
Route::get('af/editartipoactivo/{id}', Editartipoactivo::class)->middleware('can:Tipo activo')->name('editartipoactivo');

//AdminEmpresa
Route::get('af/agregaractivoae', AgregarTecnologia::class)->middleware('can:Activo tecnologia Empresa')->name('agregartec');
Route::get('af/mostraractivoae', MostrarTecnologia::class)->middleware('can:Activo tecnologia Empresa')->name('mostrartec');
Route::get('af/editaractivoae', EditarTecnologia::class)->middleware('can:Activo tecnologia Empresa')->name('editartec');


Route::get('af/mostraractivotec', Mostraracttec::class)->middleware('can:Activo tecnologia Sucursal')->name('mostraracttec');
Route::get('af/agregaractivotec', Agregaracttec::class)->middleware('can:Activo tecnologia Sucursal')->name('agregaracttec');
Route::get('af/editaractivotec/{id}', Editaracttec::class)->middleware('can:Activo tecnologia Sucursal')->name('editaracttec');


Route::get('af/mostraractivoofi', Mostraractofi::class)->middleware('can:Activo oficina Sucursal')->name('mostraractofi');
Route::get('af/agregaractivoofi', Agregaractofi::class)->middleware('can:Activo oficina Sucursal')->name('agregaractofi');
Route::get('af/editaractivoofi/{id}', Editaractofi::class)->middleware('can:Activo oficina Sucursal')->name('editaractofi');

//Admin Mobiliario
Route::get('af/mostraractivomobae', MostrarMobiliario::class)->middleware('can:Activo oficina Empresa')->name('mostrarmob');
Route::get('af/agregaractivomobae', AgregarMobiliario::class)->middleware('can:Activo oficina Empresa')->name('agregarmob');
Route::get('af/editaractivomobae/{id}', EditarMobiliario::class)->middleware('can:Activo oficina Empresa')->name('editarmob');

Route::get('af/mostraractivomob', Mostraractmob::class)->middleware('can:Activo oficina Sucursal')->name('mostraractmob');
Route::get('af/agregaractivomob', Agregaractmob::class)->middleware('can:Activo oficina Sucursal')->name('agregaractmob');
Route::get('af/editaractivomob/{id}', Editaractmob::class)->middleware('can:Activo oficina Sucursal')->name('editaractmob');

Route::get('af/mostraractivopape', Mostraractpape::class)->middleware('can:Activo oficina Sucursal')->name('mostraractpape');
Route::get('af/agregaractivopape', Agregaractpape::class)->middleware('can:Activo oficina Sucursal')->name('agregaractpape');
Route::get('af/editaractivopape/{id}', Editaractpape::class)->middleware('can:Activo oficina Sucursal')->name('editaractpape');

Route::get('af/mostraractivouni', Mostraractuni::class)->middleware('can:Activo oficina Sucursal')->name('mostraractuni');
Route::get('af/agregaractivouni', Agregaractuni::class)->middleware('can:Activo oficina Sucursal')->name('agregaractuni');
Route::get('af/editaractivouni/{id}', Editaractuni::class)->middleware('can:Activo oficina Sucursal')->name('editaractuni');

Route::get('af/mostraractivosou', Mostraractsou::class)->middleware('can:Activo oficina Sucursal')->name('mostraractsou');
Route::get('af/agregaractivosou', Agregaractsou::class)->middleware('can:Activo oficina Sucursal')->name('agregaractsou');
Route::get('af/editaractivosou/{id}', Editaractsou::class)->middleware('can:Activo oficina Sucursal')->name('editaractsou');

// Route::get('af/agregarnotatec', Agregarnotas::class)->name('agregarnotas');
Route::get('af/mostrarnotatec', Mostrarnotas::class)->name('mostrarnotas');
Route::get('af/editarnotatec', Editarnotas::class)->name('editarnotas');