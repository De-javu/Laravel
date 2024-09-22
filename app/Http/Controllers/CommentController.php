<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
          $image_id = $request->input('image_id');
          $content = $request->input('content');

          dd($image_id, $content);
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
     * Eliminar el recurso especificado del almacenamiento.
     */
    public function destroy(string $id)
    {
        //
    }
}
