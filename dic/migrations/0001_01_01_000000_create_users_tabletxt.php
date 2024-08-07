<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * corre la migracion
     */
    
    public function up(): void
     
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('rol')->default('user;)');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();    
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        


        
    }




    /**
     * Revversa la migracion.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }

};

/*
                             DICCIOANRIO DE TERMINOS PARA LA PRACTICA DE MIGRACIONES


use = Se utiliza para importar una clase o un archivo
use Illuminate\Database\Migrations\Migration = Se utiliza para importar la clase Migration de Laravel
use Illuminate\Database\Schema\Blueprint = Se utiliza para importar la clase Blueprint de Laravel
use Illuminate\Support\Facades\Schema = Se utiliza para importar la clase Schema de Laravel
return = Se utiliza para devolver un valor
new = Se utiliza para crear una nueva instancia d euna clase
class = Se utiliza para indicar que se trabajara con una clase
extends = Indica que se hereda de una clase
Migration = Clase de Laravel que se utiliza para crear migraciones
return new class extends Migration = Se crea una nueva instancia de la clase Migration
public = Se utiliza para iondicar que el metodo sera publico se podra utilizar desde cual quier parte del proyecto
function = Se utiliza para definir una funcion
up(): = Se utiliza para definir el metodo up, el cual se encarga de crear las tablas que tenga lista la migracion en la DB
void = Se utiliza para indicar que el metodo no devolvera ningun valor
public function up(): void = Se define el metodo up y se indica que no devolvera ningun valor
schema = Es un propiedad de laravel que se utiliza para crear tablas en la base de dato, sn tener que utilizar SQL.
Schema::create = Se utiliza para indicar que se creara una tabla en la base de datos
'users' = Se utiliza para indocar el nombre que se le asiganra a la tabla, al momento d esu creacion.
Blueprint = Clase de Laravel que se utiliza para crear tablas en la base de datos, define si es string, integer, etc.
$table = Se utiliza para indicar que se trabajara con una tabla
Schema::create('users', function (Blueprint $table) = Es la forma correcta de crear una tabla en la base de datos


$table->id = Se utiliza para crear un campo de tipo id en la tabla
$table->string('rol')->default('user;)') = Se utiliza para crear un campo de tipo string en la tabla, con un valor por defecto
$table->string('first_name') = Se utiliza para crear un campo de tipo string en la tabla, en parentesis se indica el nombre el campo
$table->string('last_name') = Se utiliza para crear un campo de tipo string en la tabla, en parentesis se indica el nombre el campo
$table->string('username')->unique() = Se utiliza para crear un campo de tipo string en la tabla, en parentesis se indica el nombre el campo y se le indica que sera unico  
inique = Se utiliza para indicar que el campo sera unico
$table->string('email')->unique(); =  Se utiliza para crear un campo de tipo string en la tabla, en parentesis se le pasa el nomre del campo y se le indica que sera unico
$table->timestamp('email_verified_at')->nullable() = Se utiliza para crear un campo de tipo tiemestamp en la tabla, el cual pemite verificar si el correo electronico ha sido verificado o no y se le indica que el valor puede ser nulo
timestamp = Se utiliza para crear un campo de tipo timestamp en la tabla, el cual permite reastrear la fecha y hora de creacion de un registro
email_verified_at = Se utiliza para indicar que el campo de verificacion por correo electronico
nullable = Se utiliza para indicar que el campo de verificacion por correo electronico puede ser llenado con nulo automaticamente para evitar errores
$table->string('password') = Se utiliza para crear un campos de tipo string en la tabla, en parentesis se indica el nombre del campo.
$table->rememberToken() = Se utiliza para crear un campo de tipo rememberToken en la tabla, el cual perniete recordar la sesion del usuario automaticamente.
rememberToken = Se utiliza para recordar al session del usuario asi se cierre el navegador o la pagina web, el usuario no tendra que iniciar sesion nuevamente.
$table->timestamps() = Se utiliza para crear dos campos de tipo timestamp en la tabla, el cual permite rastrear la fecha y hora de creacion y actualizacion de un registro update_at y create_at. 


Schema::create('password_reset_tokens', function (Blueprint $table) = Se utiliza para crear una tabla en la base de datos, con el nombre de password_reset_tokens.
$table->string('email')->primary() = Se utiliza para crear un campo de tipo string en la tabla, en parentesis se indica el nombre del campo y se le indica que sera la clave primaria
primary = Se utiliza para indicar que el campo sera la clave primaria
$table->string('token'); = Se utiliza para crear un campo de tipo string en la tabla, en parentesis se indica el nombre del campo
$table->timestamp('created_at')->nullable(); = Se utiliza para crear un campo de tipo timestamp en la tabla, el cual permite rastrear la fecha y hora de creacion de un registro y se le indica que el valor puede ser nulo


Schema::create('sessions', function (Blueprint $table) = Se utiliza para crear una tabla en la base de datos, con el nombre de sessions.
$table->string('id')->primary(); = Se utiliza para crear un campo de tipo string en la tabla, en parentesis se indica el nombre del campo y se le indica que sera la clave primaria
$table->foreignId('user_id')->nullable()->index(); = Se utiliza para crear un campo de tipo foreignId en la tabla, en parentesis se indica el nombre del campo, se le indica que el valor puede ser nulo y se le indica que sera un indice
foreignId = Se utiliza para indcar que el campo sera una clave foranea.
$table->string('ip_address', 45)->nullable(); = Se utiliza para crear un campo de tipo string en la tabla, en parentesis se indica el nombre del campo, se le indica que el valor puede ser nulo y se le indica la longitud del campo
$table->text('user_agent')->nullable(); =  Se utiliza para crear campos de tipo text en la tabla, en parentesis se indica el nombre del campo y se le indica que el valor puede ser nulo
text = Se utiliza para indicar que se almacenaran texto largo enel campo
$table->longText('payload'); = Se utiliza para crear campos de tipo longText en la tabla, en parentesis se indica el nombre del campo
longText = Seutiliza para idicar que se almacenara  texto muy largo como para un blog
$table->integer('last_activity')->index(); = Se utiliza para crear un campo de tipo integer en la tabla, en parentesis se indica el nombre del campo y se le indica que sera un indice
Integer = Se utiliza para alamacenar munero enteros, como cantidades, edades, años, etc.

public function down(): void = Se define el metodo down y se indica que no devolvera ningun valor
down = Se utiliza como contra parte de metodo up, se encarga de eliminar las tablas que se crearon en el metodo up, esencial para revertir las migraciones
Schema::disableForeignKeyConstraints() = Se utiliza para deshabilitar las restricciones de las claves foraneas, asi permiete realizar las pruebas sin restricciones
Schema::dropIfExists('users') = Se utiliza para validar si la tabla que se pasa como parametros existe en la base de datos, si es asi la elimina es la forma como reversa la migracion.
Schema::enableForeignKeyConstraints() = Esta funcion se encarga de habilitar las restricciones de las claves foraneas, una vez que se han realizado las pruebas


NOTA: Este diccionario de terminos es una guia para entender el codigo de la migracion, no es necesario incluirlo en el codigo de la migracion
      en este ficcero tenemos dos esenarios el primero se encarga de  correr la migracion y el segundo de revertirla

*/
