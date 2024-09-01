<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use  HasFactory ;
    protected $table = 'images';

    // Realacion uno a muchos
    public function comments(){
        return $this->hasMany(Comment::class);

    }

    // Relacion uno a muchos
    public function likes(){
        return $this->hasMany(like::class);
    }

    // Relacion de muchos a uno

    public function user(){
        return $this->belongsTo(User::class, 'user_id');

    }

}

/* 
                DICIONARIO DE TERMINOS UTILIZADOS PARA ESTA PRACTICA EN EL MODELO

namespace App\Models = se utiliza para indicar que se trabajara con los modelos de la carpeta Models y brindara un orden logico al codigo

use Illuminate\Database\Eloquent\Factories\HasFactory = Se utilizara la clase HasFactory para poder utilizar las funciones de la clase
use Illuminate\Database\Eloquent\Model = Se utilizara la clase Model para poder utilizar las funciones de la clase

class Image extends Model = Se crear la clase Image la cual se encarga de herdar de la calse Model para poder utilizara sus funciones
use  HasFactory  Se utilizara el trait para crear los modelos de las fabricas de las pruebas
protected $table = 'images' = Indica que la tabla que se utilizara para esta clase es la tabla images, tendra conexion con el modelo de la tabla images



public function comments() = indica que se crear un metodo llmado comments el cual se encarga de relacionar la tabla images con la tabla comments
return $this->hasMany(Comment::class) = Se encarga de establecer una realacion de uno a muchos entre la tabla images la cual tendra muchos comentarios, como se definio en las claves foraneas.


Relacion uno a muchos
public function likes() = Indica que se crera un metodo llamado like el cual se encarga de realacionar la tabla images con la tabla likes.
return $this->hasMany(like::class) = Se encarga de establecer una realacion de uno amuchos entre la tabla images y la cual tendra muchos likes, como se definio en las claves foraneas.


Relacion de muchos a uno

public function user() =  Indica que  se utilizara un metodo llamado user el cual se encarga de relacionar la tabla images con la tabla users.
return $this->belongsTo(User::class, 'user_id') = Se encarga de establecer una relacion de muchos a uno , entre la tabla images y la tabla users, donde muchas imagenes tendran un unico usuario, como se definio en las claves foraneas.


NOTA: En este fichero se crean la logica de los modelos los cuales por medio del ORM interactuan directamnete con las tablas  de las bases de datos, en este punto se define la conexion 
      que se llega a tener enter los modelos de las tablas images, comments, likes y users, por medio de las claves foraneas que se definieron en las migraciones de las tablas.

*/