<?php

use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\Agregaractmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\Editaractmob;
use App\Livewire\ActivoFijo\Activos\ActivoMobiliario\Mostraractmob;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\Agregaractofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\Editaractofi;
use App\Livewire\ActivoFijo\Activos\ActivoOficina\Mostraractofi;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\Agregaracttec;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\Editaracttec;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\Mostraracttec;
use App\Livewire\ActivoFijo\TipoActivo\Agregartipoactivo;
use App\Livewire\ActivoFijo\TipoActivo\Editartipoactivo;
use App\Livewire\ActivoFijo\TipoActivo\Mostrartipoactivo;
use App\Livewire\ActivoFijo\Notas\Agregarnotas;
use App\Livewire\ActivoFijo\Notas\Mostrarnotas;
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

Route::get('af/mostraractivoofi', Mostraractofi::class)->name('mostraractof');
Route::get('af/agregaractivoofi', Agregaractofi::class)->name('agregaractof');
Route::get('af/editaractivoofi/{id}', Editaractofi::class)->name('editaractof');

Route::get('af/mostraractivomob', Mostraractmob::class)->name('mostraractmob');
Route::get('af/agregaractivomob', Agregaractmob::class)->name('agregaractmob');
Route::get('af/editaractivomob/{id}', Editaractmob::class)->name('editaractmob');





