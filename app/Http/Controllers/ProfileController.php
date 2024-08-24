<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
        // obtenemos el usuario autenticado
        $user = Auth::user();

        // obtenemos los datos del fomulario formulario
        $id = $user->id;
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

    // Capturamos los datos y los guardamos en la base de datos
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;


  

     

          // Guardamos los datos

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
