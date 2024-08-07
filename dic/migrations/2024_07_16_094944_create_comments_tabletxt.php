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
            Schema::create('comments', function (Blueprint $table) {
      
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('image_id');
                $table->text('content')->nullable();
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
        Schema::dropIfExists('comments');
    
            //
        }
    };


    /*
                    DICCIONARIO DE TERMINOS UTILIZADOS PARA ESTA CLASE
use = Se utiliza para indicar que se realizara el llamado de otras calses     
use Illuminate\Database\Migrations\Migration = Indica que se trabajara con las calse de Migration
use Illuminate\Database\Schema\Blueprint = Indica que se trabajar co la clase de Blueprint
use Illuminate\Support\Facades\Schema; = Indica que se trabajara con la de schema

return new class extends Migration = Indica que va a heredar de la calse Migrtion que ya contine una logica estructurada.

public function up(): void = Se crea un metetodo llamado up el cauyl no devuleve nada

Schema::create('comments', function (Blueprint $table) = Se utiliza el metodo schema, que se encarga de crera una tabla en la 
base de datos y se pasa por parametro  Blueprint que permite identificar los valores que se utilizan en las columnas
      
$table->id() = Se utiliza para inicar que se creara un columna de tipo id en la tabla
$table->unsignedBigInteger('user_id') = Se utiliza para crear una columna con un dato positivo grande para las llaves foraneas, se le asigan el nombre por parametro
$table->unsignedBigInteger('image_id') Se utiliza para crear una columna con un dato positivo grande para las llaves foraneas, se le asigan el nombre por parametro
$table->text('content')->nullable() = Se utiiza para crear una columna de tipo texto, se asigna el nombre por parametro, su llenado puede ser nulo
$table->timestamps() = Se encarga decrea dos columnas (utdate_at)y (create_at) con una estampa de tiempo, para control de los registros 

$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
Se crea una columna con una llave foranea, se pasa por parametro el nombre(user_id), e indica que hace referencia al (id) de la tabla (users), utiliza un metodo en cascada de eliminacion automatica
$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');

public function down(): void = indica que se creara un metodo llamado down
Schema::dropIfExists('comments'); Se encarga de verificar si la tablaque se pasa por parametro existe, para poderla eliminar, de esta forma se revierte la migraciones  
*/