<?php

use App\Http\Controllers\AdoptaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MascotaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/Inicio', InicioController::class)->name('Inicio');
    
    Route::get('/RegistrarMascota', [MascotaController::class, 'index'])->name('RegistrarMascota');

    Route::post('Mascota', [MascotaController::class, 'Registrar'])->name('Mascota.Registrar');

    Route::get('/Adopta', AdoptaController::class)->name('Adopta');
    
});


