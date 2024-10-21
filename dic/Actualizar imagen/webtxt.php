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

    
Route::get('/perfil/{id}',[SettingsController::class,'perfil'])->name('settings.perfil'); //? Se crea una ruta de tipo GET que llama al metodo perfil del controlador SettingsController
get('/perfil/{id}', //? Se crea una ruta de tipo GET que llama al metodo perfil del controlador SettingsController y recibe un parametro id a traves de la URL
[SettingsController::class,'perfil']) //?  llama al metodo perfil del controlador SettingsController
->name('settings.perfil'); //? Se le asigna un nombre a la ruta para que sea mas amigable acceder a ella


// Agregar la ruta para eliminar, editar y actualizar la imagen

Route::get('/image/destroy/{id}', [ImageController::class, 'destroy'])->name('image.destroy'); //? Se crea una ruta de tipo GET que llama al metodo destroy del controlador ImageController
get('/image/destroy/{id}' //? Se crea una ruta de tipo GET que llama al metodo destroy del controlador ImageController y recibe un parametro id a traves de la URL
[ImageController::class, 'destroy']) //?  llama al metodo destroy del controlador ImageController
name('image.destroy') //? Se le asigna un nombre a la ruta para que sea mas amigable acceder a ella

Route::get('/image/{id}/edit', [ImageController::class, 'edit'])->name('image.edit'); //? Se crea una ruta de tipo GET que llama al metodo edit del controlador ImageController
get('/image/{id}/edit', //? SDe crea una ruta  de tipo get que llama al metodo edit del controlador ImageController y recibe un parametro id a traves de la URL
[ImageController::class, 'edit'] //?  llama al metodo edit del controlador ImageController
->name('image.edit'); //? Se le asigna un nombre a la ruta para que sea mas amigable acceder a ella
Route::put('/image/{id}', [ImageController::class, 'update'])->name('image.update'); //? Se crea una ruta de tipo PUT que llama al metodo update del controlador ImageController
put('/image/{id}', //? Se crea una ruta de tipo PUT que llama al metodo update del controlador ImageController y recibe un parametro id a traves de la URL
[ImageController::class, 'update']) //?  llama al metodo update del controlador ImageController
->name('image.update'); //? Se le asigna un nombre a la ruta para que sea mas amigable acceder a ella

});

});



// Agregar la ruta para 'auth'
require __DIR__.'/auth.php';

