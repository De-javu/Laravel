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

                        <div class="card">
                            <div class="card-header p-4">
                                <!-- Se valida si el usuario tiene una imagen de perfil, si no la tiene se muestra un mensaje para que suba una. -->
                                @if ($image->user->image_path)
                                    <div class="flex items center">
                                        <div class="avatar">
                                            <img src="{{ route('profile.avatar', ['filename' => $image->user->image_path]) }}"
                                                alt="Avatar" class="rounded-full h-9 w-9 object-cover">

                                        </div>
                                        <div class="ml-4">
                                            {{$image->user->name . ' ' . $image->user->surname}}
                                        </div>

                                        <!-- mensaje para que suba una imagen de perfil, se adjunta link  -->

                                @else
                                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4"
                                        role="alert">
                                        <p class="font-bold"> {{$image->user->name}}</p>
                                        <x-nav-link :href="route('image.create')"
                                            :active="request()->routeIs('image.create')">
                                            {{ __('Carga tu Imagen') }}, </br>
                                            {{ __('Haz click aquí') }}
                                        </x-nav-link>
                                    </div>
                                @endif
                                </div>
                            </div>

                                <!-- Tarjeta de imagen -->
                            <div class="car-body p-4 bg-gray-710 rounded-lg shadow-xl h-auto">
                                <div class="image mb-4 ">

                                  <!-- condicional para mostrar la imagen o un mensaje de error si no se encuentra -->
                                    @if (isset($image->user->image_path))
                                        <img src="{{ route('image.file', ['filename' => $image->image_path]) }}"
                                            alt="Imagen" class="object-cover w-full h-auto mx-auto">
                                    @else
                                        <p class="text-red-500">No se encuentra imagen disponible</p>
                                    @endif

                                    <!-- Configuracion dela descripción de la imagen con la fecha de publicación -->
                                    <div class="description   m-auto p-4  ">
                                        <span>{{ $image->description }}</span> <br>
                                        <span>{{ 'Publicado ' . \App\Helpers\FormatTime::LongTimeFilter($image->created_at) }}</span>
                                    </div>

                                    <!-- Sección de comentarios, con numero de comentarios y visualizacionde emoji -->
                                    <div class="likes flex items-center space-x-2 mb-4">
                                        <img src="{{asset('imagenes/heart-red.png')}}" alt="Corazon">
                                        <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex">
                                            <h2>Comentarios ({{count($image->comments)}})</h2>
                                        </div>
                                    </div>

                                      <!-- Creacion del formualario el cual optiene el id de la imagne y lo pasa de forma oculta -->
                                    <div class="bg-white-500 dark:bg-gray-800 shadow sm:rounded-lg p-2 ">
                                        <form action="{{route('comment.store')}}" method="POST" class="mt-6 space-y-6">
                                            @csrf
                                            @method('patch')

                                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                                            <div>
                                            <textarea name="content" class="mt--1.25 block w-full p-2 border border-gray-300 rounded-md text-gray-900" required></textarea>
                                            </div>
                                            <div>
                                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

</x-app-layout>