<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $user = new User();
    $user->rol = 'user';
    $user->name = 'Thomas';
    $user->surname = 'Moreno';
    $user->nick = 'tunjito';
    $user->email = "thomas@moreno.com";
    $user->email_verified_at = now();
    $user->password = Hash::make('password');
    $user->save(); 

    $user = new User();
    $user->rol = 'user';
    $user->name = 'Yordy';
    $user->surname = 'Moreno';
    $user->nick = 'ñoño';
    $user->email = "yordy@moreno.com";
    $user->email_verified_at = now();
    $user->password = Hash::make('password');
    $user->save(); 

    $user = new User();
    $user->rol = 'user';
    $user->name = 'Martha';
    $user->surname = 'Moreno';
    $user->nick = 'Marthin';
    $user->email = "martha@moreno.com";
    $user->email_verified_at = now();
    $user->password = Hash::make('password');
    $user->save();

    $user = new User();
    $user->rol = 'user';
    $user->name = 'Manuel';
    $user->surname = 'Pardo';
    $user->nick= 'Marciano';
    $user->email = "manuel@pardo.com";
    $user->email_verified_at = now();
    $user->password = Hash::make('password');
    $user->save();

}

    
}

