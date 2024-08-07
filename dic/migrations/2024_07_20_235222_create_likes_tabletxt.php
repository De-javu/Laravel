<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('image_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            //
        });
    }
};



/*
      DICCIONARIO DE TERMINOS UTILIZADOS PARA ESTA PRACTICA
use = Se utiliza para indicar que se realizara el llmado de otras clases externas a este fichero
use Illuminate\Database\Migrations\Migration = Se utiliza para importatra la clase MIgration
use Illuminate\Database\Schema\Blueprint = Se utiliza para indicar que se importara la clase Blueprint
use Illuminate\Support\Facades\Schema; = Se utiliza para  indicar que se importara la clase schema

return new class extends Migration = Indica que se crea una nueva clase que hereda de la clase Migration.
public function up(): void = Indica que se utilizara un metodo up, el encargado de crear las tablas para las migraciones

Schema::create('likes', function (Blueprint $table) = Indica que se crera una tabla (likes) a en la bse de datos y se pasa por parametro Blueprint para admitir diferentes formatos de columnas
$table->id() = indica que se creara una columna tipo id en la db.
$table->unsignedBigInteger('user_id') = Indica ques crera una columna numerica de valor positivo, de gran tamaño, le pasamos el nombre por parametro. 
$table->unsignedBigInteger('image_id') = Indica uqe se crera una columna numerica de valor positivo, de gran tamaño , le pasamos el nombre por parametro.
$table->timestamps() = Se utiliza para crera una estampa de timpo, creando dos columnas que capturan la fecha y la hora, (update_at), (create_at).

$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
Se crea una columna forarnea la cual pasamos por parametro (user_id) y hace referencia (id) de la tabla(users), con el metodo en cascada de eliminacion, por si selimina el id principal.

$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
Se crea una columna forarnea la cual pasamos por parametro (user_id) y hace referencia (id) de la tabla(users), con el metodo en cascada de eliminacion, por si selimina el id principal.

public function down(): void = Se crea el metodo down, el cual permite reveretir eliminar y revertir las migraciones.

Schema::table('likes', function (Blueprint $table) = Se crea la tabla likes con la funcion que se pasa por parametro (Blueprint), la cual permiete crear las columnas con diferentes valores.

NOTA: 1)Este fichero se encarga de crear el sistema para realizar las migraciones, de la tabla likes a la db
      2)Se crea una clase la cual permite heredar las plantillas de laravel de la clase migration
      3)Se crea el metodo up, el cual s encarga de crear las migraciones 
      4)Se cea el metodo down, el cual se encarga de  revertir o eliminar las migraciones segun su contenido.
      
      */