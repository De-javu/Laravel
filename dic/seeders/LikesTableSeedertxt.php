<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Like;
use Illuminate\Broadcasting\Broadcasters\AblyBroadcaster;


class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $like = new Like();
        $like->user_id = 1;
        $like->image_id = 4;
        $like->save();

        $like = new Like();
        $like->user_id = 2;
        $like->image_id = 4;
        $like->save();

        $like = new Like();
        $like->user_id = 3;
        $like->image_id = 1;
        $like->save();
    }
}

/*
        DICCIONARIO DE TERMINOS UTILIZADOS PARA ESTA PRACTICA

namespace = Se utiliza para indicar que se trabajara con un espacio de nombres el cual le dara orden al codigo.
namespace Database\Seeders = SE utiliza para indicar que se utilizara unorden de carpetasel cual le brindra uno orden logico al codigo
use = Se utiliza para indicar que s etrabajkara con calses externas 
use Illuminate\Database\Console\Seeds\WithoutModelEvents = Indica que se trabajara con la calse WithoutModelEvents
use Illuminate\Database\Seeder = indica que se trabajara con la calse Seeder
use App\Models\Like = = indica que s etrabajkara con la clase Leke
use Illuminate\Broadcasting\Broadcasters\AblyBroadcaster = Indica que se trabajara con la clase AblyBroadcaster


class LikesTableSeeder extends Seeder = Indica que se creara una clase llamada LikesTableSeeder la cual hereda de la calse Seeder
public function run(): void =  Indica que se crear un metodo el cual se llamara run y no retorna nada 

$like = new Like() = indica que se creara una instancia de la clase like, la cual la convirte en un objeto para madejar los datos de insercioa  ala base de datos
$like->user_id = 1; = Indica que la columna userd_id de la tabla like, almacenara el valor de 1
$like->image_id = 4; = Indica que la columna Iamge_id d ela tabla like, almacenara el valor de 4
$like->save(); = Indica que se utilizara el metod save el cual s eencarga de grabara los datos en la db

NOTA: Se crea este fivehro el cual se encargha de crear los datos de prueba enb la base de datos para los likes,
      unicamnete havcemos la docuemnatacion para uno , pero es lo mismo para los demas datos 


*/