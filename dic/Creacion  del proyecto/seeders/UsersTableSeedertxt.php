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
    $user->first_name = 'Thomas';
    $user->last_name = 'Moreno';
    $user->username = 'tunjito';
    $user->email = "thomas@moreno.com";
    $user->email_verified_at = now();
    $user->password = Hash::make('password');
    $user->save(); 

    $user = new User();
    $user->rol = 'user';
    $user->first_name = 'Yordy';
    $user->last_name = 'Moreno';
    $user->username = 'ñoño';
    $user->email = "yordy@moreno.com";
    $user->email_verified_at = now();
    $user->password = Hash::make('password');
    $user->save(); 

    $user = new User();
    $user->rol = 'user';
    $user->first_name = 'Martha';
    $user->last_name = 'Moreno';
    $user->username = 'Marthin';
    $user->email = "martha@moreno.com";
    $user->email_verified_at = now();
    $user->password = Hash::make('password');
    $user->save();

    $user = new User();
    $user->rol = 'user';
    $user->first_name = 'Manuel';
    $user->last_name = 'Pardo';
    $user->username = 'Marciano';
    $user->email = "manuel@pardo.com";
    $user->email_verified_at = now();
    $user->password = Hash::make('password');
    $user->save();

}

    
}

/*
        DICCIONARIO DE TERMINOS UTILIZADOS PARA ESTA PRACTICA 

namespace = Se utiliza para indicar que se le dara un prden al codigo por medio d ecarpetas
namespace Database\Seeders = Se utiliza para indicar que se utilizara unorden de carpetasel cual le brindra uno orden logico al codigo

use = Se utiliza para realizar el llamado a las  clases que se utilizaran en el fichero 
use Illuminate\Database\Console\Seeds\WithoutModelEvents = Indica que se llamara a la clase WithoutModelEvents
use Illuminate\Database\Seeder =  Indica que se utilizara la clase Seeder
use Illuminate\Support\Facades\DB = Indica que utilizara la clase DB 
use Illuminate\Support\Facades\Hash; = Indica que se utilizara la calse Hash
use App\Models\User = Indica que se utilizara la clase User

class UsersTableSeeder extends Seeder = Se utiliza para crear una clase llamada UsersTableSeeder la cual hereda de la calse Seeder

public function run() = Indica que se creara un metood llamado run el cual no retorna nada

$user = new User(); = Se utiliza para realizar una instancia de la clase User, la cualpermiteria trabajar como objetos 
$user->rol = 'user'; = Indica que en la columna rol de la tabla users se almacenara, quien se loguea
$user->first_name = 'Thomas'; = indica que la columna  firts_name de la tabla users, se almacenara el datos thomas
$user->last_name = 'Moreno'; = Indica que en la columna last_name de la tabla users, se almacenara el datos Moreno
$user->username = 'tunjito'; = Indica que en la columna username de la tabla users, se lamacenara el datos tunjito
$user->email = "thomas@moreno.com" = Indica que ern la columna email de la tabla users, se almacenara el dato del correo electronico
$user->email_verified_at = now() = Indica que en la columna email_verified_at de la tabla user, se almacenara el correo como verifiocadoy se asigna la fecha y hora actual.
$user->password = Hash::make('password'); = Indica que en la columna password de la tabla users, se almacenara la contraseña encriptada
$user->save() =  indica que se utilizara el metodo save el cual se encarga de grabar los datos en la base de datos.

NOTA: Se crea este fichero el cual se encarga de crear los datos de prueba en la base de datos para los usuarios,
      unicamente hacemos la documentacion para uno, pero es lo mismo para los demas datos

*/

