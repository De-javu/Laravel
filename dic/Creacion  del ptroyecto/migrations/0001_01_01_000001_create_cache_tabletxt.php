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
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};

/*
       DICCIONARIOS DE TERNIMOS PARA ESTA PARACTICA

use = Indica que se va a usar una clase o un metodo
use Illuminate\Database\Migrations\Migration = Indica que se utilizara la clase Migration de Laravel
use Illuminate\Database\Schema\Blueprint = Indica que se utilizara la clase Blueprint de Laravel
use Illuminate\Support\Facades\Schema = Indica que se utilizara la clase Schema de Laravel

return new class extends Migration = Indica que se creara una nueva clase que hereda de la clase Migration 
public function up(): void = Indica que se creara un metodo publico llamado up que no devolvera ningun valor y se utilizara para crea las tablas en las migraciones
Schema::create('cache', function (Blueprint $table) = Se crea la tabla cache, en la base de datos
(Blueprint $table) = Permiete asignar las columnas a  la tabla permiete integrar diferentes tipos de datos a la tabla (integer, text, string, etc)en vez de utilizar SQL
$table->string('key')->primary(); Se encarga de crear una columna llamada key, que sera la clave primaria de la tabla
$table->mediumText('value'); = Se encarga de crear una columna llamada value, que sera de tipo mediumText
$table->integer('expiration'); Se encraga de crear una columna llamada expiration, que sera de tipo integer

Schema::create('cache_locks', function (Blueprint $table) = Se crea la tabla cahe_loks, en la base de datos
$table->string('key')->primary() = Se encarga de crear una columna llamada key, que sera la clave primaria de la tabla
$table->string('owner') = Se encarga de crear una columna llamada owner, que sera de tipo string
$table->integer('expiration') = Se encarga de crear una columna llamada expiration, que sera de tipo integer

public function down(): void = Indica que se creara un metodo publico llamado down que no devolvera ningun valor y se utilizara para eliminar las tablas en las migraciones creadaas
Schema::dropIfExists('cache') = indica que se eliminara la columna cache de la base de datos, la cual se pasa por párametrp
Schema::dropIfExists('cache_locks') = indica que se eliminara la columna cache_locks de la base de datos, la cual se pasa por párametrp

NOTA: Este fichero se encarga de crear una clase la cual controlar la creacion de las tablas cache y cache_locks en la base de datos, y de eliminarlas en caso de que se requiera con sus respectivas columnas
      dond el metodo up crea las tablas y el metodo down las elimina o revisrte esos cambios en la base de datos.
*/