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
<h2 class="font-semibold
text-xl 
text-gray-800 
dark:text-gray-200 
leading-tight">
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


-->