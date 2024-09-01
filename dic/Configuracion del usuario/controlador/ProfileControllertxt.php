<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * metodo edit, se encarga de mostrar la vista de edición de perfil.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Este metodo se encarga de actualizar la información del usuario.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //dd($request->hasFile('image_path'));       

        // Obtenemos el usuario identificado
        $user = Auth::user();

        //obtenemos los datos del fomulario 
        $id = $user->id;
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
        $phone = $request->input('phone');

        // Validamos los datos del formulario con los datos de la base de datos
        $request->validate([
            'name' => ['required', 'string', 'alpha', 'max:255'],
            'surname' => ['required', 'string', 'alpha', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users,nick,' . $id],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id],
            'phone' => ['required', 'string', 'max:20'],
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',

        ]);


        // Capturamos los datos y los guardamos en la base de datos
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;
        $user->phone = $phone;


        //Subir la imagen
        $image_path = $request->file('image_path');
        if ($image_path) {

            // Poner nombre unico
            $image_path_name = time() . '_' . $image_path->getClientOriginalName();

            // Guardar en la carpeta storage (storage/app/users)
            Storage::disk('users')->put($image_path_name, \File::get($image_path));

            // Seteo el nombre de la imagen en el objeto
            $user->image_path = $image_path_name;
        }


        // Guardamos los datos

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    //Metodo para obtener la imagen del usuario
    public function getImage($filename)
    {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    /**
     * Eliminar la cuenta del Usuario.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}


// Diccionario de terminos utilizadios para esta practica 

/*

namespace App\Http\Controllers;
namescape = Espacio de nombres
use = Se utiliza para importar las calses que se necesitan
App = Es el nombre de la carpeta principal de la aplicacion
Iluuminate = Es el nombre de la carpeta principal del framework
use App\Http\Requests\ProfileUpdateRequest; = Indica que se importatra la clase ProfileUpdateRequest
use Illuminate\Http\RedirectResponse; = Indica que se importara la clase RedirectResponse
use Illuminate\Http\Request; = Indica que se importara la clase Request
use Illuminate\Http\Response; = Indica que se importara la clase Response
use Illuminate\Support\Facades\Auth; 61 = Indica que se importara la clase Auth
use Illuminate\Support\Facades\Redirect; = Indica que se importara la clase Redirect
use Illuminate\View\View; = Indica que se importara la clase View
use Illuminate\Support\Facades\Storage; = Indica que se importara la clase Storage
use Illuminate\Support\Facades\File; = Indica que se importara la clase File



/*Se crea el metodo edit que recibe un request y devuelve una vista*/
//Se crea la clase ProfileController que extiende de Controller
class ProfileControllertxt extends Controller
{

    public function edit(Request $request): View // = Indica que el metodo edit recibe un request y devuelve una vista
    {
        return view('profile.edit', [
            'user' => $request->user(), // = Devuelve la vista profile.edit y el usuario
        ]);
    }


/*
Request = Es una clase que se utiliza para obtener los datos de la solicitud.
$request = Es una variable que se utiliza para obtener los datos de la solicitud.
View = Es una clase que se utiliza para devolver una vista.
view = Es una funcion que se utiliza para devolver una vista.
'user' = Es una variable que se utiliza para almacenar los datos del usuario.
user() = Es una funcion que se utiliza para obtener los datos del usuario. 


 */


/**/


}