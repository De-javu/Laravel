<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index()
    {
        //
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
        // valiadcion de los datos que llegan
        $validate = $request->validate([
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        // recoge el usuario autenticado
           $user = \Auth::user();

        // recoge los datos que llegan del formulario de la vista detail.blade.php
           $image_id = $request->input('image_id');
           $content = $request->input('content');
        
        // asigna los valores a las propiedades del objeto por meido de una instancia de la clase Comment   
           $comment = new Comment();
           $comment->user_id = $user->id;
           $comment->image_id = $image_id;
           $comment->content = $content;

        // guarda los datos en la base de datos
              $comment->save();

        // redirecciona a la vista detail.blade.php
                return redirect()->route('image.detail', ['id' => $image_id])
                ->with(['status' => 'Has publicado tu comentario correctamente']);


    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(string $id)
    {

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
     * Eliminar el comentario si soy dueño del la imagne o el dueño del comentario.
     */
    public function destroy($id)
    {
        // Recoger los datos del usuario logueado 
        $user = \Auth::user();

        // Recoger los datos del comenetario por el id
        $comment = Comment::find($id);



        // Comprobar si soy el dueño del comentario o de la imagen, por que son los unicos que pueden eliminar el comentario

        if($user &&($comment->user_id == $user->id || $comment->image->user_id == $user->id))
        {
            $comment->delete();

             // redirecciona a la vista detail.blade.php
             return redirect()->route('home', ['id' => $comment->image->user_id])
             ->with(['status' => 'comentario eliminado correctamente']);

            } else {
                return redirect()->back()->with('error', 'No está autorizado para eliminar este comentario.');
            }

        }

    }

