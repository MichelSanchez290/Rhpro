<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PortalCapacitacion\Inicio;
use App\Livewire\PortalCapacitacion\MostrarPerfilPuesto;
use App\Livewire\PortalCapacitacion\AgregarPerfilPuesto;
use App\Livewire\PortalCapacitacion\EditarPerfilPuesto;
use App\Livewire\PortalCapacitacion\VerMasPerfilPuesto;
use App\Livewire\PortalCapacitacion\FuncionesEspecificas\MostrarFunEspecificas;
use App\Livewire\PortalCapacitacion\FuncionesEspecificas\AgregarFunEspecificas;
use App\Livewire\PortalCapacitacion\FuncionesEspecificas\EditarFunEspecificas;
use App\Livewire\PortalCapacitacion\RelacionesInternas\MostrarRelacionesInternas;
use App\Livewire\PortalCapacitacion\RelacionesInternas\AgregarRelacionesInternas;
use App\Livewire\PortalCapacitacion\RelacionesInternas\EditarRelacionesInternas;
use App\Livewire\PortalCapacitacion\RelacionesExternas\MostrarRelacionesExternas;
use App\Livewire\PortalCapacitacion\RelacionesExternas\AgregarRelacionesExternas;
use App\Livewire\PortalCapacitacion\RelacionesExternas\EditarRelacionesExternas;
use App\Livewire\PortalCapacitacion\ResponsabilidadesUniversales\MostrarResponsabilidadesUniversales;
use App\Livewire\PortalCapacitacion\ResponsabilidadesUniversales\AgregarResponsabilidadesUniversales;
use App\Livewire\PortalCapacitacion\ResponsabilidadesUniversales\EditarResponsabilidadesUniversales;
use App\Livewire\PortalCapacitacion\HabilidadesHumanas\MostrarHabilidadesHumanas;
use App\Livewire\PortalCapacitacion\HabilidadesHumanas\AgregarHabilidadesHumanas;
use App\Livewire\PortalCapacitacion\HabilidadesHumanas\EditarHabilidadesHumanas;
use App\Livewire\PortalCapacitacion\HabilidadesTecnicas\MostrarHabilidadesTecnicas;
use App\Livewire\PortalCapacitacion\HabilidadesTecnicas\AgregarHabilidadesTecnicas;
use App\Livewire\PortalCapacitacion\HabilidadesTecnicas\EditarHabilidadesTecnicas;
use App\Livewire\PortalCapacitacion\Usuarios\MostrarUsuario;
use App\Livewire\PortalCapacitacion\Usuarios\VerMasUsuario;
use App\Livewire\PortalCapacitacion\Usuarios\CompararPerfilPuesto;
use App\Livewire\PortalCapacitacion\AsociarPuestoTrabajador\AsociarPuestoTrabajador;
use App\Livewire\PortalCapacitacion\AsociarPuestoTrabajador\AsignarPerfilPuesto;
use App\Livewire\PortalCapacitacion\EvaluarColaborador\FormEvaluar;
use App\Livewire\PortalCapacitacion\EvaluarColaborador\HistorialEvaluaciones;

Route::get('/inicio', Inicio::class)->name('inicio-capacitacion');

 //perfiles de puesto
Route::get('/mostrar-perfil-puesto', MostrarPerfilPuesto::class)->middleware('can:Mostrar Perfil Puesto')->name('mostrarPerfilPuesto');
Route::get('/agregar-perfil-puesto', AgregarPerfilPuesto::class)->middleware('can:Agregar Perfil Puesto')->name('agregarPerfilPuesto');
Route::get('/editar-perfil-puesto/{id}', EditarPerfilPuesto::class)->middleware('can:Editar Perfil Puesto')->name('editarPerfilPuesto');
Route::get('/ver-mas/{id}', VerMasPerfilPuesto::class)->middleware('can:Eliminar Perfil Puesto')->name('vermasPerfilPuesto');

//funciones especificas
Route::get('/mostrar-funciones-especificas', MostrarFunEspecificas::class)->middleware('can:Mostrar Funciones Especificas')->name('mostrarFuncionesEspecificas');
Route::get('/agregar-funciones-especificas', AgregarFunEspecificas::class)->middleware('can:Agregar Funciones Especificas')->name('agregarFuncionesEspecificas');
Route::get('/editar-funciones-especificas/{id}', EditarFunEspecificas::class)->middleware('can:Editar Funciones Especificas')->name('editarFuncionesEspecificas');

//relaciones internas
Route::get('/mostrar-relaciones-internas', MostrarRelacionesInternas::class)->name('mostrarRelacionesInternas');
Route::get('/agregar-relaciones-internas', AgregarRelacionesInternas::class)->name('agregarRelacionesInternas');
Route::get('/editar-relaciones-internas/{id}', EditarRelacionesInternas::class)->name('editarRelacionesInternas');

//relaciones externas
Route::get('/mostrar-relaciones-externas', MostrarRelacionesExternas::class)->name('mostrarRelacionesExternas');
Route::get('/agregar-relaciones-externas', AgregarRelacionesExternas::class)->name('agregarRelacionesExternas');
Route::get('/editar-relaciones-externas/{id}', EditarRelacionesExternas::class)->name('editarRelacionesExternas');

//responsabilidades universales
Route::get('/mostrar-responsabilidades-universales', MostrarResponsabilidadesUniversales::class)->name('mostrarResponsabilidadesUniversales');
Route::get('/agregar-responsabilidades-universales', AgregarResponsabilidadesUniversales::class)->name('agregarResponsabilidadesUniversales');
Route::get('/editar-responsabilidades-universales/{id}', EditarResponsabilidadesUniversales::class)->name('editarResponsabilidadesUniversales');

//habilidades humanas
Route::get('/mostrar-habilidades-humanas', MostrarHabilidadesHumanas::class)->name('mostrarHabilidadesHumanas');
Route::get('/agregar-habilidades-humanas', AgregarHabilidadesHumanas::class)->name('agregarHabilidadesHumanas');
Route::get('/editar-habilidades-humanas/{id}', EditarHabilidadesHumanas::class)->name('editarHabilidadesHumanas');

//habilidades tecnicas
Route::get('/mostrar-habilidades-tecnicas', MostrarHabilidadesTecnicas::class)->name('mostrarHabilidadesTecnicas');
Route::get('/agregar-habilidades-tecnicas', AgregarHabilidadesTecnicas::class)->name('agregarHabilidadesTecnicas');
Route::get('/editar-habilidades-tecnicas/{id}', EditarHabilidadesTecnicas::class)->name('editarHabilidadesTecnicas');

//trabajadores
Route::get('/users', MostrarUsuario::class)->name('mostrarUsuarios');
Route::get('/users/{id}', VerMasUsuario::class)->name('vermasUsuarios');
Route::get('/user/comparar/{id}', CompararPerfilPuesto::class)->name('compararPerfilPuesto');

//asociar puesto para trabajadores
Route::get('/asociar-perfil-puesto', AsociarPuestoTrabajador::class)->name('asociarPuestoTrabajador');
Route::get('/asignar-perfil-puesto/{id}/{tipoUsuario}', AsignarPerfilPuesto::class)->name('asignarPerfilPuesto');

//evaluar colaborador
Route::get('/evaluar-colaborador/{id}', FormEvaluar::class)->name('evaluarColaborador');
Route::get('/historial-evaluaciones/{id}', HistorialEvaluaciones::class)->name('historialEvalaciones');