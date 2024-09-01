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
     * metood edit, se encarga de mostrar la vista de edición de perfil.
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
        $phone= $request->input('phone');

        // Validamos los datos del formulario con los datos de la base de datos
        $request->validate([
            'name' => ['required', 'string', 'alpha','max:255'],
            'surname' => ['required', 'string','alpha', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users,nick,'.$id],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$id],
            'phone' => ['required', 'digits:10', 'unique:users,phone,'.$id],
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
    if  ($image_path) {

        // Poner nombre unico
      $image_path_name = time().'_'.$image_path->getClientOriginalName();

     // Guardar en la carpeta storage (storage/app/users)
        Storage::disk('users')->put($image_path_name, \File::get($image_path));

        // Seteo el nombre de la imagen en el objeto
        $user->image_path= $image_path_name;
    }
     

          // Guardamos los datos

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

//Metodo para obtener la imagen del usuario
    public function getImage($filename){
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
