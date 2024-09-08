<?php

// Agregar los controladoresy clases necesarias

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

// Agregar la ruta para welcome

Route::get('/', function () {
   return view('welcome');
});


// Agregar la ruta para 'settings'
Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');

// Agregar la ruta para deshboard autenticacion'
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Agregar la ruta para 'profile'
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/avatar/{filename}', [ProfileController::class, 'getImage'])->name('profile.avatar');
});

// Agregar la ruta para 'auth'
require __DIR__.'/auth.php';

