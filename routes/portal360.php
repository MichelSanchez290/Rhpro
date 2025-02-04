<?php

use App\Livewire\Portal360\AgregarPregunta;
use App\Livewire\Portal360\AgregarRelaciones;
use App\Livewire\Portal360\AgregarRolesDev;
use App\Livewire\Portal360\EditarPregunta;
use App\Livewire\Portal360\EditarRelaciones;
use App\Livewire\Portal360\EditarRolesDev;
use App\Livewire\Portal360\EliminarRelaciones;
use App\Livewire\Portal360\EliminarRolesDev;
use App\Livewire\Portal360\EmpresaDev;
use App\Livewire\Portal360\EncuestaDev;
use App\Livewire\Portal360\Inicio;
use App\Livewire\Portal360\MostrarPregunta;
use App\Livewire\Portal360\MostrarRelaciones;
use App\Livewire\Portal360\MostrarRolesDev;
use Illuminate\Support\Facades\Route;

Route::get('/inicio', Inicio::class)->name('portal360.inicio');
Route::get('/mostrar-relaciones', MostrarRelaciones::class)->name('portal360.mostrarUser');
Route::get('/agregar-relaciones', AgregarRelaciones::class)->name('agregarRealacion');
Route::get('/eliminar-relaciones', EliminarRelaciones::class)->name('eliminarRelaciones');
Route::get('/editar-relaciones{id}', EditarRelaciones::class)->name('editRelaciones');
Route::get('/mostrar-roles-dev', MostrarRolesDev::class)->name('portal360.mostrarRoles');
Route::get('/agregar-roles-dev', AgregarRolesDev::class)->name('agregarRoles');
Route::get('/eliminar-roles-dev', EliminarRolesDev::class)->name('eliminarRoles');
Route::get('/editar-roles-dev{id}', EditarRolesDev::class)->name('editRolesdev');
Route::get('/empresa-dev', EmpresaDev::class)->name('portal360.mostrarEmpresa');
Route::get('/encuesta-dev', EncuestaDev::class)->name('portal360.mostrarEncuestaDev');
Route::get('/mostrar-pregunta', MostrarPregunta::class)->name('portal360.mostrarPregunta');
Route::get('/agregar-pregunta', AgregarPregunta::class)->name('agregarPregunta');
Route::get('/editar-pregunta{id}', EditarPregunta::class)->name('editpregunta');

// Route::get('/agregar-pregunta', AgregarPregunta::class)->name('portal360.agregarPregunta');







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
    