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

class ImageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function create()
    {
        return view('image.create');
    }

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

    public function detail($id)
    {
        $image = Image::find($id);
        return view('image.detail', ['image' => $image]);
    }
}
