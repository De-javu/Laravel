<div class="card">
    <div class="card-header p-4">
        <!-- Se valida si el usuario tiene una imagen de perfil, si no la tiene se muestra un mensaje para que suba una. -->
        @if ($image->user->image_path)
            <div class="flex items center">
                <div class="avatar">
                    <img src="{{ route('profile.avatar', ['filename' => $image->user->image_path]) }}" alt="Avatar"
                        class="rounded-full h-9 w-9 object-cover">

                </div>
                <div class="ml-4 text-gray-400 cursor-auto  hover:text-gray-100">
                    <x-nav-link href="{{route('settings.perfil', ['id' => $image->user->id])}}">
                        <h1 class="text-lg   font-sans uppercase">
                            {{$image->user->name . ' ' . $image->user->surname}}
                        </h1>

                    </x-nav-link>
                </div>



                <!-- mensaje para que suba una imagen de perfil, se adjunta link  -->

        @else
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p class="font-bold"> {{$image->user->name}}</p>
                <x-nav-link :href="route('image.create')" :active="request()->routeIs('image.create')">
                    {{ __('Carga tu Imagen') }}, </br>
                    {{ __('Haz click aquí') }}
                </x-nav-link>
            </div>
        @endif
        </div>
    </div>


    <!-- Se muestra la imagen y la descripción de la misma. -->
    <div class="car-body p-4 bg-gray-710 rounded-lg shadow-xl">
        <div class="image mb-4 ">

    @if ($image->image_path)
    <img src="{{ asset('storage/images/' . $image->image_path) }}" alt="Imagen"
     style="max-width: 400px; height: auto; object-fit: cover; border-radius: 8px;">
    @else
        <p class="text-red-500">No se encuentra imagen disponible</p>
      @endif


            <div class="description   m-auto p-4  ">
                <span>{{ $image->description }}</span> <br>
                <span>{{ 'Publicado ' . \App\Helpers\FormatTime::LongTimeFilter($image->created_at) }}</span>
            </div>

            <!-- // Se muestran los botones para dar like y comentar la imagen. -->
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

                    <img src="{{asset('imagenes/heart-red.png')}}" alt="Corazon" data-id="{{$image->id}}"
                        class="btn-deslike">
                @else
                    <img src="{{asset('imagenes/black-heart.png')}}" alt="Corazon" data-id="{{$image->id}}"
                        class="btn-like">
                @endif



                {{count($image->likes)}}


                <!-- // Boton de comentarios  -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex">
                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded ">
                        <a href="{{route('image.detail', ['id' => $image->id])}}"> Comentarios ({{count($image->comments)}})</a>
                    </button>


                </div>
            </div>

        </div>
    </div>

</div>