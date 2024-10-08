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