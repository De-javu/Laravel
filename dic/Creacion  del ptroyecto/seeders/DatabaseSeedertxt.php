<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UsersTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(LikesTableSeeder::class);  
      
    }

}

/*
    DICCIONARIO DE TERMINOS UTILIZADOS PARA ESTA PRACTICA

namespace = Es una forma de encapsular elementos, como clases, interfaces, funciones y constantes, para evitar conflictos de nombres y permitir la reutilización del código.
namespace Database\Seeders = Es la forma como se agrupan los archivos para brindarle un orden al codigo.

use = Se se utiliza para indicar que se utilizara o importara un calse en espesifico 
use App\Models\User; = Se utiliza para indicar que se utilizara la clase User
use Illuminate\Database\Seeder = Se utiliza para indicar que se utilizara la clase Seeder
class DatabaseSeeder extends Seeder = Indica que se crera una clase DatabaseSeeeder que hereda de la clase Seeder.
public function run(): void = Indica que se crera una funcion run la cual no retorna ningun valor.
User::factory(10)->create() = Se utiliza coo pafbrica de modelos para crear 10 regisros en la tabla user 
User:: = Indica que se utilizara un metodo estatico de la clase User.
factory = Es un metodo que se utiliza para indicar que se crera uan fabrica de modelos.
Create = Es un metodo que se utiliza para indicar que se creara un registro en la base de datos.
$this = Se utiliza para indicar que se utilizara un metodo de la misma clase.
call = Es un metodo que se utiliza dentro de los Seddeer para llamar a otro Seeder, y asi controlar la siembra de datos, repoblando otras tablas de la base de datos.
$this->call(UsersTableSeeder::class) = Se utiliza para llamar al Seeder UsersTableSeeder.
$this->call(ImagesTableSeeder::class) = Se utiliza para llamar al Seeder ImagesTableSeeder.
$this->call(CommentsTableSeeder::class) = Se utiliza para llamar al Seeder CommentsTableSeeder.
$this->call(LikesTableSeeder::class) = Se utiliza para llamar al Seeder LikesTableSeeder.

NOTA: Este archivo se encarga de llamara a ls Sedder de lñas tablas que vamos a poblar en la base de datos.
      esto permietira dar mas orden a la hora de poblar la base de datos.
      Si la tabla no es ubicada eb al llamado de los Sedder esta no se pobla en la base de datos.

*/
