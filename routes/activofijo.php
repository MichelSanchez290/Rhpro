<?php

use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminAdmin\Agregarmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminAdmin\Editarmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminAdmin\Mostrarmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminEmpresa\AgregarMobiliario;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminEmpresa\EditarMobiliario;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminEmpresa\MostrarMobiliario;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminSucursal\Agregaractmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminSucursal\Editaractmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\AdminSucursal\Mostraractmob;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminAdmin\Agregarofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminAdmin\Editarofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminAdmin\Mostrarofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminEmpresa\AgregarOficina;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminEmpresa\EditarOficina;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminEmpresa\MostrarOficina;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminSucursal\Agregaractofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminSucursal\Editaractofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\AdminSucursal\Mostraractofi;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\AdminEmpresa\AgregarPapeleria;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\AdminEmpresa\EditarPapeleria;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\AdminEmpresa\MostrarPapeleria;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\AdminSucursal\Agregaractpape;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\AdminSucursal\Editaractpape;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\AdminSucursal\Mostraractpape;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminEmpresa\AgregarSouvenir;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminEmpresa\EditarSouvenir;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminEmpresa\MostrarSouvenir;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminSucursal\Agregaractsou;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminSucursal\Editaractsou;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminSucursal\Mostraractsou;

use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminEmpresa\AgregarTecnologia;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminEmpresa\EditarTecnologia;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminEmpresa\MostrarTecnologia;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminSucursal\Agregaracttec;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminSucursal\Editaracttec;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminSucursal\Mostraracttec;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\AdminEmpresa\AgregarUniforme;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\AdminEmpresa\EditarUniforme;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\AdminEmpresa\MostrarUniforme;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\AdminSucursal\Agregaractuni;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\AdminSucursal\Editaractuni;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\AdminSucursal\Mostraractuni;
use App\Livewire\ActivoFijo\InicioActivo;
use App\Livewire\ActivoFijo\TipoActivo\Agregartipoactivo;
use App\Livewire\ActivoFijo\TipoActivo\Editartipoactivo;
use App\Livewire\ActivoFijo\TipoActivo\Mostrartipoactivo;

use App\Livewire\ActivoFijo\Notas\Agregarnotas;
use App\Livewire\ActivoFijo\Notas\Editarnotas;
use App\Livewire\ActivoFijo\Notas\Mostrarnotaem;
use App\Livewire\ActivoFijo\Notas\Mostrarnotas;
use Illuminate\Support\Facades\Route;

Route::get('/principal', function () {
    return view('principal');
})->name('dashboardaf');

Route::get('af/inicio',InicioActivo::class)->name('inicio-activo');

Route::get('af/agregartipoactivo', Agregartipoactivo::class)->middleware('can:Tipo activo')->name('agregartipoactivo');
Route::get('af/mostrartipoactivo', Mostrartipoactivo::class)->middleware('can:Tipo activo')->name('mostrartipoactivo');
Route::get('af/editartipoactivo/{id}', Editartipoactivo::class)->middleware('can:Tipo activo')->name('editartipoactivo');

//Admin Empresa Tecnologia
Route::get('af/agregaractivoae', AgregarTecnologia::class)->middleware('can:Activo tecnologia Empresa')->name('agregartec');
Route::get('af/mostraractivoae', MostrarTecnologia::class)->middleware('can:Activo tecnologia Empresa')->name('mostrartec');
Route::get('af/editaractivoae/{id}', EditarTecnologia::class)->middleware('can:Activo tecnologia Empresa')->name('editartec');


Route::get('af/mostraractivotec', Mostraracttec::class)->middleware('can:Activo tecnologia Sucursal')->name('mostraracttec');
Route::get('af/agregaractivotec', Agregaracttec::class)->middleware('can:Activo tecnologia Sucursal')->name('agregaracttec');
Route::get('af/editaractivotec/{id}', Editaracttec::class)->middleware('can:Activo tecnologia Sucursal')->name('editaracttec');

//Administrador general Mobiliario
Route::get('af/mostraractivoofiad', Mostrarofi::class)->middleware('can:Activo oficina Empresa')->name('mostrarofiad');
Route::get('af/agregaractivoofiad', Agregarofi::class)->middleware('can:Activo oficina Empresa')->name('agregarofiad');
Route::get('af/editaractivoofiad/{id}', Editarofi::class)->middleware('can:Activo oficina Empresa')->name('editarofiad');

//Admin Empresa Oficina
Route::get('af/mostraractivoofiae', MostrarOficina::class)->middleware('can:Activo oficina Empresa')->name('mostrarofi');
Route::get('af/agregaractivoofiae', AgregarOficina::class)->middleware('can:Activo oficina Empresa')->name('agregarofi');
Route::get('af/editaractivoofiae/{id}', EditarOficina::class)->middleware('can:Activo oficina Empresa')->name('editarofi');

Route::get('af/mostraractivoofi', Mostraractofi::class)->middleware('can:Activo oficina Sucursal')->name('mostraractofi');
Route::get('af/agregaractivoofi', Agregaractofi::class)->middleware('can:Activo oficina Sucursal')->name('agregaractofi');
Route::get('af/editaractivoofi/{id}', Editaractofi::class)->middleware('can:Activo oficina Sucursal')->name('editaractofi');

//Administrador general Mobiliario
Route::get('af/agregaractivomobad', Agregarmob::class)->middleware('can:Activo mobiliario Admin')->name('agregarmobad');
Route::get('af/mostraractivomobad', Mostrarmob::class)->middleware('can:Activo mobiliario Admin')->name('mostrarmobad');
Route::get('af/editaractivomobad/{id}', Editarmob::class)->middleware('can:Activo mobiliario Admin')->name('editarmobad');

//Admin Empresa Mobiliario
Route::get('af/mostraractivomobae', MostrarMobiliario::class)->middleware('can:Activo mobiliario Empresa')->name('mostrarmob');
Route::get('af/agregaractivomobae', AgregarMobiliario::class)->middleware('can:Activo mobiliario Empresa')->name('agregarmob');
Route::get('af/editaractivomobae/{id}', EditarMobiliario::class)->middleware('can:Activo mobiliario Empresa')->name('editarmob');

Route::get('af/mostraractivomob', Mostraractmob::class)->middleware('can:Activo mobiliario Sucursal')->name('mostraractmob');
Route::get('af/agregaractivomob', Agregaractmob::class)->middleware('can:Activo mobiliario Sucursal')->name('agregaractmob');
Route::get('af/editaractivomob/{id}', Editaractmob::class)->middleware('can:Activo mobiliario Sucursal')->name('editaractmob');

//Admin Empresa Papeleria
Route::get('af/mostraractivopapeae', MostrarPapeleria::class)->middleware('can:Activo papeleria Empresa')->name('mostrarpape');
Route::get('af/agregaractivopapeae', AgregarPapeleria::class)->middleware('can:Activo papeleria Empresa')->name('agregarpape');
Route::get('af/editaractivopapeae/{id}', EditarPapeleria::class)->middleware('can:Activo papeleria Empresa')->name('editarpape');

Route::get('af/mostraractivopape', Mostraractpape::class)->middleware('can:Activo papeleria Sucursal')->name('mostraractpape');
Route::get('af/agregaractivopape', Agregaractpape::class)->middleware('can:Activo papeleria Sucursal')->name('agregaractpape');
Route::get('af/editaractivopape/{id}', Editaractpape::class)->middleware('can:Activo papeleria Sucursal')->name('editaractpape');

//Admin Empresa Uniforme
Route::get('af/mostraractivouniae', MostrarUniforme::class)->middleware('can:Activo uniforme Empresa')->name('mostraruni');
Route::get('af/agregaractivouniae', AgregarUniforme::class)->middleware('can:Activo uniforme Empresa')->name('agregaruni');
Route::get('af/editaractivouniae/{id}', EditarUniforme::class)->middleware('can:Activo uniforme Empresa')->name('editaruni');

Route::get('af/mostraractivouni', Mostraractuni::class)->middleware('can:Activo uniforme Sucursal')->name('mostraractuni');
Route::get('af/agregaractivouni', Agregaractuni::class)->middleware('can:Activo uniforme Sucursal')->name('agregaractuni');
Route::get('af/editaractivouni/{id}', Editaractuni::class)->middleware('can:Activo uniforme Sucursal')->name('editaractuni');

//Admin Empresa Souvenir
Route::get('af/mostraractivosouae', MostrarSouvenir::class)->middleware('can:Activo souvenir Empresa')->name('mostrarsou');
Route::get('af/agregaractivosouae', AgregarSouvenir::class)->middleware('can:Activo souvenir Empresa')->name('agregarsou');
Route::get('af/editaractivosouae/{id}', EditarSouvenir::class)->middleware('can:Activo souvenir Empresa')->name('editarsou');

Route::get('af/mostraractivosou', Mostraractsou::class)->middleware('can:Activo souvenir Sucursal')->name('mostraractsou');
Route::get('af/agregaractivosou', Agregaractsou::class)->middleware('can:Activo souvenir Sucursal')->name('agregaractsou');
Route::get('af/editaractivosou/{id}', Editaractsou::class)->middleware('can:Activo souvenir Sucursal')->name('editaractsou');

// Route::get('af/agregarnotatec', Agregarnotas::class)->name('agregarnotas');
Route::get('af/mostrarnotatec', Mostrarnotas::class)->name('mostrarnotas');
Route::get('af/mostrarnotatecem', Mostrarnotaem::class)->name('mostrarnotaem');

Route::get('af/editarnotatec', Editarnotas::class)->name('editarnotas');