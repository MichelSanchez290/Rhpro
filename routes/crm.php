<?php

use App\Livewire\Crm\Inicio;
use App\Livewire\Crm\AgregarCrmEmpresa;
use App\Livewire\Crm\CrmEmpresa\Agregar\AgregarEmpresa;
use App\Livewire\Crm\SubirImagenes;
use App\Models\Crm\DatosFiscale;
use Illuminate\Support\Facades\Route;

Route::get(
    '/crm-inicio',
        Inicio::class
)->name('InicioCrm');


Route::get(
    '/crm-createCrm',
    AgregarCrmEmpresa::class
)->name('Createcrm');

Route::get(
    '/crm-subirimg',
    SubirImagenes::class
)->name('imgsubir');

Route::get(
    '/crm-subirempresaimg',
    AgregarEmpresa::class
)->name('subirImg');

// Route::get(
//     '/crm-datosFiscale',
//     DatosFiscale::class
// )->name('datosfisc');
