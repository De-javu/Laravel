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
use App\Models\User;

class ProfileController extends Controller
{

    //*Se crea el ,metodo index, el cual nos pernite listar los datos del usuario y realizara una busqueda.
    public function index($search = null)
    {
        if(!empty($search)) {
            $users = User::where('nick', 'LIKE', '%' . $search . '%')
                        ->orwhere('name', 'LIKE', '%' . $search . '%')
                        ->orwhere('surname', 'LIKE', '%' . $search . '%')
                        ->orwhere('id', 'desc')
                        ->paginate(5);
        } else {
            $users = User::orderBy('id', 'desc')->paginate(5);
        }
        return view('profile.index', compact('users'));
    }

  
}
