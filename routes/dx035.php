<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dx035\Encuestas\AgregarEncuesta;
use App\Livewire\Dx035\Encuestas\MostrarEncuestas;
use App\Livewire\Dx035\Encuestas\EncuestaController;
use App\Livewire\Dx035\Encuestas\EditarEncuesta;
use App\Livewire\Dx035\Encuestas\CorreosMasivos;

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

// Ruta para editar una encuesta
Route::get('/encuestas/{Clave}/edit', EditarEncuesta::class)->name('encuestas.edit');
// Ruta para eliminar una encuesta


Route::get('/home<', function () {
    return view('home');
})->name('home');

Route::get('/preguntas/agregar', AgregarPreguntaBase::class)->name('preguntas.agregar');
Route::get('/preguntas', MostrarPreguntaBase::class)->name('preguntas.mostrar');
Route::get('/preguntas/{id}/editar', EditarPreguntaBase::class)->name('preguntas.editar');

Route::get('/correos-masivos', CorreosMasivos::class)->name('correos.masivos');
