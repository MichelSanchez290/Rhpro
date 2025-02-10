<?php

use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\Agregaractmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\Editaractmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\Mostraractmob;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\Agregaractofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\Editaractofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\Mostraractofi;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\Agregaractpape;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\Editaractpape;
use App\Livewire\ActivoFijo\Activos\ActivoPapeleria\Mostraractpape;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\Agregaractsou;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\Editaractsou;
use App\Livewire\ActivoFijo\Activos\ActivoSouvenir\Mostraractsou;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\Agregaracttec;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\Editaracttec;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\Mostraracttec;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\Agregaractuni;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\Editaractuni;
use App\Livewire\ActivoFijo\Activos\ActivoUniforme\Mostraractuni;
use App\Livewire\ActivoFijo\TipoActivo\Agregartipoactivo;
use App\Livewire\ActivoFijo\TipoActivo\Editartipoactivo;
use App\Livewire\ActivoFijo\TipoActivo\Mostrartipoactivo;
use App\Livewire\ActivoFijo\Notas\Agregarnotas;
use App\Livewire\ActivoFijo\Notas\Editarnotas;
use App\Livewire\ActivoFijo\Notas\Mostrarnotas;
use App\Livewire\Pruebas\EliminarElemento;
use Illuminate\Support\Facades\Route;

Route::get('/principal', function () {
    return view('principal');
})->name('dashboardaf');

Route::get('af/agregartipoactivo', Agregartipoactivo::class)->name('agregartipoactivo');
Route::get('af/mostrartipoactivo', Mostrartipoactivo::class)->name('mostrartipoactivo');
Route::get('af/editartipoactivo/{id}', Editartipoactivo::class)->name('editartipoactivo');

Route::get('af/mostraractivotec', Mostraracttec::class)->name('mostraracttec');
Route::get('af/agregaractivotec', Agregaracttec::class)->name('agregaracttec');
Route::get('af/editaractivotec/{id}', Editaracttec::class)->name('editaracttec');

Route::get('af/agregarnotatec', Agregarnotas::class)->name('agregarnotas');
Route::get('af/mostrarnotatec', Mostrarnotas::class)->name('mostrarnotas');
Route::get('af/editarnotatec', Editarnotas::class)->name('editarnotas');

Route::get('af/mostraractivoofi', Mostraractofi::class)->name('mostraractof');
Route::get('af/agregaractivoofi', Agregaractofi::class)->name('agregaractof');
Route::get('af/editaractivoofi/{id}', Editaractofi::class)->name('editaractof');

Route::get('af/mostraractivomob', Mostraractmob::class)->name('mostraractmob');
Route::get('af/agregaractivomob', Agregaractmob::class)->name('agregaractmob');
Route::get('af/editaractivomob/{id}', Editaractmob::class)->name('editaractmob');

Route::get('af/mostraractivopape', Mostraractpape::class)->name('mostraractpape');
Route::get('af/agregaractivopape', Agregaractpape::class)->name('agregaractpape');
Route::get('af/editaractivopape/{id}', Editaractpape::class)->name('editaractpape');

Route::get('af/mostraractivouni', Mostraractuni::class)->name('mostraractuni');
Route::get('af/agregaractivouni', Agregaractuni::class)->name('agregaractuni');
Route::get('af/editaractivouni/{id}', Editaractuni::class)->name('editaractuni');

Route::get('af/mostraractivosou', Mostraractsou::class)->name('mostraractsou');
Route::get('af/agregaractivosou', Agregaractsou::class)->name('agregaractsou');
Route::get('af/editaractivosou/{id}', Editaractsou::class)->name('editaractsou');





