<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You listing") }}


                    <div>



                        @include('components.mensaje')
                        @foreach ($images as $image)                           
                            <div class="card">
                                <div class="card-header p-4">



                                    @if ($image->user->image_path)
                                        <div class="flex items center">
                                            <div class="avatar">
                                                <img src="{{ route('profile.avatar', ['filename' => $image->user->image_path]) }}"
                                                    alt="Avatar" class="rounded-full h-9 w-9 object-cover">
                                            </div>
                                                <div class="ml-4">
                                                    {{$image->user->name . ' ' . $image->user->surname}}
                                            </div>


                                    @else
                                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4"
                                            role="alert">
                                            <p class="font-bold"> {{$image->user->name}}</p>
                                            <x-nav-link :href="route('image.create')"
                                                :active="request()->routeIs('image.create')">
                                                {{ __('Carga tu Imagen   ') }}
                                            </x-nav-link>
                                        </div>





                                    @endif
                                        </div>


                                    </div>
                        @endforeach
                            </div>
                        </div>
                    </div>

                </div>




            </div>
        </div>
</x-app-layout>