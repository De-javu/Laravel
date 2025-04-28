<x-app-layout>


    <!-- Se crea boton  para realizar busqueda de usuarios. -->
    <form method="GET" action="{{route('profile.index')}}" id="buscador" class="max-w-md mx-auto mt-12">
        @csrf
        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscardor de Usuarios..." required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">BUSCAR</button>
        </div>
    </form>

    <!-- Se crea una vista para mostrar las imágenes que ha subido el usuario. -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <!-- Se muestran las imágenes que has subido -->
                    <div>
                        @foreach ($users as $user)
                        <div>
                            @if ($user->image_path)
                            <div class="flex items center ">
                                <div class="avatar">
                                    <img src="{{ route('profile.avatar', ['filename' => $user->image_path]) }}"
                                        alt="Avatar" class="rounded-full h-80 w-40 object-cover mb-8 ml-12">
                                </div>
                                @endif

                                <!-- Se muestra la imagen relevante del perfil de usuario en la vista de perfil. -->
                                <div
                                    class="p-14 text-gray-900 dark:text-gray-100 flex justify-center items-center flex-col space-y-2 ml-48">
                                    <div class=" mb-2">
                                        {{ __("INFORMACION DE PERFIL ") }}
                                    </div>
                                    <div class="">
                                        <x-nav-link :href="@route('settings.perfil', ['id' => $user->id])">
                                            <x-secondary-button>{{ __('Ver Perfil') }}</x-secondary-button>
                                        </x-nav-link>
                                    </div>
                                    <h1>{{'@'.$user->nick}}</h1>
                                    <h1>{{$user->name . ' ' . $user->surname}}</h1>
                                    <h1>{{$user->email}}</h1>
                                    <h1>{{'Telefono:' .' '.$user->phone}}</h1>
                                    <h1>{{'Se unió: ' . \App\Helpers\FormatTime::LongTimeFilter($user->created_at)}}
                                    </h1>
                                    <h1>{{'Última actualización: ' .
                                        \App\Helpers\FormatTime::LongTimeFilter($user->updated_at)}}</h1>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
            <!-- Paginacion  -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
</x-app-layout>

<!--------------------------------------------------- DICCIONARIO DE TERMINOS UTILIZADOS PARA ESTA PRACTICA  ----------------------------------------------->

<!-- Se crea boton  para realizar busqueda de usuarios. -->
<!--
<form //? Se crea el formulario para realizar la busqueda de usuarios.
method="GET"  //? Se utiliza el metodo get para el envio de la informacion del formulario
action="{{route('profile.index')}}"  //? Se utiliza la ruta profile.index para enviar la informacion del formulario como accion.
id="buscador"  //? Se asigna un id al formulario para poder identificarlo.
class="max-w-md mx-auto mt-12">  //? Se asignan clases al formulario para darle estilos.
@csrf //? Se utiliza el token csrf para proteger el formulario.
<label for="search"  //? Se crea una etiqueta para el input de busqueda.
class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label> //? Se asignan clases a la etiqueta para darle estilos.
<div class="relative"> //? Se crea un div con la clase relative para darle estilos.
<div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"> //? Se crea un div con la clase absolute para darle estilos.
<svg class="w-4 h-4 text-gray-500 dark:text-gray-400"  //? Se crea un svg con clases para darle estilos.
aria-hidden="true"  //? Se asigna un atributo aria-hidden al svg.
xmlns="http://www.w3.org/2000/svg" //? Se asigna un atributo xmlns al svg.
fill="none" //? Se asigna un atributo fill al svg.
viewBox="0 0 20 20"> //? Se asigna un atributo viewBox al svg.
<path stroke="currentColor" //? Se asigna un atributo stroke al svg.
stroke-linecap="round"  //? Se asigna un atributo stroke-linecap al svg.
stroke-linejoin="round" //? Se asigna un atributo stroke-linejoin al svg.
stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/> //? Se asignan atributos al path del svg.
</svg> //? Se cierra el svg.
</div>//? Se cierra el div.
<input type="text"  //? Se crea un input de tipo texto.
id="search" //? Se asigna un id al input.
class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscardor de Usuarios..." required />
<button type="submit" //? Se crea un boton de tipo submit.
class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">BUSCAR</button>
</div> //? Se cierra el div.
</form> -->