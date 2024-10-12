<x-app-layout>
    <!-- Se crea una vista para mostrar las imágenes que ha subido el usuario. -->
    < class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <h1 class="text-4xl  uppercase text-center">
                    {{ __("favorite images") }}
                    </h1>
                 
                    <!-- se crea una vista para mostrar las imágenes que ha dado like el usuario. -->
                    @foreach ($likes as $like)
                        @include('components.image', ['image' => $like->images])
                    @endforeach


                </div>
            </div>
        </div>



        <!-- Paginacion  -->
        <div class="mt-4">
            {{ $likes->links() }}
        </div>

        < </div>
</x-app-layout>

<!-------------------------------------------DICCIONARIO DE TERMINS UTLIZADOS PARA ESTA PRACTICA----------------------------------------->
 <!--
x-app-layout> //? Es un componente de blade que se encarga de renderizar la plantilla principal de la aplicacion
< class="py-12"> //? Se crea una clase para darle un espaciado en la parte superior e inferior de la pagina
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> //? Se crea un contenedor con un ancho maximo de 7xl y un espaciado en los laterales de 6 y 8
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> //? Se crea un contenedor con un color de fondo blanco y una sombra
<div class="p-6 text-gray-900 dark:text-gray-100 "> //? Se crea un contenedor con un espaciado de 6 y un color de texto gris oscuro
<h1 class="text-4xl  uppercase text-center"> //? Se crea un titulo con un tamaño de 4xl y centrado
{{ __("favorite images") }} //? Se imprime un texto que se encuentra en el archivo de traduccion
</h1> //? Se cierra el titulo
                                 
@foreach ($likes as $like) //? Se crea el bucle para recorrer la variable likes que contiene las imagenes que ha dado like el usuario
@include('components.image', ['image' => $like->images]) //? Se incluye el componente image que se encarga de mostrar la imagen y se le pasa la imagen que ha dado like el usuario
@include('components.image', //? Se incluye el componente image
['image' => $like->images]) //? Se le pasa la imagen que ha dado like el usuario
@endforeach //? Se cierra el bucle

<div class="mt-4"> //? Se crea un contenedor con un espaciado en la parte superior de 4
{{ $likes->links() }} //? Se imprime la paginacion de las imagenes que ha dado like el usuario
 $likes //? Se imprime la paginacion de las imagenes que ha dado like el usuario
->links() //? Se encarga de llamar el metodo de ORM para mostrar la paginacion
 
</x-app-layout> //? Se cierra el componente de blade que se encarga de renderizar la plantilla principal de la aplicacion
-->