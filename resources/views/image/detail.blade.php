<x-app-layout>
    <!-- Se crea una vista para mostrar las imágenes que ha subido el usuario. -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You listing") }}


                    <!-- Se muestran las imágenes que has subido -->
                    <div>
                        <div class="card">
                            <div class="card-header p-4">


                                <!-- Se valida si el usuario tiene una imagen de perfil, si no la tiene se muestra un mensaje para que suba una. -->
                                @if (isset($image->user) && $image->user->image_path)
                                    <div class="flex items center">
                                        <div class="avatar">
                                            <img src="{{ route('profile.avatar', ['filename' => $image->user->image_path]) }}"
                                                alt="Avatar" class="rounded-full h-9 w-9 object-cover">
                                        </div>

                                        <!-- Utilizamos el nombre y apellido del usuario que subió la imagen -->
                                        <div class="ml-4 uppercase">
                                            {{$image->user->name . ' ' . $image->user->surname}}
                                        </div>


                                <!-- mensaje para que suba una imagen de perfil, se adjunta link  -->
                                @else
                                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                        <p class="font-bold">
                                            {{ isset($image->user) ? $image->user->name : 'Usuario desconocido' }}</p>
                                        <x-nav-link :href="route('image.create')"
                                            :active="request()->routeIs('image.create')">
                                            {{ __('Carga tu Imagen') }}, 
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

                                        <!-- Botonones para editar y eliminar la imagen -->
                                        @if ($image->user->id == Auth::user()->id)
                                            <div class="p-1 ">
                                                <span class="text-green-500">{{ 'NOMBRE DE LA IMAGEN =   ' . $image->image_path}}</span> <br>            
                                                 <x-nav-link href=""><x-secondary-button>{{'Editar'}}</x-secondary-button></x-nav-link>                                                
                                                
                                                
                                                <!-- >Integracion del boton  modal -->
                                                <x-danger-button type="button"  onclick="openModal('exampleModal')">Eliminar</x-danger-button >                                                
                                            </div> 


                                            <!-- Button trigger modal -->
                                            <div id="exampleModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                                                <div class="modal-overlay absolute inset-0 bg-gray-900 opacity-80"></div>
                                                <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                                    <div class="modal-content py-4 text-left px-6">

                                                    
                                                        <!-- Modal header -->
                                                        <div class="flex justify-between items-center pb-3 font-mono ">
                                                          <button type="button" class="text-black close-modal" onclick="closeModal('exampleModal')">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button> 
                                                            <br>
                                                            <h1 class="text-2xl font-bold text-gray-800" id="exampleModalLabel">Estas seguro de eliminar esta imagen!</h1> 
                                                          

                                                        </div>
                                                        <!-- Modal body mensaje -->
                                                        <div class="my-5">
                                                            <div class="flex items center text-gray-500">
                                                            <p>Eliminar una imagen es una acción permanente que no puede deshacerse. Antes de proceder, es importante asegurarse de que la imagen ya no es necesaria</p>
                                                            </div>
                                                        </div>
                                                        <!-- Modal footer accion de eliminar configuracion vista-->
                                                        <div class="flex justify-end pt-2">
                                                            <x-secondary-button  class="m-4" onclick="closeModal('exampleModal')">Close</x-secondary-button>
                                                            <x-nav-link href="{{route('image.destroy', ['id' => $image->id])}}">
                                                            <x-danger-button class="m-2">{{ __('Eliminarrrrr') }}</x-danger-button>
                                                            </x-nav-link>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                                {{-- Configuracion del Modal con js para actuar con el boton de eliminar --}}
                                                                <script>
                                                                    function openModal(modalId) {
                                                                        document.getElementById(modalId).classList.remove('hidden');
                                                                    }

                                                                    function closeModal(modalId) {
                                                                        document.getElementById(modalId).classList.add('hidden');
                                                                    }
                                                                </script>

                             @endif

                                    @else
                                        <p class="text-red-500">No se encuentra imagen disponible</p>
                                    @endif

                                    <!-- Configuracion dela descripción de la imagen con la fecha de publicación -->
                                    <div class="description   m-auto p-4  ">
                                        <span>{{ $image->description }}</span> <br>
                                        <span>{{ 'Publicado ' . \App\Helpers\FormatTime::LongTimeFilter($image->created_at ?? '') }}</span>
                                    </div>

                                    <!-- Sección de comentarios, con numero de comentarios y visualizacionde emoji -->
                                    <div class="likes flex items-center space-x-2 mb-4">
                                        <!-- // Comprobamos si el usuario le ha dado like a la imagen -->
                                        <?php $user_like = false; ?>

                                        @foreach($image->likes as $like)
                                            @if($like->user->id == Auth::user()->id)
                                                <?php        $user_like = true; ?>
                                            @endif
                                        @endforeach



                                        <!-- // Mostramos el corazón en rojo si el usuario le ha dado like, a la imagen o el negro si no lo ha hecho -->
                                        @if($user_like)

                                            <img src="{{asset('imagenes/heart-red.png')}}" alt="Corazon"
                                                data-id="{{$image->id}}" class="btn-deslike">
                                        @else
                                            <img src="{{asset('imagenes/black-heart.png')}}" alt="Corazon"
                                                data-id="{{$image->id}}" class="btn-like">
                                        @endif



                                        <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex">
                                            <h2>Comentarios ({{count($image->comments)}})</h2>
                                        </div>


                                    </div>
                                    @include('components.mensaje')

                                    <!-- Creacion del formualario el cual optiene el id de la imagen y lo pasa de forma oculta -->
                                    <div class="bg-white-500 dark:bg-gray-800 shadow sm:rounded-lg p-2 ">
                                        <form action="{{route('comment.store')}}" method="POST" class="mt-6 space-y-6">
                                            @csrf
                                            @method('patch')

                                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                                            <div>
                                                <textarea name="content"
                                                    class="mt--1.25 block w-full p-2 border border-gray-300 rounded-md text-gray-900 "
                                                    required></textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('content')" />
                                            </div>
                                            <div>
                                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                            </div>
                                        </form>


                                        <!--1.1 Listamos los comentarios de la imagen -->
                                        @foreach ($image->comments as $comment)

                                                                            <div class="m-auto mt-4 p-8  text-gray-400">
                                                                                <span>{{'@' . $comment->user->nick}}</span> <br>
                                                                                <span>{{ $comment->content }}</span> <br>
                                                                                <span>{{ 'Publicado ' . \App\Helpers\FormatTime::LongTimeFilter($comment->created_at) }}</span><br>

                                                                                <!-- 1.2 verificamos si el usuario esta autenticado y si es el dueño del comentario o de la imagen -->
                                                                                @if (Auth::check())
                                                                                                                        @php
                                                                                                                            $user = Auth::user();
                                                                                                                            $id = $comment->user_id;
                                                                                                                            $ima = $comment->image->user_id;
                                                                                                                        @endphp

                                                                                                                        <!-- 1.3 verificamos si el usuario esta autenticado y si es el dueño del comentario o de la imagen -->
                                                                                                                        @if ($comment->image && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                                                                                                            <x-nav-link href="{{ route('comment.destroy', ['id' => $comment->id]) }}">
                                                                                                                                <!-- 1.4 Estilizamos el boton de eliminar -->
                                                                                                                                <x-danger-button>
                                                                                                                                    {{ __('Eliminar') }}
                                                                                                                                </x-danger-button>
                                                                                                                            </x-nav-link>
                                                                                                                        @else
                                                                                                                            <p>Solo el usuarios o creador de el comentarios, puede eliminar</p>
                                                                                                                        @endif
                                                                                @endif

                                                                                @if ($comment->user_id == Auth::user()->id)

                                                                                    <x-nav-link href="{{ route('comment.edit', ['id' => $comment->id]) }}">
                                                                                        <!-- 1.4 Estilizamos el boton de editar -->
                                                                                        <x-secondary-button>
                                                                                            {{ __('Editar') }}
                                                                                        </x-secondary-button>
                                                                                    </x-nav-link>
                                                                                @else
                                                                                    <p>No puedes editar</p>

                                                                                @endif
                                                                            </div>
                                        @endforeach

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