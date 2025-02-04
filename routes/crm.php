<?php

use App\Livewire\Crm\Inicio;
use App\Livewire\Crm\AgregarCrmEmpresa;
use App\Livewire\Crm\CrmEmpresa\Agregar\AgregarEmpresa;
use App\Livewire\Crm\CrmEmpresa\Editar\EditarEmpresa;
use App\Livewire\Crm\CrmEmpresa\Eliminar\EliminarEmpresa;
use App\Livewire\Crm\SubirImagenes;
use App\Models\Crm\DatosFiscale;
use Illuminate\Support\Facades\Route;

Route::get(
    '/crm-inicio',
        Inicio::class
)->name('InicioCrm');

// Route::get(
//     '/crm-createCrm',
//     AgregarCrmEmpresa::class
// )->name('Createcrm');

// Route::get(
//     '/crm-subirimg',
//     SubirImagenes::class
// )->name('imgsubir');

Route::get(
    '/crm-createempresa',
    AgregarEmpresa::class
)->name('Createcrm');

Route::get(
    '/crm-editempresa/{id}',
    EditarEmpresa::class
)->name('EditEmpresa');

Route::post(
    '/crm-deleteEmpresa/{id}',
    EliminarEmpresa::class
)->name('EliminarEmpresa');

// Route::get(
//     '/crm-datosFiscale',
//     DatosFiscale::class
// )->name('datosfisc');