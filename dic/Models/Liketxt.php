<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    //muchos a uno 
    public function images(){
        return $this->belongsTo(Image::class, 'image_id');

    }

    //muchos a uno 
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}


/*
            DICCIONARIO DE TERMINOS UTILIZADOS PARA ESTA PRACTICA EN EL MODELO LIKE

namespace App\Models = Se utiliza para indicar que se trabajara con los modelos de la carpeta Models y brindara un orden logico al codigo

use Illuminate\Database\Eloquent\Factories\HasFactory = Se utilizara la clase HasFactory para poder utilizar las funciones de la clase
use Illuminate\Database\Eloquent\Model  = Se utilizara la clase Model para poder utilizar las funciones de la clase

class Like extends Model = indica que se creara un clase llamada like la cual hereda de la clase Model para poder utilizar sus funciones

use HasFactory = Se utiliza un trait para poder utilizar las funciones de la clase HasFactory la cual se encarga de crear las fabricas de los modelos para las pruebas

protected $table = 'likes' = Indica que la tabla que se utilizara para esta clase el la tabla likes

//muchos a uno 
public function images()  = Indica que se crear un metodo llamado images el cual se encargara de la realacion de muchosa uno entre la tabla likes y la tabla iamges
return $this->belongsTo(Image::class, 'image_id') = Se encarga de establecer una realkacion de muchos a uno entre la tabla like y la tabla images, donde la tabla images tendra muchos likes, como se establecion el las  calves foraneas.


//muchos a uno 
public function user() = Indica  que s ecrear un metodos llamado el cual se encargara de la realacion de muchos auno entre las tablas likes y la tabla user
return $this->belongsTo(User::class, 'user_id') = Se encarga de establecer una realacion de muchos a uno, entre las tablas likes y la tabla users, donde la tabla users tendra muchos likes, como se establecion el las llaves foraneas.


NOTA: En este fichero nos esncargamos de crear la realacion que presenta las tablas users y la tabla likes donde se define sisconeciones en las llaves foraneas de las tablas.


*/
