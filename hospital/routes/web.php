<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicamentoController;

Route::resource('pacientes', PacienteController::class);
Route::resource('medicamentos', MedicamentoController::class);