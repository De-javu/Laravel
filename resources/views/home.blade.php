<x-app-layout>
    <!-- Se crea una vista para mostrar las imágenes que ha subido el usuario. -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You listing") }}

                    <!-- Se muestran las imágenes que has subido -->
                    <div>
                        @include('components.mensaje')
                        @foreach ($images as $image)                           
                        @include('components.image')
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
        <!-- Paginacion  -->
        <div class="mt-4">
            {{ $images->links() }}
        </div>
    </div>
</x-app-layout>