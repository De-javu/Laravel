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