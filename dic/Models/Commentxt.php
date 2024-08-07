<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    public function images(){
        return $this->belongsTo(Image::class, 'image_id');

    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

/*
           DICCIOBARIO DE TERMINOS UTILIZADOS PARA ESTA PARCTICA EN EL MODELO

namespace App\Models =  se utiliza para indicar que se trabajara con los modelos de la carpeta Models y brindara unorden logico al codigo

use Illuminate\Database\Eloquent\Factories\HasFactory = Se utilizara la clase HasFactory para poder utilizar las funciones de la clase
use Illuminate\Database\Eloquent\Model; = Se utilizara la clase Model para poder utilizar las funciones de la clase

class Comment extends Model = Se crea la clase Comment la cual hereda de la calse Modelo para poder utilizar sus funciones

use HasFactory = Se utiliza un trait para poder utilizar las funciones de la clase HasFactory la cual se encarga de crear las fabricas de los modelos para las pruebas
HasFactory =  permiete utiulizara el metodo factory para crear nuevas instancias de los modelos

protected $table = 'comments' = Indica que la tabla que se utilizara para esta clase es la tabla comments
protected = Se utiliza para decalara privaciada un avariable la cual solo puede se accedidad desde la misma clase o clases que la heredan 

public function images() = Indica que se crea una funcion llamada images la cual se encarga de relacionar la tabla comments con la tabla images
return $this->belongsTo(Image::class, 'image_id') = Se encarga de  establecer una realacion entre la tabla comments y la tabla images
return = Se utiliza para retornar un valor
$this = Se utiliza para hacer referencia a la misma clase
belongsTo(Image::class, 'image_id') = Indica que la tabla comments pertenece a la tabla images y se relaciona por medio de la llave foranea image_id

public function user() = Indica que se crea una funcion llamada user la cual se encarga de relacionar la tabla comments con la tabla users
return $this->belongsTo(User::class, 'user_id') = Se encarga de  establecer una realacion entre la tabla comments y la tabla users
belongsTo(User::class, 'user_id') = Indica que la tabla comments pertenece a la tabla users y se relaciona por medio de la llave foranea user_id. 

NOTA: En este fichero de modelos nos encargamos de crear la sociacio que tiene las tablas comments con las tablas imagen y users, para poderenlazara las calves foraneas entre tablas.



*/
