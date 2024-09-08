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

/*
1)Agregar los controladores y clases necesarias

use App\Http\Controllers\ProfileController; //? Se en carga de llamar la clase ProfileController
use App\Http\Controllers\SettingsController;//? Se en carga de llamar la clase SettingsController
use Illuminate\Support\Facades\Route; //? Se encarga de llamar la clase Route

/*************************************************************************************************************************/

// Agregar la ruta para welcome //? Se utiliza la calse Route para crear una ruta que se encargeue de llamar la vista welcome

Route::get('/', function () { 
    return view('welcome'); 
 });

/*Diccionario de terminos
Route:: //? Se encarga de llamar la clase Route
get //? Se encarga de llamar el metodo get
('/' //? Se encarga de llamar la ruta
('/', function () //? Se encarga de llamar la funcion anonima
{ //? Se encarga de abrir el cuerpo de la funcion anonima
return //? Se encarga de retornar
view //? Se encarga de llamar la vista
('welcome'); //? Se encarga de llamar la vista welcome
}); //? Se encarga de cerrar el cuerpo de la funcion anonima
('welcome'); //? Se encarga de llamar la vista welcome
 


*/