<?php

use App\Livewire\Dx035\Encuestas\AgregarEncuesta;
use App\Livewire\Portal360\AgregarRolesDev;
use App\Livewire\Portal360\Asignaciones\AsignacionesAdministrador\AgregarAsignacionesAdministrador;
use App\Livewire\Portal360\Asignaciones\AsignacionesAdministrador\MostrarAsignacionesAdministrador;
use App\Livewire\Portal360\EditarRolesDev;
use App\Livewire\Portal360\EliminarRolesDev;
use App\Livewire\Portal360\Empresa\EmpresaAdministrador\MostrarEmpresaAdministrador;
use App\Livewire\Portal360\Empresa\EmpresaEmpresa\MostrarEmpresaEmpresa;
use App\Livewire\Portal360\Empresa\EmpresaSucursal\MostrarEmpresaSucursal;
use App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreAdministrador\AgregarEncuestaPreguntaEncpreAdministrador;
use App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreAdministrador\EditarEncuestaPreguntaEncpreAdministrador;
use App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreAdministrador\MostrarEncuestaPreguntaEncpreAdministrador;
use App\Livewire\Portal360\Encuesta\EncuestaAdministrador\AgregarEncuestaAdministrador;
use App\Livewire\Portal360\Encuesta\EncuestaAdministrador\EditarEncuestaAdministrador;
use App\Livewire\Portal360\Encuesta\EncuestaAdministrador\MostrarEncuestaAdministrador;
use App\Livewire\Portal360\Inicio;
use App\Livewire\Portal360\MostrarRolesDev;
use App\Livewire\Portal360\Preguntas\PreguntasAdministrador\AgregarPreguntasAdministrador;
use App\Livewire\Portal360\Preguntas\PreguntasAdministrador\EditarPreguntasAdministrador;
use App\Livewire\Portal360\Preguntas\PreguntasAdministrador\EliminarPreguntasAdministrador;
use App\Livewire\Portal360\Preguntas\PreguntasAdministrador\MostrarPreguntasAdministrador;
use App\Livewire\Portal360\Relaciones\RelacionesAdministrador\AgregarRelacionAdministrador;
use App\Livewire\Portal360\Relaciones\RelacionesAdministrador\EditarRelacionAdministrador;
use App\Livewire\Portal360\Relaciones\RelacionesAdministrador\EliminarRelacionAdministrador;
use App\Livewire\Portal360\Relaciones\RelacionesAdministrador\MostrarRelacionAdministrador;
use App\Livewire\Portal360\Relaciones\RelacionesEmpresa\MostrarRelacionesEmpresa;
use App\Livewire\Portal360\Relaciones\RelacionesEmpresa\AgregarRelacionesEmpresa;
use App\Livewire\Portal360\Relaciones\RelacionesEmpresa\EditarRelacionesEmpresa;
use App\Livewire\Portal360\Relaciones\RelacionesEmpresa\EliminarRelacionesEmpresa;
use App\Livewire\Portal360\Relaciones\RelacionesSucursal\AgregarRelacionesSucursales;
use App\Livewire\Portal360\Relaciones\RelacionesSucursal\EditarRelacionesSucursales;
use App\Livewire\Portal360\Relaciones\RelacionesSucursal\EliminarRelacionesSucursales;
use App\Livewire\Portal360\Relaciones\RelacionesSucursal\MostrarRelacionesSucursales;
use Illuminate\Support\Facades\Route;


Route::get('/inicio', Inicio::class)->name('portal360.inicio');


//Relaciones Laborales para Administrador 
Route::get('/mostrar-relacion-administrador', MostrarRelacionAdministrador::class)->name('portal360.relaciones.relaciones-administrador.mostrar-relacion-administrador');
Route::get('/agregar-relacion-administrador', AgregarRelacionAdministrador::class)->name('agregarRealacionAdministrador');
Route::get('/editar-relacion-administrador/{id}', EditarRelacionAdministrador::class)->name('editarRelacionesAdministrador');
Route::get('/eliminar-relacion-administrador', EliminarRelacionAdministrador::class)->name('eliminarRelacionesAdministrador');

//Relaciones Laborales para Empresas 
Route::get('/mostrar-relaciones-empresa', MostrarRelacionesEmpresa::class)->name('portal360.relaciones.relaciones-empresa.mostrar-relaciones-empresa');
Route::get('/agregar-relaciones-empresa', AgregarRelacionesEmpresa::class)->name('agregarRealacionEmpresa');
Route::get('/editar-relaciones-empresa/{id}', EditarRelacionesEmpresa::class)->name('editarRelacionesEmpleados');
Route::get('/eliminar-relaciones-empresa', EliminarRelacionesEmpresa::class)->name('eliminarRelacionesEmpresas');

//Relaciones Laborales para Sucursales 
Route::get('/mostrar-relaciones-sucursales', MostrarRelacionesSucursales::class)->name('portal360.relaciones.relaciones-sucursal.mostrar-relaciones-sucursales');
Route::get('/agregar-relaciones-sucursales', AgregarRelacionesSucursales::class)->name('agregarRealacionSucursales');
Route::get('/editar-relaciones-sucursales/{id}', EditarRelacionesSucursales::class)->name('editarRelacionesSucursales');
Route::get('/eliminar-relaciones-sucursales', EliminarRelacionesSucursales::class)->name('eliminarRelacionesSucursales');


//Mostrar Empresas Administrador 
Route::get('/mostrar-empresa-administrador', MostrarEmpresaAdministrador::class)->name('portal360.empresa.empresa-administrador.mostrar-empresa-administrador');

//Mostrar Empresa Empresa 
Route::get('/mostrar-empresa-empresa', MostrarEmpresaEmpresa::class)->name('portal360.empresa.empresa-empresa.mostrar-empresa-empresa');

//Mostrar Empresa Sucursal 
Route::get('/mostrar-empresa-sucursal', MostrarEmpresaSucursal::class)->name('portal360.empresa.empresa-sucursal.mostrar-empresa-sucursal');


//Mostrar Preguntas Administrador 
Route::get('/mostrar-preguntas-administrador', MostrarPreguntasAdministrador::class)->name('portal360.preguntas.preguntas-administrador.mostrar-preguntas-administrador');
Route::get('/agregar-preguntas-administrador', AgregarPreguntasAdministrador::class)->name('agregarPreguntaAdministrador');
Route::get('/editar-preguntas-administrador/{id}', EditarPreguntasAdministrador::class)->name('editarPreguntaAdmin');
Route::get('/eliminar-preguntas-administrador', EliminarPreguntasAdministrador::class)->name('eliminarPregunta');



//Mostrar Encuesta Administrador 
Route::get('/mostrar-encuesta-administrador', MostrarEncuestaAdministrador::class)->name('portal360.encuesta.encuesta-administrador.mostrar-encuesta-administrador');
Route::get('/agregar-encuesta-administrador', AgregarEncuestaAdministrador::class)->name('agregarEncuestaAdministrador');
Route::get('/editar-encuesta-administrador/{id}', EditarEncuestaAdministrador::class)->name('editarEncuestaAdministrador');
Route::get('/eliminar-encuesta-administrador', [MostrarEncuestaAdministrador::class, 'deleteEncuesta'])->name('eliminarEncuesta');

// Route::get('/eliminar-pregunta', [EncuestaDev::class, 'deleteEncuesta'])->middleware('can:Eliminar Encuesta')->name('eliminarEncuesta');

//Mostrar Asignaciones Administrador 
Route::get('/mostrar-asignaciones-administrador', MostrarAsignacionesAdministrador::class)->name('portal360.asignaciones.asignaciones-administrador.mostrar-asignaciones-administrador');
Route::get('/agregar-asignaciones-administrador', AgregarAsignacionesAdministrador::class)->name('agregarAsignacionAdministrador');


//Mostrar Encpre Administrador 
Route::get('/mostrar-encuesta-pregunta-encpre-administrador', MostrarEncuestaPreguntaEncpreAdministrador::class)->name('portal360.encpre.encuesta-pregunta-encpre-administrador.mostrar-encuesta-pregunta-encpre-administrador');
Route::get('/agregar-encuesta-pregunta-encpre-administrador', AgregarEncuestaPreguntaEncpreAdministrador::class)->name('agregarEncpreAdministrador');
Route::get('/editar-encuesta-pregunta-encpre-administrador/{id}', EditarEncuestaPreguntaEncpreAdministrador::class)->name('editarEncuestaAdministrador');
Route::get('/eliminar-encuesta-pregunta-encpre-administrador', [MostrarEncuestaPreguntaEncpreAdministrador::class, 'deleteEncpreAdministrador'])->name('eliminarEncpreAdministrador');

//Despues elimino los roles 
Route::get('/mostrar-roles-dev', MostrarRolesDev::class)->name('portal360.mostrarRoles');
Route::get('/agregar-roles-dev', AgregarRolesDev::class)->name('agregarRoles');
Route::get('/eliminar-roles-dev', EliminarRolesDev::class)->name('eliminarRoles');
Route::get('/editar-roles-dev{id}', EditarRolesDev::class)->name('editRolesdev');

