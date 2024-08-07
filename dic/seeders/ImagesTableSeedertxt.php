<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use Illuminate\Support\Facades\Hash;


class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $image = new Image();
        $image->user_id = 1;
        $image->image_path = 'test.jpg';
        $image->description = 'Imagen de prueba';
        $image-> save();
    
        $image = new Image();
        $image->user_id = 1;
        $image->image_path = 'playa.jpg';
        $image->description = 'Imagen de paseo';
        $image-> save();

    
        $image = new Image();
        $image->user_id = 1;
        $image->image_path = 'caroo.jpg';
        $image->description = 'Imagen de carro';
        $image-> save();

        $image = new Image();
        $image->user_id = 3;
        $image->image_path = 'familia.jpg';
        $image->description = 'Imagen de todos';
        $image-> save();

    }
}

/*
           DICIONARIO DE TERMINOS UTILIZADOS PARA ESTA PRACTICA

namespace = Es una forma de encapsular elementos, como clases, interfaces, funciones y constantes, para evitar conflictos de nombres y permitir la reutilización del código.
namespace Database\Seedere = Se utiliza para btrindarle orden a la configuracion de carpetas del progrema
use = Se utiliza para indicar que se utilizaran clases externas del fichero
use Illuminate\Database\Console\Seeds\WithoutModelEvents = Indica que se trabjara con la claseWithoutModelEvents
use Illuminate\Database\Seeder = Indica que se trabajara con la clase Seeder
use Illuminate\Support\Facades\DB = IOndica que se trabajara con la clase DB
use App\Models\Image = Indica que se trabajara con la clase image
use Illuminate\Support\Facades\Hash = Indica que se trabajara con la clase Hash

class ImagesTableSeeder extends Seeder = Indica wue se creara una calse llammada ImagesTableSeeder la cual hereda de la clase Seeder
public function run(): void = Indica que s ecreara un metodo publico llamado run el cual no retorna nada

$image = new Image() = Indica que se creara un isntancia de la clase Image para utilizar como objeto
$image->user_id = 1; = Indica que la columna user_id de la tabla image tendra el valor de 1
$image->image_path = 'test.jpg'; = indica que la columna image_path de la tabla image, tendra una imagen jpg alojada
$image->description = 'Imagen de prueba = indica que la columna desciption de la tabla imagen, tendra una parrafor de descricion en la base d edatos 
$image-> save(); = Se utiliza el metod save, para almacenar los datos de las columnas de la base de datos.

NOTA: Este fichero se encarga de poblar con datos de muestras la coulmnas d ela tbala image, para la paractica se ealizaran 4 registros 
      pero solo documentamos uno ya que los demas son repetitivos.
 


*/
