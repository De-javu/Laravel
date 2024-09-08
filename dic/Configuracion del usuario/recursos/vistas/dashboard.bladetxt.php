<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('LARAVEL FOTOS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<!-- 
Diccionario de termins utilizados para  esta practica de Laravel

<x-app-layout> = Es un componente que se aloja en la ruta resources/views/layouts/app.blade.php el cual contiene la estructura de la pagina principal de la aplicacion
                 utilizando solo el comoponenete <x-app-layout> se puede tener una estructura de pagina principal de la aplicacion que se puede usar en todas las vistas de la aplicacion
<x-slot name="header"> = Es un marcador que se defiene en el comoponente <x-app-layout> el cual se utiliza para definir el titulo de la pagina principal de la aplicacion
<h2 = Es una etiqueta de titulo que se utiliza para definir un titulo tipo 2
class="font-semibold = Se utiliza para definir el tipo de fuente que se va a utilizar en el titulo, y lo utilizamos como una clase de css
text-xl = Indica que el tamaño del texto es extra grande
text-gray-800  = Indica que el color del texto es gris con un tono de 800
dark: = Indica que el color del texto es oscuro 
leading-tight = Se indica que el espacio entre lineas sera ajustado
{{ __('LARAVEL FOTOS') }} = ERs una directiva de bleade para mostar texto, es un equivalente a echo en php, pero este traduce el idioma del texto.
</x-slot> = Se utiliza para cerrar el marcador <x-slot name="header">

/***************************************************************************************************************************************** */
<div = Se utiliza como contenedor de la pagina principal de la aplicacion
class = Indica que se va a utilizar una clase de css
class="py-12"> = Se utiliza para definir un espacio en la parte superior de la pagina
class="max-w-7xl = Indica que se va a utilizar un ancho maximo de 7xl 
mx-auto = indica que el contenido se va a centrar
sm:px-6 = indica que se va a utilizar un padding de 6 en la parte izquierda y derecha
lg:px-8"> = indica que se va a utilizar un padding de 8 en la parte izquierda y derecha
class="bg-white = Indica que el color de fondo es blanco
dark:bg-gray-800 = Indica que el color de fondo es gris oscuro
overflow-hidden = Indica que el contenido que se desborde se ocultara
shadow-sm = Indica que se va a utilizar una sombra pequeña
sm:rounded-lg"> = Indica que se va a utilizar una esquina redondeada de tamaño grande
class="p-6 = Indica que se va a utilizar un padding de 6 en todas las direcciones
text-gray-900 = Indica que el color del texto es gris con un tono de 900
dark:text-gray-100"> = Indica que el color del texto es gris oscuro con un tono de 100
{{ __("You're logged in!") }} = Es una directiva de blade para mostrar texto, es un equivalente a echo en php, pero este traduce el idioma del texto.
</x-app-layout> = Se utiliza para cerrar el contenedor de la pagina principal de la aplicacion.

NOTA: Este fichero se utiliza para mostrar el dashboard de la aplicacion, en el se muestra un mensaje que indica que el usuario ha iniciado sesion correctamente

-->