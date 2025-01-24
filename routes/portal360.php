<?php

use App\Livewire\Portal360\AgregarRelaciones;
use App\Livewire\Portal360\EliminarRelaciones;
use App\Livewire\Portal360\Encuesta;
use App\Livewire\Portal360\MostrarRelaciones;
use Illuminate\Support\Facades\Route;

Route::get('/encuesta', Encuesta::class)->name('portal360.encuesta');
Route::get('/mostrar-relaciones', MostrarRelaciones::class)->name('portal360.mostrarUser');
Route::get('/agregar-relaciones', AgregarRelaciones::class)->name('agregarRealacion');
Route::get('/eliminar-relaciones', EliminarRelaciones::class)->name('eliminarRelaciones');




// routes/web.php
// Route::middleware('guest')->group(function () {
//     Route::get('/portal360', Login::class)->name('portal360.login');
//     Route::get('/portal360/registrar', Register::class)->name('portal360.register');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
//     ])->group(function () {
//         Route::get('/encuesta', Encuesta::class)->name('portal360.encuesta');
//     });

//Route::get('/portal360', Login::class)->name('portal360.login');

//Route::get('/encuesta', Encuesta::class)->name('portal360.encuesta');
    