<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Redirect;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;

class ImageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    //*Metodo para crear una imagen
    public function create()
    {
        return view('image.create');
    }




    //*Metodo para guardar la imagen
    public function save(Request $request): RedirectResponse
    {
        //Validacion de los datos que llegan por el formulario de subir imagen 
        $request->validate(rules: [
            'image_path' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'description' => 'required'
        ]);

        //  Recolectar los datos que llegan por el formulario de subir imagen
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        // Crear un objeto de la clase Image
        $user = Auth::user();
        $image = new Image();
        $image->user_id = $user->id;
        $image->description = $description;

        // Subir la imagen al servidor
        if ($image_path) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;

        }

        // Guardar la imagen en la base de datos
        $image->save();
        return Redirect::route('image.create')->with(['status' => 'La imagen se ha subido correctamente']);
    }



    //*Metodo para mostrar la imagen
    public function detail($id)
    {
        $image = Image::find($id);
        return view('image.detail', compact('image'));
    }



    //*Metodo para eliminar la imagen
    public function destroy($id)
    {

        //Conseguir el usuario identificado
        $user = Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();

        //Comprobar si el usuario logeado es el dueño de la imagen 
        if ($user && $image && $image->user->id == $user->id) {

            //Eliminar los comentarios
            if ($comments && count($comments) >= 1) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }

            //Eliminar los likes
            if ($likes && count($likes) >= 1) {
                foreach ($likes as $like) {
                    $like->delete();

                }

            }

            //Eliminar el archivo de la imagen
            Storage::disk('images')->delete($image->image_path);

            //Eliminar el registro de la imagen
            $image->delete();

            $message = array('message' => 'la imagen se ha borrado correctamente');

        } else {
            $message = array('message' => 'la imamgen no se ha podido eliminar');
        }

        //Redireccionar al perfil del usuario
        return Redirect::route('home')->with(['status' => 'La imagen se ha borrado correctamente']);
    }




    //*Metodo para editar Imagen 
    public function edit($id)
    {
        //Conseguir el usuario identificado y el id de la imagen
        $user = \Auth::user();
        $image = Image::find($id);

        //Comprobar si el usuario logeado es el dueño de la imagen
        if ($user && $image && $image->user->id == $user->id) {
            return view('image.edit', compact('image'));

        } else {
            return redirect()->route('home');
        }
    }



    //*Metodo para actualizar la imagen
    public function update(Request $request, $id)
    {
        //Validacion de los datos que llegan por el formulario de la vista edit.blade.php
        $validate = $request->validate([
            'image_path' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
            'description' => 'string'
        ]);
        //Recoger los datos del usuario logueado y el id de la imagen
        $user = \Auth::user();
        $image = Image::find($id);

        //Actualizar los datos en la base de datossi si soy el dueño de la imagen
        if ($user && $image && $image->user->id == $user->id) {

            $image_path = $request->file('image_path');
            $description = $request->input('description');

           //Asignar nuevos valores a las propiedades del objeto por medio de una instancia de la clase Image que se encargara de remplazar los datos antiguos por los nuevos
            $image->description = $description;

            if ($image_path) {
                $image_path_name = time() . $image_path->getClientOriginalName();
                Storage::disk('images')->put($image_path_name, File::get($image_path));
                $image->image_path = $image_path_name;
            }

           //Actualizar los datos en la base de datos
            $image->save();
            return redirect()->route('image.detail', ['id' => $id])
                ->with(['status' => 'imagen actualizada correctamente']);
        } else {
            return redirect()->route('home');





        }
    }
}
