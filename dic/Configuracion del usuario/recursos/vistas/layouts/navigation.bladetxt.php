<!-- 1)nav -->
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- 2)Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- 3)Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- 4)Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Larafoto a que estoy ') }}
                    </x-nav-link>
                </div>
            </div>



            <!-- 5)Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Inicio ') }}
                    </x-nav-link>
                </div>


                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">

                            <!-- avatar en la barra del menu  -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    @include('components.avatar', ['user' => Auth::user()])
                                </x-nav-link>

                            </div>

                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-configuracion :href="route('settings.edit')">
                            {{ __('settings') }}
                        </x-dropdown-configuracion>




                        <!-- 6)Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>






                <!-- 7)Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- 8)Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Larafoto') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Inicio') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Subir Fotos') }}
                </x-responsive-nav-link>
            </div>

            <!-- 9)Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- 10)Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>



                </div>
            </div>
        </div>
</nav>


<!--
1)ETIQUETA NAV
//?Iniciamos con la etiueta nav, que es un elemento de HTML que representa una sección de una página cuyo propósito es proporcionar
//?enlaces de navegación, ya sea dentro del documento actual o a otros documentos.

Diccionario de terminos:
<nav =//? Se encarga de definir un conjunto de enlaces de navegación es un alemento de html.
x-data =//? se encarga de definir una variable en javascript, Alpine.js es un framework de javascript que nos permite manipular el DOM de una forma muy sencilla.
Dom =//? Document Object Model, es una interfaz de programación de aplicaciones (API) para documentos HTML y XML.
"{ open: false }" =//? se encarga de definir una variable en javascript, en este caso se llama open y su valor es false, es para controlar el estado de cierre y apertura del menú.
class="bg-white =//? Indica que se utilizara un fondo blanco en el elemento por medio de esta clase de css.
dark:bg-gray-800 =//? Indica que se utilizara un fondo gris oscuro en el elemento por medio de esta clase de css.
border-b =//? Indica que se aplicara un borde en la parte inferior.
border-gray-100 =//? Se encarga de definir el bode de color gris claro.
dark:border-gray-700"> =//? Se encarga de definir el borde de color gris oscuro.

/***********************************************************************************************************************************************************/

**********************************Primary Navigation Menu - Menú de navegación principal****************************************************
2)Menu de navegacion//?Este es el menú de navegación principal, en el se encuentran los enlaces de navegación que se mostrarán en la barra de navegación.
Diccionario de terminos:

<div =//? Se encarga de definir un contenedor de elementos en HTML.
class="max-w-7xl =//? Se encarga de definir el ancho máximo del contenedor.
mx-auto =//? Se encarga de centrar el contenedor en el eje horizontal.
px-4 =//? Se encarga de definir el padding en el eje horizontal.
sm:px-6 =//? Se encarga de definir el padding en el eje horizontal en pantallas pequeñas.
lg:px-8"> =//? Se encarga de definir el padding en el eje horizontal en pantallas grandes.
<div class="flex justify-between h-16"> =//? Se encarga de definir un contenedor de elementos en HTML y de alinear los elementos en el eje horizontal.
<div class="flex"> =//? Se encarga de definir un contenedor de elementos en HTML y de alinear los elementos en el eje horizontal.
           
/*****************************************************LOGO************************************************ */
3)//?Este es el logo de la aplicación, se muestra en la barra de navegación.
<div =//? Se encarga de definir un contenedor de elementos en HTML.
class="shrink-0 =//? Se encarga de definir el tamaño del contenedor.
flex =//? Se encarga de alinear los elementos en el eje horizontal.
items-center"> =//? Se encarga de alinear los elementos en el eje vertical.
<a href= =//? Se encarga de definir un enlace en HTML.
"{{ route('dashboard') }}"> =//? Se encarga de definir la ruta a la que se redirigirá el enlace.
<x-application-logo =//? Es el componente que se encarga de cargar el ligo d ela aplicacion en la barra de navegación.
class="block=//? Se encarga de definir el tamaño del contenedor.
h-9 =//? Se encarga de definir la altura del contenedor.
w-auto =//? Se encarga de definir el ancho del contenedor.
fill-current =//? Se encarga de rellenar el contenedor con el color actual.
text-gray-800 =//? Se encarga de definir el color del texto en gris.
dark:text-gray-200" =//? Se encarga de definir el color del texto en gris oscuro.
</div> =//? Se encarga de cerrar el contenedor de elementos en HTML.
/***************************************** Navigations Links -links de navegacion ******************************************/
4)Navigation Links =//? Estos son los enlaces de navegación que se mostrarán en la barra de navegación.
<div =//? Se encarga de definir un contenedor de elementos en HTML.
class="hidden =//? Se encarga de ocultar el contenedor.
space-x-8 =//? Se encarga de definir el espacio entre los elementos en el eje horizontal.
sm:-my-px =//? Se encarga de definir el espacio entre los elementos en el eje vertical en pantallas pequeñas.
sm:ms-10 =//? Se encarga de definir el espacio entre los elementos en el eje horizontal en pantallas pequeñas.
sm:flex"> =//? Se encarga de alinear los elementos en el eje horizontal en pantallas pequeñas.
<x-nav-link =//? Es el componente que se encarga de cargar los enlaces de navegación en la barra de navegación.
:href="route('dashboard')" =//? Indica la ruta a la que se redirigirá el enlace.
:active="request()->routeIs('dashboard')"> =//? SE encarga de evaluar si la ruta esta activa y mostrara el elmnace activo.
{{ __('Larafoto a que estoy ') }} =//? Se encarga de mostrar el texto del enlace.
</x-nav-link> =//? Se encarga de cerrar el componente de enlace de navegación.
</div> =//? Se encarga de cerrar el contenedor de elementos en HTML. 

/**************************************Settings Dropdown - Desplegable de configuraciones ****************************************
5)Settings Dropdown =//? Este es el menú desplegable de configuraciones, en el se encuentran las opciones de configuración del usuario.
<div //? Se encarga de definir un contenedor de elementos en HTML.
class="hidden //? Se encarga de ocultar el contenedor.
sm:flex //? Se encarga de alinear los elementos en el eje horizontal en pantallas pequeñas.
sm:items-center //? Se encarga de alinear los elementos en el eje vertical en pantallas pequeñas.
sm:ms-6"> //? Se encarga de definir el espacio entre los elementos en el eje horizontal en pantallas pequeñas.
<div class="hidden //? Se encarga de ocultar el contenedor.
space-x-8 //? Se encarga de definir el espacio entre los elementos en el eje horizontal.
sm:-my-px //? Se encarga de definir el espacio entre los elementos en el eje vertical en pantallas pequeñas.
sm:ms-10 sm:flex"> //? Se encarga de alinear los elementos en el eje horizontal en pantallas pequeñas.
<x-nav-link //? Es el componente que se encarga de cargar los enlaces de navegación en la barra de navegación.
:href="route('dashboard')" :active="request()->routeIs('dashboard')"> //? Indica la ruta a la que se redirigirá el enlace y si la ruta esta activa.
{{ __('Inicio ') }} //? Se encarga de mostrar el texto del enlace.
</x-nav-link> //? Se encarga de cerrar el componente de enlace de navegación.
</div>//?   Se encarga de cerrar el contenedor de elementos en HTML.

<x-dropdown //? Se encarga de cargar el menú desplegable de configuraciones.
align="right" //? Se encarga de alinear el menú desplegable a la derecha.
width="48"> //? Se encarga de definir el ancho del menú desplegable.
<x-slot name="trigger"> //? Se encarga de definir el gatillo del menú desplegable.
<button //? Se encarga de definir un botón en HTML.
class="inline-flex //? Se encarga de alinear los elementos en el eje horizontal.
items-center //? Se encarga de alinear los elementos en el eje vertical.
px-3 //? Se encarga de definir el padding en el eje horizontal.
py-2 //? Se encarga de definir el padding en el eje vertical.
border //? Se encarga de definir un borde.
border-transparent //? Se encarga de definir el borde transparente.
text-sm //? Se encarga de definir el tamaño del texto.
leading-4 //? Se encarga de definir el espacio entre las líneas del texto.
font-medium //? Se encarga de definir el grosor del texto.
rounded-md //? Se encarga de definir las esquinas redondeadas del contenedor.
text-gray-500 //? Se encarga de definir el color del texto en gris.
dark:text-gray-400 //? Se encarga de definir el color del texto en gris oscuro.
bg-white dark:bg-gray-800  //? Se encarga de definir el color de fondo del contenedor.
hover:text-gray-700 //? Se encarga de definir el color del texto al pasar el cursor sobre el contenedor.
dark:hover:text-gray-300 //? Se encarga de definir el color del texto al pasar el cursor sobre el contenedor en modo oscuro.
focus:outline-none //? Se encarga de quitar el borde al contenedor al hacer clic sobre el.
transition //? Se encarga de definir una transición.
ease-in-out //? Se encarga de definir el efecto de la transición.
duration-150"> //? Se encarga de definir la duración de la transición.

avatar en la barra del menu //? Se encarga de mostrar el avatar del usuario en la barra de navegación.
<div class="hidden //? Se encarga de ocultar el contenedor.
space-x-8 //? Se encarga de definir el espacio entre los elementos en el eje horizontal.
sm:-my-px //? Se encarga de definir el espacio entre los elementos en el eje vertical en pantallas pequeñas.
sm:ms-10 //? Se encarga de definir el espacio entre los elementos en el eje horizontal en pantallas pequeñas.
sm:flex"> //? Se encarga de alinear los elementos en el eje horizontal en pantallas pequeñas.
<x-nav-link //? Es el componente bleade que se encarga de cargar los enlaces de navegación en la barra de navegación.
:href="route('dashboard')" :active="request()->routeIs('dashboard')"> //? Indica la ruta a la que se redirigirá el enlace y si la ruta esta activa.
@include('components.avatar', ['user' => Auth::user()]) //? Se encarga de incluir el componente avatar en la barra de navegación, y valida si el usuario esta autenticado.
</x-nav-link> //? Se encarga de cerrar el componente de enlace de navegación.
</div> //?

<div>{{ Auth::user()->name }}</div> //? Se encarga de mostrar el nombre del usuario loguedo.
<div class="ms-1"> //?  Se encarga de definir el margen en el eje horizontal.
<svg class="fill-current //? Se encarga de rellenar el contenedor con el color actual.
h-4 //? Se encarga de definir la altura del contenedor.
w-4" //? Se encarga de definir el ancho del contenedor.
xmlns="http://www.w3.org/2000/svg" //? Se encarga de definir el espacio de nombres del documento.
viewBox="0 0 20 20"> //? Se encarga de definir el tamaño de la vista.
<path fill-rule="evenodd" //? Se encarga de definir la regla de relleno.
d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" //? Se encarga de definir la forma del contenedor.
clip-rule="evenodd" /> //? Se encarga de definir la regla de recorte.
</svg> //? Se encarga de cerrar el contenedor de elementos en HTML.
</div>//? Se encarga de cerrar el contenedor de elementos en HTML.
</button> //? Se encarga de cerrar el botón en HTML.
</x-slot> //? Se encarga de cerrar el gatillo del menú desplegable.
<x-slot name="content"> //? Se encarga de definir el contenido del menú desplegable.
<x-dropdown-link //? Es el componente que se encarga de cargar los enlaces de navegación en el menú desplegable.
:href="route('profile.edit')"> //? Indica la ruta a la que se redirigirá el enlace.
{{ __('Profile') }} //? Se encarga de mostrar el texto del enlace.
</x-dropdown-link> //? Se encarga de cerrar el componente de enlace de navegación.
<x-dropdown-configuracion //? Es el componente que se encarga de cargar los enlaces de configuración en el menú desplegable.
:href="route('settings.edit')"> //? Indica la ruta a la que se redirigirá el enlace.
{{ __('settings') }} //? Se encarga de mostrar el texto del enlace.
</x-dropdown-configuracion> //? Se encarga de cerrar el componente de enlace de configuración.

****************************************************Authentication - Autenticación****************************************************
6)Authentication //? Se encarga de definir el formulario de autenticación.
<form method="POST" action="{{ route('logout') }}"> //? Se encarga de definir el método de envío del formulario y la ruta a la que se redirigirá.
@csrf //? Se encarga de proteger el formulario contra ataques CSRF.
<x-dropdown-link //? Es el componente que se encarga de cargar los enlaces de navegación en el menú desplegable.
:href="route('logout')" //? Se encarga de definir la ruta a la que se redirigirá el enlace.
onclick= //? Se encarga de ejecutar una función al hacer clic sobre el enlace.
"event.preventDefault(); //? Se encarga de prevenir el evento por defecto.
this.closest('form').submit();"> //? Se encarga de enviar el formulario más cercano.
{{ __('Log Out') }} //? Se encarga de mostrar el texto del enlace.
</x-dropdown-link> //? Se encarga de cerrar el componente de enlace de navegación.
</form> //? Se encarga de cerrar el formulario de autenticación.

/****************************************************Hamburger - Hamburguesa****************************************************

7)Hamburger //? Este es el botón de hamburguesa, se muestra en la barra de navegación en pantallas pequeñas.
<div //? Se encarga de definir un contenedor de elementos en HTML.
class="-me-2 //? Se encarga de definir el margen en el eje horizontal.
flex //? Se encarga de alinear los elementos en el eje horizontal.
items-center //? Se encarga de alinear los elementos en el eje vertical.
sm:hidden"> //? Se encarga de ocultar el contenedor en pantallas pequeñas.
<button //? Se encarga de definir un botón en HTML.
@click="open = ! open" //? Se encarga de cambiar el estado de la variable open al hacer clic sobre el botón.
class="inline-flex  //? Se encarga de alinear los elementos en el eje horizontal.
items-center //? Se encarga de alinear los elementos en el eje vertical. 
justify-center //? Se encarga de alinear los elementos en el centro.
p-2 //? Se encarga de definir el padding en el eje vertical.
rounded-md //? Se encarga de definir las esquinas redondeadas del contenedor.
text-gray-400 //? Se encarga de definir el color del texto en gris.
dark:text-gray-500 //? Se encarga de definir el color del texto en gris oscuro.
hover:text-gray-500 //? Se encarga de definir el color del texto al pasar el cursor sobre el contenedor.
dark:hover:text-gray-400  //? Se encarga de definir el color del texto al pasar el cursor sobre el contenedor en modo oscuro. 
hover:bg-gray-100 //? Se encarga de definir el color de fondo al pasar el cursor sobre el contenedor.
dark:hover:bg-gray-900 //?
focus:outline-none //? Se encarga de quitar el borde al contenedor al hacer clic sobre el. 
focus:bg-gray-100 //? Se encarga de definir el color de fondo al hacer clic sobre el contenedor.
dark:focus:bg-gray-900 //? Se encarga de definir el color de fondo al hacer clic sobre el contenedor en modo oscuro.
focus:text-gray-500 //? Se encarga de definir el color del texto al hacer clic sobre el contenedor.
dark:focus:text-gray-400 //? Se encarga de definir el color del texto al hacer clic sobre el contenedor en modo oscuro.
transition //? Se encarga de definir una transición.
duration-150  //? Se encarga de definir el tiempo de duración de la transición.
ease-in-out"> //? Se encarga de definir el efecto de la transición.
<svg //? Se encarga de definir un icono en SVG.
class="h-6 w-6" //? Se encarga de definir la altura y el ancho del icono.
stroke="currentColor" //? Se encarga de definir el color del trazo.
fill="none" //? Se encarga de definir el relleno del icono.
viewBox="0 0 24 24"> //? Se encarga de definir el tamaño de la vista.
<path :class="{'hidden': open, 'inline-flex': ! open }"  //? Se encarga de mostrar u ocultar el icono de la hamburguesa.
class="inline-flex" //? Se encarga de alinear los elementos en el eje horizontal.
stroke-linecap="round" //? Se encarga de definir el estilo de la línea del trazo.
stroke-linejoin="round" //? Se encarga de definir el estilo de la línea del trazo.
stroke-width="2" //? Se encarga de definir el ancho de la línea del trazo.
d="M4 //? Se encarga de definir la forma del icono.
6h16M4 //? Se encarga de definir la forma del icono.
12h16M4 //? Se encarga de definir la forma del icono.
18h16" /> //? Se encarga de definir la forma del icono.
<path :class="{'hidden': ! open, 'inline-flex': open }" //? Se encarga de mostrar u ocultar el icono de la hamburguesa. 
class="hidden" //? Se encarga de ocultar el icono.
stroke-linecap="round" stroke-linejoin="round" stroke-width="2" //? Se encarga de definir el estilo de la línea del trazo.
d="M6 18L18 6M6 6l12 12" /> //? Se encarga de definir la forma del icono.
</svg> //? Se encarga de cerrar el icono en SVG.
</button> //? Se encarga de cerrar el botón en HTML.
</div>//?   Se encarga de cerrar el contenedor de elementos en HTML.

*******************************************************************************************************************************************
8) Responsive Navigation Menu - Menú de navegación responsivo =//? Este es el menú de navegación responsivo, para configuracion en poantallas de difenrentes tamaños
9)Responsive Settings Options - Opciones de configuración responsivas =//?Estas son las opciones de configuración responsivas, se mostrarán en el menú desplegable en pantallas pequeñas.
10)Authentication - Autenticación //? Se encarga de definir el formulario de autenticación.

*********************************************************************************************************************************************

-->