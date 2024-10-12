<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Middleware;
use App\Models\Like;

class LikeController extends Controller
{

    public function index()
    {
        // Obtenemos el usuario autenticado
        $user = \Auth::user();

        // Obtenemos los likes de la base de datos
        $likes = Like::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(5);

        // Retornamos la vista like.index con el listado likes
        return view('like.index', compact('likes'));
    }

    public function like($image_id)
    {
        // Obtenemos el usuario autenticado
        $user = \Auth::user();


        // Comprobar si ya existe el like
        $isset_like = Like::where('user_id', $user->id)
            ->where('image_id', $image_id)
            ->count();


        // Creamos una nueva instancia de Like para asiognar valores a las propiriedades de la tabla likes
        if ($isset_like == 0) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int) $image_id;


            // Guardamos el like en la base de datos
            $like->save();


            // Devolver respuesta en formato json si la consulta se ha realizado correctamente
            return response()->json([
                'like' => $like
            ]);


            // Delvolvemos un mensaje de error si el like ya exite en la base de datos
        } else {
            return response()->json([
                'message' => 'El like ya existe'
            ]);
        }


    }


    public function deslike($image_id)
    {
        // obtener el usuario autenticado
        $user = \Auth::user();


        // validar en la db si existe el like  y capturamos el primer registro de nos devulva  en una variable
        $like = LIKE::where('user_id', $user->id)
            ->where('image_id', $image_id)
            ->first();


        // si existe el like en la base de datos
        if ($like) {


            //Elimnar el like de la db
            $like->delete();
            return response()->json([
                'like' => $like,
                'message' => 'Se ha eliminado el like'
            ]);

            // si no existe el like en la base de datos
        } else {
            return response()->json([
                'message' => 'El like no existe'
            ]);
        }


    }
}


/**********************************************DICCIOANRIO DE TERMINOS PARA LOS CONTROLADORES**********************************************************************
namespace App\Http\Controllers; //? Se utiliza para definir el espacio de nombres de la clase
use Illuminate\Http\Request; //? Se utiliza para importar la clase Request
use \Illuminate\Support\Facades\Middleware; //? Se utiliza para importar la clase Middleware
use App\Models\Like; //? Se utiliza para importar la clase Like
class LikeController extends Controller //? Se utiliza para definir la clase LikeController que extiende de la clase Controller
class //? indica que s e esta definiendo una clase
LikeController //? es el nombre de la clase
extends //? se utiliza para indicar que la clase LikeController hereda de la clase Controller
{ //? Se dara apertura al controlador para la creacion de metododos.

//**********************************************************************Metodo index**********************************************************************************
public function index() //? Se define el metodo index
public //? indica que sera un metodo publico
function //? indica que se esta definiendo un metodo
index() //? es el nombre del metodo
{ //? Se da apertura al metodo index
$user = \Auth::user(); //? Se obtiene el usuario autenticado
$user //? es una variable que almacena el usuario autenticado
\Auth:: //? se utiliza para acceder a la clase Auth
user(); //? Es un metod del objeto Auth , que permiete debolver el usuario autenticado
$likes = Like::where('user_id', $user->id) //? Se obtienen los likes que estan almacenados en la base de datos
$likes //? es una variable que almacena  las cosulta de los likes
Like:: //? se utiliza para acceder a la clase Like
where //? se utiliza para hacer una consulta en la base de datos pero con condiciones
('user_id', $user->id) //? se establece la condicion de la consulta, cual pide que el ususario que se almacena en la db sea igual al usuario autenticado
->orderBy('id', 'desc') //? se ordenan los likes de forma descendente
-> //? se utiliza para encadenar metodos
orderBy //? se utiliza para ordenar los registros de la base de datos
('id', 'desc') //? se ordenan los registros por el id de forma descendente
->paginate(5); //? se paginan los registros de la base de datos en 5 registros por pagina
return view('like.index', compact('likes')); //? se retorna la vista like.index con los likes paginados
return //? se utiliza para retornar un valor
view //? se utiliza para retornar una vista
('like.index', //? se retorna la vista like.index el cual sera el nombre de la vista y se le pasa la variable likes
compact('likes')); //? se utiliza para pasar la variable que se utilizara como array asociativo en la vista
} //? Se cierra el metodo index
************************************************************************************************************************************************************************/

//**********************************************************************Metodo like**********************************************************************************/
/*
public function like($image_id) //? Se define el metodo like
public //? indica que sera un metodo publico
function //? indica que se esta definiendo un metodo
like($image_id) //? es el nombre del metodo
($image_id) //? es el parametro que recibe el metodo
{//? Se da apertura al metodo like
$user = \Auth::user(); //? Se obtiene el usuario autenticado
$user //? es una variable que almacena el usuario autenticado
\Auth:: //? se utiliza para acceder a la clase Auth
user(); //? Es un metod del objeto Auth , que permiete debolver el usuario autenticado
$isset_like = Like::where('user_id', $user->id) //? Se comprueba si ya existe el like en la db
$isset_like //? es una variable que almacena  el resultado de la consulta de los likes
Like:: //? se utiliza para acceder a la clase Like
where //? se utiliza para hacer una consulta en la base de datos pero con condiciones
('user_id', $user->id) //? se establece la condicion de la consulta, cual pide que el ususario que se almacena en la db sea igual al usuario autenticado
->where('image_id', $image_id) //? se establece la condicion de la consulta, cual pide que el id de la imagen sea igual al id de la imagen que se pasa por parametro
->count(); //? se cuenta los registros de la consulta que coinciden con las condiciones establecidas en la consulta.
if ($isset_like == 0) { //? Se comprueba si el like no existe en la base de datos
if //? se utiliza para establecer una condicion
($isset_like == 0) //? se establece la condicion de la consulta, cual pide que el resultado de la consulta sea igual a 0
{ //? Se da apertura a la condiciones
$like = new Like(); //? Se crea una nueva instancia de la clase Like
$like //? es una variable que almacena la nueva instancia de la clase Like
new //? se utiliza para crear una nueva instancia de la clase Like
Like(); //? se utiliza para acceder a la clase Like
$like->user_id = $user->id; //? Se asigna el id del usuario autenticado a la propiedad user_id de la tabla likes
$like->image_id = (int) $image_id; //? Se asigna el id de la imagen que se pasa por parametro a la propiedad image_id de la tabla likes
$like->save(); //? Se guarda el like en la base de datos
return response()->json([ //? Se retorna una respuesta en formato json
reposnse()-> //? se utiliza para retornar una respuesta
json([ //? se retorna una respuesta en formato json
'like' => $like //? se retorna el like  en formato json
]); //? Se cierra la respuesta en formato json
} else { //? Se cierra la condicion
return response()->json([ //? Se retorna una respuesta en formato json
'message' => 'El like ya existe' //? se retorna un mensaje en formato json
]); //? Se cierra la respuesta en formato json
} //? Se cierra la condicion
************************************************************************************************************************************************************************/
/**********************************************************************Metodo deslike**********************************************************************************/
/*
public function deslike($image_id) //? Se define el metodo deslike
public //? indica que sera un metodo publico
function //? indica que se esta definiendo un metodo
deslike($image_id) //? es el nombre del metodo
($image_id) //? es el parametro que recibe el metodo
{//? Se da apertura al metodo deslike
$user = \Auth::user(); //? Se obtiene el usuario autenticado
$user //? es una variable que almacena el usuario autenticado
\Auth:: //? se utiliza para acceder a la clase Auth
user(); //? Es un metodo del objeto Auth , que permiete debolver el usuario autenticado
$like = LIKE::where('user_id', $user->id) //? Se valida en la db si existe el like
$like //? es una variable que almacena  el resultado de la consulta de los likes
LIKE:: //? se utiliza para acceder a la clase LIKE
where //? se utiliza para hacer una consulta en la base de datos pero con condiciones
('user_id', $user->id) //? se establece la condicion de la consulta, cual pide que el ususario que se almacena en la db sea igual al usuario autenticado
->first(); //? se obtiene el primer registro de la consulta
if ($like) { //? Se comprueba si existe el like en la base de datos
if //? se utiliza para establecer una condicion
($like) //? se establece la condicion de la consulta, cual pide que el resultado de la consulta sea verdadero
$like->delete(); //? Se elimina el like de la base de datos
return response()->json([ //? Se retorna una respuesta en formato json
'like' => $like, //? se retorna el like en formato json
'message' => 'Se ha eliminado el like' //? se retorna un mensaje en formato json
]); //? Se cierra la respuesta en formato json
} else { //? Se cierra la condicion y se abre una nueva condicion  
 return response()->json([ //? Se retorna una respuesta en formato json
'message' => 'El like no existe' //? se retorna un mensaje en formato json
]); //? Se cierra la respuesta en formato json
} //? Se cierra la condicion

