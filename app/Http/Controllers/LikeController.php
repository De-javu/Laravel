<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Middleware;
use App\Models\Like;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Metodo para listar loslikes

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


    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        //
    }

    /**
     * Almacenar un recurso recién creado en el almacenamiento.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Actualizar el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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


