<?php

use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/RegistrarMascota', function () {
        return view('RegistrarMascota');
    })->name('RegistrarMascota');

    Route::post('Mascota', [Controller::class, 'store'])->name('Mascota.store');

    Route::get('/Adopta', function () {
        return view('Adopta');
    })->name('Adopta');
    
})->middleware('edad');

Route::get ('no tiene la edad' , function () {
    return"usted no es nayor de edad";
});

