
<!-- Exportar la clase para la vista de creación de imágenes beade -->
<x-app-layout>
    <section>
        <div>
            <!-- Se llama a la variable slot para que se muestre el contenido de la vista de creación de imágenes. -->
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> 
                    {{ __('Actualizar Imagen') }}
                    <div class="flex items-center gap-4 m-4">                                   
                        <img src="{{ route('image.file', ['filename' => $image->image_path]) }}"
                        alt="Imagen" class="rounded-full h-48 w-12object-cover">
                    </div>

                    <!-- Se muestra el mensaje de éxito si existe -->

                    @include('components.mensaje', ['status' => 'profile-updated'])
                </h2>
                <p class="text-gray-500">Ahora puedes actualizar tu imagen.</p>


                <!-- Creacion del formulario para subir imagenes -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg sm:overflow-hidden">
                    <form method="POST" action="{{route('image.update', ['id' => $image->id])}}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="image_path" :value="__('Image')" />

                            <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full"/>
                            <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="mt-1 block w-full">{{$image->description}}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <!-- Se crea el boton de guardado de la imagen y se muestra un mensaje de guardado exitoso. -->
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Actualizar') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Actualizar imagen.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
        </div>
        </x-slot>
    </section>
</x-app-layout>