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

            // Devolver respuesta en formato json
            return response()->json([
                'like' => $like
            ]);

            
        } else {
            return response()->json([
                'message' => 'El like ya existe'
            ]);
                }


    }

    public function dislike()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
