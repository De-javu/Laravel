<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

       

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>


<!--
DICCIONARIO DE TERMINOS PARA ESTA PRACTICA:

<!DOCTYPE html> =  //?Se utiliza para definir el tipo de documento HTML.
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> =  //?Se utiliza paara estabecer el idioma del documento
"{{ str_replace('_', '-', app()->getLocale()) }}" =  //?Es una directiva de bleade para mostrar texto.
<head> =  //? Se utiliza para indicar el comienzo del encabezado del documento, y contien los metadatos del documento
<meta charset="utf-8"> = //?  Se utiliza para definir el tipo de codificacion de caracteres que se va a utilizar
<meta name="viewport" content="width=device-width, initial-scale=1"> = //? Se utiliza para definir la escala inicial del documento
<meta name="csrf-token" content="{{ csrf_token() }}"> =//? Se utiliza para definir el token de seguridad de la aplicacion.

 ************************************************Fonts =  fuentes **********************************************************
 <link rel="preconnect" href="https://fonts.bunny.net"> = //? Se utiliza para establecer una conexion previa con el servidor de fuentes
 <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> = //? Se utiliza para establecer la fuente que se va a utilizar en el documento


 ************************************************Scripts =  Guiones **********************************************************
@vite(['resources/css/app.css', 'resources/js/app.js']) = //? Se utiliza para cargar los archivos css y js que se van a utilizar en el documento
</head> = //? Se utiliza para indicar el final del encabezado del documento
<body class="font-sans antialiased"> = //? Se utiliza para establecer el tipo de fuente y la suavidad de los bordes de los elementos
<div class="min-h-screen bg-gray-100 dark:bg-gray-900"> = //? Se utiliza para establecer el tamaño minimo de la pantalla y el color de fondo
@include('layouts.navigation') = //? Indica que se incluirael archivo de navegacion en el documento

************************************************ Page Heading = Encabezado de la pagina **********************************************************
@isset($header) =  //? Se utiliza para verificar si la variable $header esta definida y si su valor no es nulo
<header class="bg-white dark:bg-gray-800 shadow"> = //? Se utiliza para establecer el color de fondo y la sombra del encabezado
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"> = //? Se utiliza para establecer el ancho maximo del encabezado y el espaciado
{{ $header }} = //? Se utiliza para mostrar el contenido de la variable $header
</div> = //? Se utiliza para indicar el final del contenido del encabezado
</header> = //? Se utiliza para indicar el final del encabezado
@endisset = //? Se utiliza para indicar el final de la verificacion de la variable $header

************************************************ Page Content = Contenido de la pagina **********************************************************
<main> = //? Se utiliza para indicar el comienzo del contenido principal de la pagina
{{ $slot }} = //? Se utiliza para mostrar el contenido de la variable $slot
</main> = //? Se utiliza para indicar el final del contenido principal de la pagina
</div> = //? Se utiliza para indicar el final del contenido de la pagina
</body> = //? Se utiliza para indicar el final del cuerpo del documento
</html> = //? Se utiliza para indicar el final del documento
