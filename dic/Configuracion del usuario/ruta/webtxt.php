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

// Agregar la ruta para welcome //? Se utiliza la clase Route para crear una ruta que se encargeue de llamar la vista welcome

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
('welcome'); //? Se encarga de llamar la vista welcome.

*******************************************************************************************************************/
//Agregar la ruta para 'settings'//? Se utiliza la clase Route para crear una ruta que se encargeue de llamar la vista settings

Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');

/*Diccionario de terminos
Route:: //? Se encarga de llamar la clase Route
get //? Se encarga de llamar el metodo get
('/settings' //? Se encarga de llamar la ruta
([SettingsController::class, 'edit']) //? Se encarga de llamar el controlador SettingsController y el metodo edit
->name //? Se encarga de asignar un nombre para la ruta
('settings.edit'); //? Se encarga de llamar el nombre de la ruta settings.edit

/******************************************************************************************************************************/
 // Agregar la ruta para deshboard autenticacion' //? Se crea un ruta con la clase Route de método get, la cual será para la ruta dashboard con una función anónima, que retorna la vista dashboard y aplica un método  middleware y aplicamos los middleware auth, el cual se encarga de asegurar que solo los usuarios autenticados pueden acceder a esta ruta y verified, se encarga de validar que el usuario tenga su cuenta autenticada, por último le asignamos el un nombre de facil acceso.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*Diccionario de terminos
Route:: //? Se encraga de llmara a la clase route que se encraga de crear una ruta
get //? Se encarga de llamara al metod get, que se encarga de obtener la vista
('deshboard', function () //? Se encarga de llamar a la ruta dashboard y una funcion anonima
{ //? Se encarga de abrir el cuerpo de la funcion anonima 
return //? Se encarga de retornar
view('dashboard'); //? Se encraga de llamar la vista dashboard
})->middleware //? Se encarga de llamar al middlewarr,que es el encargado de validar la utenticacion y verificacio de la ruta brindando seguridad
(['auth', 'verified']) //? Se encarga de llamar a los middleware auth y verified
->name('dashboard'); //? Se encarga de asignar un nombre a la ruta dashboard.
/**************************************************************************************************************************************************************/
// Agregar la ruta para 'profile'

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/avatar/{filename}', [ProfileController::class, 'getImage'])->name('profile.avatar');
});
 
/*
Diccionario de terminos
Route:: //? Se encarga de llamar la clase Route
middleware('auth) //? Se llama al metodo middleware y se le pasa el parametro auth, el cual se encarga de validar que el usuario este autenticado
group(function() //? Se encarga de llamar al metodo group y una funcion anonima
{ //? Se encarga de abrir el cuerpo de la funcion anonima
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');//? Se encarga de llamar a la ruta profile y el metodo edit del controlador ProfileController le asigna un nombre a la ruta de facil acceso
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); //? Se encarga de llamar a la ruta profile y el metodo update del controlador ProfileController le asigna un nombre a la ruta de facil acceso
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); //? Se encarga de llamar a la ruta profile y el metodo destroy del controlador ProfileController le asigna un nombre a la ruta de facil acceso
Route::get('/profile/avatar/{filename}', [ProfileController::class, 'getImage'])->name('profile.avatar'); //? Se encarga de llamar a la ruta profile y el metodo getImage del controlador ProfileController le asigna un nombre a la ruta de facil acceso
}); //? Se encarga de cerrar el cuerpo de la funcion anonima


***************************************************************************************************************************/

// Agregar la ruta para 'auth'
require __DIR__.'/auth.php'; //? Se encarga de llamar al archivo auth.php

/*DICIONARIO DE TERMINOS
require //? Se encarga de llamar al archivo auth.php
__DIR__ //? Se encarga de llamar al directorio actual
'/auth.php'; //? Se encarga de llamar al archivo auth.php
*/