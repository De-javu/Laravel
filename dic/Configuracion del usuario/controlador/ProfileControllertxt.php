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
            'phone' => ['required', 'string', 'max:10', 'unique:users,phone,' . $id],
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

/**************************************************************************************************************************************************************** */


/*Se crea la clase ProfileController que extiende de Controller*/
class ProfileControllertxt extends Controller
{
 //Se crea el metodo edit que recibe un request y devuelve una vista
    public function edit(Request $request): View // = Indica que el metodo edit recibe un request y devuelve una vista
    {
        return view('profile.edit', [
            'user' => $request->user(), // = Devuelve la vista profile.edit y el usuario
        ]);
    }
/*
DICIONARIO DE TERMINOS:
Request = Es una clase que se utiliza para obtener los datos de la solicitud.
$request = Es una variable que se utiliza para obtener los datos de la solicitud.
View = Es una clase que se utiliza para devolver una vista.
view = Es una funcion que se utiliza para devolver una vista.
'user' = Es una variable que se utiliza para almacenar los datos del usuario.
user() = Es una funcion que se utiliza para obtener los datos del usuario. 

********************************************************************************************************************************************************************* */
/*
Metodo update se encarga de actualizar la informacio del usuario una vez esta logedo en la aplicacion.

 */public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //dd($request->hasFile('image_path'));       

        // Obtenemos el usuario identificado de la clase Auth
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


        // Se capturan los datos que llegan por las variables para actualizara la informacion del objeto usuario en cada campo o columna de la tabla de datos 
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

            // Seteo el nombre de la imagen en el objeto, se hace los mismos que en los datos anteriores
            // se optiene la varibale con la informacion, para actalizar la informacion del objeto usuario en la tabla de datos
            $user->image_path = $image_path_name;
        }


        // Guardamos los datos

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

/*
DICIONARIO DE TERMINOS:
ProfileUpdateRequest = Se utiliza para validar y filtra los datos antes de que lleguen al controlador.
RedirectResponse = Es una clase que se utiliza para redirigir la respuesta.
Auth::user(); = Es una funcion que se utiliza para obtener los datos del usuario desde la clase Auth.
Auth:: = Es una clase que se utiliza para autenticar al usuario.
user(); = Es una funcion que se utiliza para obtener los datos del usuario.
validate = Es una funcion que se utiliza para validar los datos.
alpha = Es una regla de validacion que permite solo letras.
lowercase = Es una regla de validacion que permite solo letras minusculas.
nullable = Es una regla de validacion que permite valores nulos.
mimes = Es una regla de validacion que permite solo ciertos tipos de archivos.
file = Es una regla de validacion que permite solo archivos.
time() = Es un metodo que se utiliza para obtener la hora actual en hora unix desde 1 ene 1970.
-> =    Es un operador que se utiliza para acceder a los metodos y propiedades de un objeto.
getClientOriginalName() = Es un metodo que se utiliza para obtener el nombre original del archivo.
Storage:: = Es una clase que se utiliza para almacenar archivos.
Storage::disk('users') Se utiliza para almacenar archivos en la carpeta users.manejar por disco adicional, podemos configurar la nube. crear cuantos discos queramos.
put = Es un metodo que se utiliza para guardar un archivo.
FILE::get = Es un metodo que se utiliza para obtener un archivo y leerlo.
$user->image_path = $image_path_name; = Se utiliza para guardar el nombre de la imagen en el objeto usuario.
isDirty = Es un metodo que se utiliza para verificar si un atributo ha cambiado.
email_verified_at = Es un atributo que se utiliza para verificar si el correo ha sido verificado.
Redirect:: = Es una clase que se utiliza para redirigir la respuesta.
whith = Es un metodo que se utiliza para enviar un mensaje.
status = Es una variable que se utiliza para almacenar el estado de la respuesta.
dd = Es un metodo que se utiliza para imprimir y detener la ejecucion del programa.
*/

//***********************************************************************************************************************************************************************************

//Metodo para obtener la imagen del usuario
public function getImage($filename)
{
    $file = Storage::disk('users')->get($filename);
    return new Response($file, 200);
}
/*
DICIONARIO DE TERMINOS:
$filename = Es una variable que se utiliza para almacenar el nombre del archivo.
Storage::disk('users') = Se utiliza para obtener el disco users.
get = Es un metodo que se utiliza para obtener un archivo.
new Response($file, 200) = Se utiliza para devolver una respuesta con el archivo.


//***************************************************************************************************************************************************************************************

 * Metod para eliminar el usuarios cuenta del Usuario.
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

/*
DICIONARIO DE TERMINOS:
destroy = Es el nombre que le asignamos al metodo.
Request = Es una clase que se utiliza para obtener los datos de la solicitud.
$request = Es una variable que se utiliza para obtener los datos de la solicitud.
validateWithBag = Es un metodo que se utiliza para validar los datos y almacenar los errores en una bolsa de errores.
userDeletion = Es una bolsa de errores que se utiliza para almacenar los errores de la eliminacion del usuario.
password = Es una regla de validacion que se utiliza para validar la contraseña.
required = Es una regla de validacion que se utiliza para requerir un campo.
current_password = Es una regla de validacion que se utiliza para validar la contraseña actual antes de asignar una nueva 
user() = Se utiliza para obtener el usuario autenticado.
Auth::logout() = Se utiliza para cerrar la sesion del usuario.
logout() = Es un metodo que se utiliza para cerrar la sesion del usuario.
delete() = Es un metodo que se utiliza para eliminar un registro.
session()= Es un metodo que se utiliza para obtener la sesion. 
invalidate() = Es un metodo que se utiliza para invalidar la sesion.
regenerateToken() = Es un metodo que se utiliza para regenerar el token de la sesion cuando se invalida, para protegewr el sistema de ataques.
Redirect::to('/') = Se utiliza para redirigir al usuario a la ruta especificada.
to('/) = Es un metodo que se utiliza para redirigir al usuario a la ruta especificada.
*/
}




