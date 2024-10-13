<?php

namespace App\Http\Controllers;

use APP\Models\User;

    use Illuminate\Http\Request;

class SettingsController extends Controller
{
    
    public function perfil($id)
    {
        $user = User::find($id);
        return view('settings.perfil', compact('user'));

    }
}

 




