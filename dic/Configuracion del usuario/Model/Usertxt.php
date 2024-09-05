<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rol',
        'name',
        'surname',
        'nick',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relacion uno a muchos
    public function images(){
        return $this->hasMany(Image::class);
    }
}

/*
El modelo, se encarga de interactuar con la base de datos de una forma secilla y rapida, lo realiza por medio de los ORM, que 
es una forma rapída de interactuar con la base de datos, en este caso se esta utilizando Eloquent, que es el ORM de Laravel.
Semanejan
Modelos: Son las clases que se encargan de interactuar con la base de datos, se puede decir que son las tablas de la base de datos.
Propiedades: Son variables que se encargan de definir el manejo que se le brindara a los datos que van a interactuar con la base de datos,
para que se pueda realizar de una forma segura.
Atributos: Son  las columnas de la tabla en la base de datos que contiene la infomacion de los datos que se van a interactuar.

Diccionario de terminos pára esta practica:
namespace =  Es una forma de organizar el codigo, se puede decir que es una carpeta que contiene las clases, funciones, metodos, etc.
namespace App\Models; = Se esta creando una carpeta llamada Models, que contiene las clases que se van a utilizar en el proyecto.
use =  Es una forma de importar las clases que se van a utilizar en el proyecto.
use Illuminate\Contracts\Auth\MustVerifyEmail; =  Se esta importando la clase MustVerifyEmail, que se encarga de verificar el correo electronico.
use Illuminate\Database\Eloquent\Factories\HasFactory; =  Se esta importando la clase HasFactory, que se encarga de crear las fabricas de los modelos.
use Illuminate\Foundation\Auth\User as Authenticatable; =  Se esta importando la clase Authenticatable, que se encarga de autenticar al usuario.
use Illuminate\Notifications\Notifiable; = Se esta importando la clase Notifiable, que se encarga de notificar al usuario.

********************************************************************************************************************************************************/

// Se crea la clase User, que hereda de la clase Authenticatable, e implementala clase MustVerifyEmail,
 //class User extends Authenticatable implements MustVerifyEmail
//{
   // use HasFactory, Notifiable; // Se importan las clases HasFactory y Notifiable.

//  Se crea la propiedad fillable, que es un array que contiene los atributos que se van a interactuar con la base de datos.
   // protected $fillable = [ 
       // 'rol',
        //'name',
        //'surname',
        //'nick',
        //'email',
        //'password',
    //];

   //}

/*
Diccionario de terminos para esta practica:
Autencticable = Se encarga de exporta la clase Authenticable, que se encarga de autenticar al usuario.
implements = Se utiliza para implementar una interfaz.
MustVerifyEmail = Se encarga de exportar la clase MustVerifyEmail, que se encarga de verificar el correo electronico.
protected = Se encarga de definir que tipo de protecion tendra la variable o metodo.
$fillable  = Es una propiedad que se encarga de contener los atributos que se van a interactuar con la base de datos.
['']; = Es un array que contiene los atributos que se van a interactuar con la base de datos.

*********************************************************************************************************************************************************/
/*
Es una propiedad que se encarga de ocultar los atributos que se van a interactuar con la base de datos al momento que se envian.

protected $hidden = [
    'password',
    'remember_token',
];

Diccionario de terminos para esta practica:
protected = Se encarga de definir que tipo de protecion que tendra la variable o pripiedad, en este caso solo se accedera desde la clase  User.
$hildden = Es la variable o propiedad que se maneja desde laravel que se  encarga de ocultar los atributos o propiedades que se alojaran en  la base de datos. 
['password', remember_token'] = Son las propiedades que se pasaran de manera oculta tipo json. a la base de datos.

************************************************************************************************************************************************************/

/*
Se crea un metodo casts() el cual se encarga de casterar, que es un termino en el programacion para indicarque los atributos que estan dentro de array se van 
actulizar y se modificaran en la base d edatos,para validad su autenticidad y seguridad.
protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

Diccionario de terminos para esta practica:

protected = se encaraga de definir el tipo de proteccion que tendra el metodo
function = Se encarga de indicar que se utilizara un metodo un funcion.
casts() = Es el nombre del metodo que se va a utilizar.
array = Es un tipo de dato que almacena varios valores los cuales seran utilizados en el metodo.
return = Se encarga de retornar un valor.
'email_verified_at' = Es el nombre del atributo (Columna) que se va a utilizar.
'datetime' = Es el tipo de dato que se va a utilizar manuejando las fecha y hora.
'password' = Es el nombre del atributo (Columna) que se va a utilizar.
'hashed' = Es el tipo de dato que se va a utilizar para  encriptar la clave de forma segura.

*******************************************************************************************************************************************************************/

/*
Se crea el metodo images(), el cual se encarga de relacionar la tabla User con la tabla imagenes, por medio de la relacion uno a muchos.
public function images(){
    return $this->hasMany(Image::class);
}

Diccionario de terminos para esta practica:
public = indica que el metodo sera de tipo publico y se podra acceder desde cualquier parte del proyecto.
function = Se encarga de indicar que se utilizara un metodo o funcion.
images() = Este es el nombre que se utilizara para el metodo que se va a crear
return = indica qye retornara algun valor.
$this = Se utiliza para acceder a las propiedades y metodos de la misma clase.
-> = Se utiliza para acceder a los metodos y propiedades de una clas, es un apuntador.
hasMany = Es un metodo que se encarga de indicar que se va a realizar una relacion uno a muchos.
Image::class = Indica que la clase Image se va a relacionar con la clase User, donde un usario tendra muchas imagenes
*/
