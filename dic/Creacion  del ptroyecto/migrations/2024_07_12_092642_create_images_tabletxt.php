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
         Schema::create('images', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('image_path');
                $table->text('description')->nullable();
                $table->timestamps();
            
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
public function down()
{
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('images');
    Schema::enableForeignKeyConstraints();
}
    
};
/*
                  DICCIONARIO DE TERMINOS UTILIZADOS PARA ESTA CLASE
use =  Se utiliza para indicar que se imortatr auna clase
use Illuminate\Database\Migrations\Migration = Se utiliza para importar la clase Migration de Laravel
use Illuminate\Database\Schema\Blueprint = Se utiliza para importar la clase Blueprint de Laravel
use Illuminate\Support\Facades\Schema = Se utiliza para importar la clase Schema de Laravel

return new class extends Migration = Se utiliza para indicar una nueva clase que heerda la clase Migration

public function up(): void = Se utiliza para indicar que se creara un nuevo metodo up
Schema::create('images', function (Blueprint $table) = Se utiliza para crear una tabla llamada images, ccon las respectivas colunas que se almacenaran en la base de datos$table->id();
$table->unsignedBigInteger('user_id') = Se usa para indicar que se crera un columna que  almacenara datos muy grandes con valor positivo, se utuliza para las claves forareneas y se le asigna el nombre por prametro,  
unsignedBigInteger = Se utiliza para indicr que se trabajaran valores positivo de gran tamaño.
$table->string('image_path') = Se utiliza para indicr que se creara una columna tipo string y se pasara el nombre por prametro
$table->text('description')->nullable() = Se utiliza par crear columnas tipo text, se pasa el nombre por parametro, e indica que puede ser nulo el llenado de este campo
$table->timestamps(); Se utiliza para crear las columnas que permiten el rastreo de las fecha y hora por medio de las columnas update_at y create_at

$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade') =
Indica que se crea una columna de clave foreane la cual se pasa por parametro('user_id') y hace optiene del (id) de la tabla (users),tendra un valor en cascada que elimanara, los datos que apunten a la tabla user automaticamente para evitar datos huerfanos.

public function down() = Se utiliza para indicar que se creara un nuevo metodo down
down = Se uutiliza como contra prte del metodo up, contine la logica para revertir las migraciones
Schema::disableForeignKeyConstraints() = Se en carga de desabilitar las restricciones de clave foranea, permitiendo que se eliminen las tablas sin problemas para realizar pruebas
Schema::dropIfExists('images') = Se utiliza para validar si la tabla que se pasa por parametro existe en la base de datos, de ser asi se encraga de eliminarla, esta es la forma como se encarga de realizar las migraciones.
Schema::enableForeignKeyConstraints() = Se encarga de habilitar las restricciones de las claves forareneas, permitiendo que la base de datos funione correctamente 
 
NOTA: Este archivo se encarga de crear la tabla images en la base de datos para ello utiliza: 
     1) La creacion de una clase la cual se encarga de heredar de la clase migration para utilizara la logica de los modelos de laravel
     2) Se crea un metodo up eñ cual se encarga de realizar la migracion d elas columna que utulizara la tabla images
     3) Se crea un metodo down el cual se encarga de revertir la migracion de las columnas de la tabla images     
     4) Es este fichero utilizamos las clves foraneas lo cual no se ha hecho en las demas tablas hsta el momento
     */