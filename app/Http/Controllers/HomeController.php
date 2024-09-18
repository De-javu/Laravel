<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Controllers\ImageController;
use App\Models\Image;
use App\Models\User;
use APP\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller

{
    //Se enacarga de traer todas las imagenes de los usuarios en la base de datos y mostrarlas en la vista home
     
    public function index()
    {
        $images = Image::orderBy('id', 'desc')->paginate(5);     
        return view('home', ['images' => $images]);        
    } 
     
    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
        
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
