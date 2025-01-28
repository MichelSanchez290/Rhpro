<?php

use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\Agregaracttec;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\Editaracttec;
use App\Livewire\ActivoFijo\Activos\ActivoTecnologias\Mostraracttec;
use App\Livewire\ActivoFijo\TipoActivo\Agregartipoactivo;
use App\Livewire\ActivoFijo\TipoActivo\Editartipoactivo;
use App\Livewire\ActivoFijo\TipoActivo\Mostrartipoactivo;
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



