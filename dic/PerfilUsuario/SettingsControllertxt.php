<?php

namespace App\Http\Controllers;

use APP\Models\User;

    use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //Se crea el metodo perfil que recibe un parametro id
        public function perfil($id)
    {
        $user = User::find($id);
        return view('settings.perfil', compact('user'));

    }
}

/************************************************************************* DICCIONARIO DE TERMINOS **********************************************************************/

/*
namespace App\Http\Controllers; //?Se declara el namespace de la clase
use APP\Models\User; //?Se importa el modelo User
use Illuminate\Http\Request; //?Se importa la clase Request


class SettingsController extends Controller //? Se declara la clase SettingsController que hereda de la clase Controller
  
public function perfil($id) //? Se crea el metodo perfil que recibe un parametro id
public //? Se utiliza para indicar que el metod sera publico
function //? Se declara una funcion
perfil //? Nombre que se asigna al metodo
($id) //? Parametro que recibe el metodo

{ //? Inicio del metodo
$user = User::find($id); //? Se realiza una consulta a por el orm a al modelo USER con el metodo find que recibe el parametro id y lo almacenamos en una varible $user
$user //? Nombre de la variable que almacena el resultado de la consulta
USER //? Nombre del modelo al que s erealiza la consulta
find //? Metodo del orm que se utiliza para realizar una consulta por id que se le pasa como parametro y este se encraga de buscar el primer registro que coincida con el id

return view('settings.perfil', compact('user')); //? Se retorna la vista settings.perfil que tendra la vista blade y se lep pasa el array como clave user
return //? Se utiliza para retornar un valor
view('settings.perfil', //? Se retorna la vista settings.perfil
compact('user')) //? Se utiliza el metodo compact que recibe como parametro la variable $user y se encarga de pasarla a la vista como un array asociativo con la clave user
    }
}
*/

 




