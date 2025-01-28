<?php

use App\Livewire\Crm\Inicio;
use App\Livewire\Crm\Agregarempresa;
use Illuminate\Support\Facades\Route;

Route::get(
    '/crm-inicio',
        Inicio::class
)->name('Inicio');


Route::get(
    '/crm-createCrm',
    Agregarempresa::class
)->name('Createcrm');