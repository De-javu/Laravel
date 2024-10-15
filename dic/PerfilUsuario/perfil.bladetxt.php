<x-app-layout>
    <!-- Se crea una vista para mostrar las imágenes que ha subido el usuario. -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">   
                    
                
                    <!-- Se trae la imagne de perfil del usuario -->
                    <div>
                        @if ($user->image_path)
                            <div class="flex items center ">
                                <div class="avatar">
                                    <img src="{{ route('profile.avatar', ['filename' => $user->image_path]) }}" alt="Avatar"
                                        class="rounded-full h-80 w-40 object-cover mb-8 ml-12">
                                </div>
                        @endif


                        <!-- Se muestra la imagne relevante del perfil de usuario en la vista de perfil. -->
                        <div class="p-14 text-gray-900 dark:text-gray-100 flex justify-center items-center flex-col space-y-2 ml-48">
                        <div class=" mb-8">
                        {{ __("INFORMACION DE PERFIL ") }}
                        </div>
                        <h1>{{'@'.$user->nick}}</h1>
                        <h1>{{$user->name . ' ' . $user->surname}}</h1>
                        <h1>{{$user->email}}</h1>
                        <h1>{{'Telefono:' .' '.$user->phone}}</h1>
                        <h1>{{'Se unió: ' . \App\Helpers\FormatTime::LongTimeFilter($user->created_at)}}</h1>
                        <h1>{{'Última actualización: ' . \App\Helpers\FormatTime::LongTimeFilter($user->updated_at)}}</h1>
                        </div>
                     </div>

                     <hr>              

                        <!-- Se muestran las imágenes en tu perfil -->
                        <div>
                            @foreach ($user->images as $image)    
                            @include('components.image', compact('image'))
                            @endforeach
                        </div>
                    </di>

                </div>

            </div>
        </div>
</x-app-layout>

<!---------------------------------------------------------------------- DICIIONARIO DE TERMINOS  ------------------------------------------------------------------->
<!--
<x-app-layout> //? Se utiliza para extender la plantilla de la aplicacion
<div class="py-12"> //? Se crea un contenedor con un padding vertical de 12 en laparte superio e inferior
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> //? Se crea un contenedor con un ancho maximo de 7xl y un padding horizontal de 6 en dispositivos pequeños y 8 en dispositivos grandes
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> //? Se crea un contenedor con un fondo blanco y sombra
<div class="p-6 text-gray-900 dark:text-gray-100 "> //? Se crea un contenedor con un padding de 6 y un color de texto gris oscuro
                

<div> //? se crea un contenedor
@if ($user->image_path) //? Se creaun condicional que evalua si el usuario tiene una imagen de perfil
<div class="flex items center "> //? Se crea un contenedor flex con los elementos centrados
<div class="avatar"> //? Se crea un contenedor avatar
<img src="{{ route('profile.avatar', ['filename' => $user->image_path]) }}" alt="Avatar" //? Se crea una imagen con la ruta de la imagen de perfil del usuario
img src= //? Se crea una imagen con la plantilla de html
"{{ route('profile.avatar', ['filename' => $user->image_path]) }}" //? Se crea una ruta de la imagen de perfil del usuario, se pasa el array con el nombre de la imagen el usuario y la imagen.

class="rounded-full h-80 w-40 object-cover mb-8 ml-12"> //? Se le asigna una clase a la imagen para darle forma redondeada, un alto de 80 y un ancho de 40, se le da un margen inferior de 8 y un margen izquierdo de 12
</div>
@endif


<div class="p-14 text-gray-900 dark:text-gray-100 flex justify-center items-center flex-col space-y-2 ml-48"> //? Se crea un contenedor con un padding de 14, un color de texto gris oscuro, un contenedor flex con los elementos justificados al centro, centrados, en columna y con un espacio de 2 entre ellos, se le da un margen izquierdo de 48
<div class=" mb-8"> //? Se crea un contenedor con un margen inferior de 8
{{ __("INFORMACION DE PERFIL ") }} //?
</div> //? Se crea un contenedor
<h1>{{'@'.$user->nick}}</h1> //? Se crea un encabezado con el nombre de usuario
<h1>{{$user->name . ' ' . $user->surname}}</h1>-- //? Se crea un encabezado con el nombre y apellido del usuario
<h1>{{$user->email}}</h1>-- //? Se crea un encabezado con el correo del usuario
<h1>{{'Telefono:' .' '.$user->phone}}</h1>-- //? Se crea un encabezado con el telefono del usuario
<h1>{{'Se unió: ' . \App\Helpers\FormatTime::LongTimeFilter($user->created_at)}}</h1>-- //? Se crea un encabezado con la fecha de creacion del usuario
<h1>{{'Última actualización: ' . \App\Helpers\FormatTime::LongTimeFilter($user->updated_at)}}</h1>-- //? Se crea un encabezado con la fecha de la ultima actualizacion del usuario
</div>
</div>

<hr> //? Se crea una linea horizontal


<div>
@foreach ($user->images as $image)    //? Se crea un bucle que recorre las imagenes del usuario
@include('components.image', compact('image')) //? Se incluye el componente de imagen y se pasa la imagen como parametro
@endforeach //? Fin del bucle
</div>
</di>

</div>

</div>
</div>
</x-app-layout> --> //? Fin de la plantilla de la aplicacion.