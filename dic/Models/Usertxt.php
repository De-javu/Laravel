<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
            DICCIONARIO DE TERMINOS UTILIZADOS PARA ESTA PRACTICA EN EL MODELO USER

namespace App\Models = se utiliza para indicar que se trabajara con los modelos de la carpeta Models y brindara un orden logico al codigo

use Illuminate\Contracts\Auth\MustVerifyEmail = Se utilizar la clase MustVerifyEmail para poder verificar el el correo electronico.
use Illuminate\Database\Eloquent\Factories\HasFactory = Se utilizara la clase HasFactory para poder utilizar las funciones de la clase
use Illuminate\Foundation\Auth\User as Authenticatable = Se utilizara la clase User para poder autenticar al usuario
use Illuminate\Notifications\Notifiable = Se utilizara la clase Notifiable para poder enviar notificaciones al usuario

class User extends Authenticatable = Se crea la clase User la cual hereda de la clase Authenticatable para poder autenticar al usuario

use HasFactory, Notifiable = Se crea un triat para poder utilizar las funciones de las clases HasFactory y Notifiable

@var array<int, string> = Se utiliza un arramienta de de cocumentacion avanzada la cual permiete identifcar el tipo de array que se esta utilizando

protected = Se encarga de de declara una variable de tipo privada lacula se podra solo acceder desde la misma calse o desde otra que la herede
$fillable = Se utuliza para declarar las variables que podran ser create y update en la base de datos, defininindo el array y controlando la asignacion masiva. 
protected $fillable = [ = Se declara una variable protegida la cual se encarga de definir las variables que podran ser create y update en la base de datos
'name',
'email',
'password',
];


protected $hidden = [ =  Se encarga deocultar las variables encibles que tendran la base de datos por medio d ela propiedad hildden
'password',
'remember_token',
];


protected function casts(): array = Indica que se creara un metodo casts el cual se encargara de castear las variables que se utilizaran en la base de datos para controar la maxima seguridad
{
return [ =  Se utiliza para retornar un valor
'email_verified_at' => 'datetime' = Se encargara de castear la variable email_verified_at  al cual se le asigna un alinea de timpo datetime, que permiete controlar la fecha y hora
'password' => 'hashed' = Se encarga de caster la variable passwoord al cual se le asigna una linea de tiempo hashed, que permiete controlar la encriptacion de la contraseña
];
}
];

Relacion uno a muchos
public function images() ♠1 Se crea un metodo llamado images el cual se encargara de relacionar las tablas uders con la tabla de iamges
return $this->hasMany(Image::class) = Se encarga dde establecer una relacion de uno a muchos entre la tabla users e images, donde un uusrio tendra muchas imagenes, segun configurado en la claves foraneas


NOTA: En este fivhero nos encargamos de crear la logica de los modelos los cuales por medio del ORM interactuan directamnete con las tablas de las bases de datos, en este punto se define la conexion entre las tablas usrario e imagenes
      para definir su relacion, tambien se toman medidads de seguridda para los datos sencibles de los usuarios, como la contraseña y el token de recordar contraseña.

*/
