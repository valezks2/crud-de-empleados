<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

Route::get('/', [EmpleadoController::class, 'index'])->name('empleados.index');
Route::resource("/empleados",EmpleadoController::class);
Route::get('/search',[EmpleadoController::class,'search']);