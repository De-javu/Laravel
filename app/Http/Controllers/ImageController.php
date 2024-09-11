<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function create(){
        return view('image.create');
    }
}
