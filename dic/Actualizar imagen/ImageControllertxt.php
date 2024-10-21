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

/********************************************** DICIIONARIO DE TERMINOS PARA ESTA PRACTICA **********************************************************/

/**************************************************************METODO DESTROY*************************************************************************
public function destroy($id) //? Secrea elmetod para eliminar una imagen 
public //? Indica que esta funcion sera publica y podra ser accedida desde cualquier parte de la aplicacion
function //? Indica que se esta creando una funcion
destroy //? Nombre del metodo
($id) //? Parametro que recibe la funcion, para identificar la imagne a eliminar
{ //? Inicio del cuerpo de la funcion

//Conseguir el usuario identificado
$user = Auth::user(); //? Se obtiene el usuario identificado se almacena en una variable llamada $user
$image = Image::find($id); //? Se obtiene la imagen a eliminar por medio de su id y se almacena en una variable llamada $image
$image //? variable que almacenara la cnsulta del rersultado que identifica la imagen a eliminar
Image:: //? Se hace uso del modelo Image para interactuar con la tabla images de la base de datos
find($id); //? Se hace uso del metodo find para buscar la imagen por medio de su id, devulve el primer resultado que encuentra en la base de datos
$image = Image::find($id); //? Se realiza una consulta a la base de datos para obtener la imagen a eliminar por medio de su id y se almacena en una variable llamada $image
$comments = Comment::where('image_id', $id)->get(); //? Se obtienen los comentarios de la imagen a eliminar y se almacenan en una variable llamada $comments
$comments //? Variable que almacenara la consulta del resultado que identifica los comentarios de la imagen a eliminar
Comment:: //? Se hace uso del modelo Comment para interactuar con la tabla comments de la base de datos
where('image_id', $id) //? Se hace uso del metodo where para buscar los comentarios de la imagen por medio de su id
->get(); //? Se hace uso del metodo get para obtener todos los comentarios que pertenecen a esa imagen 
$likes = Like::where('image_id', $id)->get(); //? Se obtienen los likes de la imagen a eliminar y se almacenan en una variable llamada $likes

//Comprobar si el usuario logeado es el dueño de la imagen 
if ($user && $image && $image->user->id == $user->id) { //? Se comprueba si el usuario esta logeado y si la imagen existe y si el usuario logeado es el dueño de la imagen

//Eliminar los comentarios
if ($comments && count($comments) >= 1) { //? Se comprueba si existen comentarios y si la cantidad de comentarios es mayor o igual a 1
foreach ($comments as $comment) { //? Se recorre la coleccion de comentarios
$comment->delete(); //? Se elimina cada comentario
} //? Fin del ciclo foreach
}
}

//Eliminar los likes 
if ($likes && count($likes) >= 1) { //? Se comprueba si existen likes y si la cantidad de likes es mayor o igual a 1
foreach ($likes as $like) { //? Se recorre la coleccion de likes
$like->delete(); //? Se elimina cada like
} //? Fin del ciclo foreach

}

}

//Eliminar el archivo de la imagen
Storage::disk('images')->delete($image->image_path); //? Se elimina el archivo de la imagen por medio de su ruta de almacenamiento
Storage:: //? Se hace uso del facade Storage para interactuar con el sistema de archivos
disk('images') //? Se hace uso del metodo disk para indicar que se va a trabajar con el disco images
->delete($image->image_path); //? Se hace uso del metodo delete para eliminar el archivo de la imagen por medio de su ruta de almacenamiento

//Eliminar el registro de la imagen
$image->delete(); //? Se elimina el registro de la imagen

$message = array('message' => 'la imagen se ha borrado correctamente'); //? Se crea un mensaje de confirmacion de que la imagen se ha eliminado correctamente

} else { //? Si no se cumple la condicion anterior
$message = array('message' => 'la imamgen no se ha podido eliminar'); //? Se crea un mensaje de error que indica que la imagen no se ha podido eliminar
}

//Redireccionar al perfil del usuario
return Redirect::route('home')->with(['status' => 'La imagen se ha borrado correctamente']); //? Se redirecciona al perfil del usuario y se envia un mensaje de confirmacion de que la imagen se ha eliminado correctamente
}

/********************************************************************************************************************************************************************** **/


/**************************************************************METODO EDIT***********************************************************************************
 
public function edit($id) //? Se crea el metodo editar iamgen el cual recibe por parametroi la imagen a editar
{
//Conseguir el usuario identificado y el id de la imagen
$user = \Auth::user(); //? Se obtiene el usuario identificado y se almacena en una variable llamada $user
$image = Image::find($id); //? Se obtiene la imagen a editar por medio de su id y se almacena en una variable llamada $image

//Comprobar si el usuario logeado es el dueño de la imagen
if ($user && $image && $image->user->id == $user->id) { //? Se comprueba si el usuario esta logeado, si la imagen existe y si el usuario logeado es el dueño de la imagen
return view('image.edit', compact('image')); //? Se retorna la vista image.edit y se le pasa como arrar asociativo la imagen a editar

} else { //? Si no se cumple la condicion anterior
return redirect()->route('home'); //? Se redirecciona al home
}
}

/********************************************************************************************************************************************************************** **/

/**************************************************************METODO UPDATE***********************************************************************************
 * 
*  public function update(Request $request, $id) //? Se crea el metodo para actualizar la imagen
public //? Indica que esta funcion sera publica y podra ser accedder desde cualquier parte de la aplicacion
function //? Indica que se esta creando una funcion
update //? Nombre del metodo
(Request $request, $id) //? Parametros que recibe la funcion, el request y el id de la imagen a actualizar
{ //? Inicio del cuerpo de la funcion

//Validacion de los datos que llegan por el formulario de la vista edit.blade.php
$validate = $request->validate([ //? Se valida los datos que llegan por el formulario de la vista edit.blade.php
'image_path' => 'image|mimes:jpg,jpeg,png,gif,svg,webp', //? Se valida que el campo image_path sea una imagen y que tenga una extension valida
'description' => 'string' //? Se valida que el campo description sea de tipo string
]);
//Recoger los datos del usuario logueado y el id de la imagen
$user = \Auth::user(); //? Se obtiene el usuario identificado y se almacena en una variable llamada $user
$image = Image::find($id); //? Se obtiene la imagen a actualizar por medio de su id y se almacena en una variable llamada $image

//Actualizar los datos en la base de datossi si soy el dueño de la imagen
if ($user && $image && $image->user->id == $user->id) { //? Se comprueba si el usuario esta logeado, si la imagen existe y si el usuario logeado es el dueño de la imagen

$image_path = $request->file('image_path'); //? Se obtiene la imagen a actualizar por medio del campo image_path
$description = $request->input('description'); //? Se obtiene la descripcion de la imagen a actualizar

//Asignar nuevos valores a las propiedades del objeto por medio de una instancia de la clase Image que se encargara de remplazar los datos antiguos por los nuevos
$image->description = $description; //? Se asigna la nueva descripcion a la imagen

if ($image_path) { //? Si la imagen existe
$image_path_name = time() . $image_path->getClientOriginalName(); //? Se obtiene el nombre de la imagen
Storage::disk('images')->put($image_path_name, File::get($image_path));//? Se almacena la imagen en el disco images
$image->image_path = $image_path_name;//? Se asigna la nueva ruta de la imagen
}

//Actualizar los datos en la base de datos
$image->save(); //? Se guardan los cambios en la base de datos
return redirect()->route('image.detail', ['id' => $id]) //? Se redirecciona a la vista image.detail y se le pasa como parametro el id de la imagen
->with(['status' => 'imagen actualizada correctamente']);//? Se envia un mensaje de confirmacion de que la imagen se ha actualizado correctamente
} else {//? Si no se cumple la condicion anterior
return redirect()->route('home'); //? Se redirecciona al home
}
}


