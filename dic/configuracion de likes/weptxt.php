<?php

// Agregar los controladoresy clases necesarias

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;



// Agregar la ruta para welcome


// Agregar la ruta para 'profile'
Route::middleware('auth')->group(function () {
Route::get('/like/{image_id}', [LikeController::class, 'like'])->name('like.save');
Route::get('/deslike/{image_id}', [LikeController::class, 'deslike'])->name('deslike.delete');
Route::get('/like', [LikeController::class, 'index'])->name('like.index');
});



// Agregar la ruta para 'auth'
require __DIR__.'/auth.php';

/*****************************************************************************DICIONARIO DE RUTAS************************************************************************
use App\Http\Controllers\ProfileController; //? ProfileController es un controlador que se encarga de la gestion de los perfiles de usuario
use App\Http\Controllers\SettingsController; //? SettingsController es un controlador que se encarga de la gestion de la configuracion de la cuenta de usuario
use Illuminate\Support\Facades\Route; //? Route es una clase que se encarga de gestionar las rutas de la aplicacion
use App\Http\Controllers\ImageController; //? ImageController es un controlador que se encarga de la gestion de las imagenes
use App\Http\Controllers\HomeController; //? HomeController es un controlador que se encarga de la gestion de la pagina principal
use App\Http\Controllers\CommentController; //? CommentController es un controlador que se encarga de la gestion de los comentarios
use App\Http\Controllers\LikeController; //? LikeController es un controlador que se encarga de la gestion de los likes


Route::middleware('auth')->group(function () { //? Se crea un grupo de rutas que requieren autenticacion
Route:: //? Se utiliza para difinier ruta de diferentes tipos, GET, POST, PUT, DELETE, middleware, name, etc
middleware('auth')->group(function () { //? Se crea un grupo de rutas que requieren autenticacion

Route::get('/like/{image_id}', [LikeController::class, 'like'])->name('like.save'); //? Se crea una ruta de tipo GET que llama al metodo like del controlador LikeController
get('/like/{image_id}', //? Se crea una ruta de tipo GET que llama al metodo like del controlador LikeController y recibe un parametro image_id a traves de la URL
[LikeController::class, 'like']) //?  llama al metodo like del controlador LikeController 
->name('like.save'); //? Se le asigna un nombre a la ruta para que sea mas amigable acceder a ella

Route::get('/like/{image_id}', [LikeController::class, 'like'])->name('like.save'); //? Se crea una ruta de tipo GET que llama al metodo like del controlador LikeController
get('/like/{image_id}', //? Se crea una ruta de tipo GET que llama al metodo like del controlador  recibe un parametro image_id a traves de la URL)
[LikeController::class, 'like']) //?  llama al metodo like del controlador LikeController
->name('like.save'); //? Se le asigna un nombre a la ruta para que sea mas amigable acceder a ella

Route::get('/deslike/{image_id}', [LikeController::class, 'deslike'])->name('deslike.delete'); //? Se crea una ruta de tipo GET que llama al metodo deslike del controlador LikeController
get('/deslike/{image_id}', //? Se crea una ruta de tipo GET que llama al metodo deslike del controlador LikeController y recibe un parametro image_id a traves de la URL
[LikeController::class, 'deslike']) //?  llama al metodo deslike del controlador LikeController
->name('deslike.delete'); //? Se le asigna un nombre a la ruta para que sea mas amigable acceder a ella

Route::get('/like', [LikeController::class, 'index'])->name('like.index'); //? SE creauna ruta tipo GET que llama al metodo index del controlador likeController.
get('/like', //? Se crea una ruta tipo GET que llama al metodo index del controlador likeController.
[LikeController::class, 'index']) //? Se encarga de llamar el metodo index del controladoer LikeController.
->name('like.index'); //? Se le asigna un nombre a la ruta para que sea mas amigable acceder a ella

require __DIR__.'/auth.php'; //? Se requiere el archivo auth.php que contiene las rutas de autenticacion
required //? Indica que se requiere un archivo
__DIR__ //? Indica que el archivo magico esta en el mismo directorio
'/auth.php' //? Nombre del archivo que se requiere
