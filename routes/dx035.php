<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dx035\Encuestas\AgregarEncuesta;
use App\Livewire\Dx035\Encuestas\MostrarEncuestas;
use App\Livewire\Dx035\Encuestas\EncuestaController;

use App\Livewire\Dx035\Cuestionarios\AgregarPreguntaBase;
use App\Livewire\Dx035\Cuestionarios\MostrarPreguntaBase;
use App\Livewire\Dx035\Cuestionarios\EditarPreguntaBase;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas web para tu aplicación. Estas rutas
| serán cargadas por el RouteServiceProvider dentro del grupo "web".
|
*/

// Página principal

Route::get('/', function () {
    return redirect()->route('encuesta.index'); // Redirige a MostrarEncuestas
});


Route::get('/encuestas/agregar', AgregarEncuesta::class)->name('encuesta.create');
Route::get('/encuestas', MostrarEncuestas::class)->name('encuesta.index');
Route::get('/encuestas/editar/{id}', EncuestaController::class)->name('encuesta.edit');
Route::delete('/encuestas/eliminar/{id}', [EncuestaController::class, 'delete'])->name('encuesta.delete');

Route::get('/home<', function () {
    return view('home');
})->name('home');

Route::get('/preguntas/agregar', AgregarPreguntaBase::class)->name('preguntas.agregar');
Route::get('/preguntas', MostrarPreguntaBase::class)->name('preguntas.mostrar');
Route::get('/preguntas/{id}/editar', EditarPreguntaBase::class)->name('preguntas.editar');
