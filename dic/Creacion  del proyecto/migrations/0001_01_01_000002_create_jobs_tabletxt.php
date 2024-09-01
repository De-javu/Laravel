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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};

/*
   DICCIONARIOS DE TERNIMOS PARA ESTA PARACTICA
use = Se utiliza para indicar que se trabajara con una clase o metodo en especial
use Illuminate\Database\Migrations\Migration; = Se utiliza ára indicar que se trabajara con la clase Migration de la libreria Illuminate\Database\Migrations
use Illuminate\Database\Schema\Blueprint; = se utiliza para ndicar que se trabajara con la clase Blueprint de la libreria Illuminate\Database\Schema
use Illuminate\Support\Facades\Schema; = se utiliza para indicar que se trabajara con la clase Schema de la libreria Illuminate\Support\Facades

return new class extends Migration = Se utiliza para indicar que se crera una clase la cual hereda de la calse Migration

public function up(): void = Se utiliza para indicar que se creara em metodo up el cual no retorna nada.
Schema::create('jobs', function (Blueprint $table) = Se utiliza para crear una tabla llamada jobs, lacual recibira un parametro con las columnas que tendra la tabla
$table->id() = Se utiliza para crear una columna llamada id la cual sera de tipo entero y autoincrementable
$table->string('queue')->index() = Se utiliza para crear una columna llamada queua la  cual sera de tipo string y tendra un index
$table->longText('payload') = Se utiliza para crear una columna que se pasara comom parametro llamada payload la cual sera de tipo longText
longText = Se utiliza para agregar grandes contendidos de texto
$table->unsignedTinyInteger('attempts') = se utiliza ára indicar que se creara una columna llamada attempts la cual sera de tipo unsignedTinyInteger
unsignedTinyInteger = Se utiliza para indicar que almacenara un entero sin signo de 0 a 255, es para datos pequeños.
$table->unsignedInteger('reserved_at')->nullable() = Se utiliza para indicar que se creara una columna llamada reserved_at la cual sera de tipo unsignedInteger y podra ser nula
$table->unsignedInteger('available_at');} = Se utiliza para indicar que se creara una columna llamada available_at la cual sera de tipo unsignedInteger
$table->unsignedInteger('created_at') = Se utiliza para indicar que se creara una columna llamada created_at la cual sera de tipo unsignedInteger
unsignedInteger = Se utiliza para almacenar un entero positivo y es especilmente utilizado para caundo se trata de clves foraneas

Schema::create('job_batches', function (Blueprint $table) = Se utiliza para crear una tabla llamada job_batches, la cual recibira un parametro con las columnas que tendra esta tabla 
$table->string('id')->primary() = se utiliza para indicar que se crera un a columna de tipo strig, que se encragara de recibir un parametro ken este caso id y sera la clave primaria
$table->string('name') = Se utiliza para indicar que se creara una columna llamada name la cual sera de tipo string
$table->integer('total_jobs') = Se utiliza para indicar que se creara una columna llamada total_jobs la cual sera de tipo entero
integer = Se utiliza para almacenar un entero el cual pueden ser edad, años, cantidad de productos, etc.
$table->integer('pending_jobs') = Se utiliza para indicar que se creara una columna llamada pending_jobs la cual sera de tipo entero
$table->integer('failed_jobs') = Se utiliza para indicar que se creara una columna llamada failed_jobs la cual sera de tipo entero
$table->longText('failed_job_ids') = Se utiliza para indicar que se creara una columna llamada failed_job_ids la cual sera de tipo longText
$table->mediumText('options')->nullable() = Se utiliza para indicar que se creara una columna llamada options la cual sera de tipo mediumText y podra ser nula
$table->integer('cancelled_at')->nullable() = Se utiliza para indicar que se creara una columna llamada cancelled_at la cual sera de tipo entero y podra ser nula
$table->integer('created_at') = Se utiliza para indicar que se creara una columna llamada created_at la cual sera de tipo entero
$table->integer('finished_at')->nullable(); = Se utiliza para indicar que se creara una columna llamada finished_at la cual sera de tipo entero y podra ser nula
        

Schema::create('failed_jobs', function (Blueprint $table) = Se utiliza para crear una tabla llamada failed_jobs, la cual recibira un parametro con las columnas que tendra esta tabla
$table->id(); = Se utiliza para crear una columna llamada id la cual sera de tipo entero y autoincrementable
$table->string('uuid')->unique() = Se utiliza para crear una columna llamada uuid la cual sera de tipo string y sera unica
$table->text('connection') = Se utiliza para crear una columna llamada connection la cual sera de tipo text
$table->text('queue') = Se utiliza para crear una columna llamada queue la cual sera de tipo text
$table->longText('payload') = Se utiliza para crear una columna llamada payload la cual sera de tipo longText
$table->longText('exception') = Se utiliza para crear una columna llamada exception la cual sera de tipo longText
$table->timestamp('failed_at')->useCurrent() = Se utiliza para crear una columna llamada failed_at la cual sera de tipo timestamp y se le asignara la fecha actual
timestamp = Se utiliza para almacenar la fecha y hora en la que se realizo una accion o registro
useCurrent = Se utiliza para asignar la fecha y hora actual a la columna    

public function down(): void = Se utiliza para indicar que se creara un metodo down el cual no retornara nada
Schema::dropIfExists('jobs'); = Se utiliza para validara si la columna jobs existe si es asi la elimina, esta es la forma correcta de revertir una migracion 
Schema::dropIfExists('job_batches') = Se utiliza para validar si la columna job_batches existe si es asi la elimina
Schema::dropIfExists('failed_jobs') = Se utiliza para validar si la columna failed_jobs existe si es asi la elimina
dropIfExists = Se utiliza para eliminar una tabla de la base de datos

NOTA: Este fichero contiene las migraciones de las tablas jobs, job_batches y failed_jobs, las cuales se crearan en la base de datos, estas tablas se crearan con las columnas que indican en el fichero
      1) Se crea una clase la cual se encarga de heredar de la clase Migration, para poder crera la plantilla de la migracion
      2) Se crea un metodo llamado up el cual se encarga de crear las tablas jobs, job_batches y failed_jobs con las columnas que se indican en el fichero por medio del metodo Schema::create
      3) Se crea un metodo llamado dow el cual se encarga de eliminar o revertir con el metodo shecma que permitira eliminar y revertir las migraciones de las tablas jobs, job_batches y failed_jobs

      */
