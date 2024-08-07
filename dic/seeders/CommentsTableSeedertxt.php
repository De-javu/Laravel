<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Comment;
use Illunianete\Support\Facades\Hash;


class CommentsTableSeeder extends Seeder
{

    public function run(): void
    {
        $comment = new Comment();
        $comment->user_id = 1;
        $comment->image_id = 4;
        $comment->content = 'Buena foto en familia';
        $comment->save();

        $comment = new Comment();
        $comment->user_id = 2;
        $comment->image_id = 1;
        $comment->content = 'Buena foto en familia';
        $comment->save();

        $comment = new Comment();
        $comment->user_id = 2;
        $comment->image_id = 4;
        $comment->content = 'Buena foto en familia';
        $comment->save();


    }
}

/*
                     DICCIONARIO DE TERMINOS UTILIZADOS PARA ESTA PRACTICA

namespace = Es una forma de encapsular elementos, como clases, interfaces, funciones y constantes, para evitar conflictos de nombres y permitir la reutilización del código.
namespace Database\Seeder = Es la forma que se utiliza para agrupar un espacio de nombres para brindar orden al codigo

use Illuminate\Database\Console\Seeds\WithoutModelEvents = Se utiliza para indicar que se utilizara la clase WithoutModelEvents
use Illuminate\Database\Seeder = Se utiliza para indicar que se utilizara la clase Seeder
use Illuminate\Support\Facades\DB = Se utiliza para indicar que se utilizara la clase DB
use Illuminate\Support\Str = Se utiliza para indicar que se utilizara la clase Str
use App\Models\Comment = Se utiliza para indicar que se utilizara la clase Comment
use Illunianete\Support\Facades\Hash = Se utiliza para indicar que se utilizara la clase Hash


class CommentsTableSeeder extends Seeder = Indica que se crea una clase llamada CommentsTableSeeder la cual hereda de la clase Seeder
public function run(): void = Indica que se crera un metodo llamado run el cual no retorna ningun valor
$comment = new Comment() = Se utiliza para crear una instancia de la clase Comment.
$comment->user_id = 1 = indica que en la columna user_id de la tabla comment se almacenara el valor 1
$comment->image_id = 4 = indica que  se almacenara el valor 45 en la columna image:id de la tabla comment
$comment->content = 'Buena foto en familia'= indica que se almacenara el valor 'Buena foto en familia' en la columna content de la tabla comment
$comment->save() = se utiliza para indicar que se guarde el registro en la base de datos en la tabla comment.

Nota: Para este fichero Seeder se utilizo la tabla Comments, El cual contiene los campos que se encargaran de almacenar la 
      informacion que se pasa por medio de las instancias de la clase Comment.
      Para este eejemplo se crean 3 comenratios en la tabla comment, de loc cuales solo docuenbtaos uno por que los otros son isguales
      unicamnete cambia el valor de los campos que se almacena en la columnas pero es esquema es el mismo.
*/
