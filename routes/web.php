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

Route::get('/', function () {
   return view('welcome');
});



// Agregar la ruta para deshboard autenticacion'
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




// Agregar la ruta para 'profile'
Route::middleware('auth')->group(function () {

    // Agregar las rutas para la configuracion de perfil'
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/avatar/{filename}', [ProfileController::class, 'getImage'])->name('profile.avatar');

    // Agregar la ruta para 'image'
    Route::get('/image', [ImageController::class, 'create'])->name('image.create');
    Route::patch('/image/save', [ImageController::class, 'save'])->name('image.save');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/image/file/{filename}', [HomeController::class, 'getImage'])->name('image.file');
    Route::get('/image/{id}', [ImageController::class, 'detail'])->name('image.detail');

    // Agregar la ruta para 'comment'
    Route::patch('/comment/store', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/destroy/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');

    // Agregar la ruta para 'like'
    Route::get('/like/{image_id}', [LikeController::class, 'like'])->name('like.save');
    Route::get('/deslike/{image_id}', [LikeController::class, 'deslike'])->name('deslike.delete');
    Route::get('/like', [LikeController::class, 'index'])->name('like.index');    
    
    // Agregar la ruta para 'settings'
    Route::get('/perfil/{id}', [SettingsController::class, 'perfil'])->name('settings.perfil');

    // Agregar la ruta para eliminar, editar y actualizar la imagen
    Route::get('/image/destroy/{id}', [ImageController::class, 'destroy'])->name('image.destroy');
    Route::get('/image/{id}/edit', [ImageController::class, 'edit'])->name('image.edit');
    Route::put('/image/{id}', [ImageController::class, 'update'])->name('image.update');
    Route::get('/usuarios', [ProfileController::class, 'index'])->name('profile.index'); 
    });



// Agregar la ruta para 'auth'
require __DIR__.'/auth.php';

