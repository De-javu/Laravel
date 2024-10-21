
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


<!-------------------------------------------------------------- Diccionario de terminos de la vista de edicion  de imágenes beade --------------------------------------------------------->

<x-app-layout> //? 1. Se extiende la plantilla de la aplicación.
    <section> //? 2. Sección de la vista.
        <div> //? 3. Contenedor de la vista.
            <!-- Se llama a la variable slot para que se muestre el contenido de la vista de creación de imágenes. -->
            <x-slot name="header"> //? 4. Sección de la vista.
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> //? 5. Título de la vista.
                    {{ __('Actualizar Imagen') }} //? 6. Título de la vista.
                    <div class="flex items-center gap-4 m-4">    //? 7. Contenedor de la imagen.                          
                        <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" //? 8. Ruta para recupera la imagen de la base de datos.
                        alt="Imagen" class="rounded-full h-48 w-12object-cover"> //? 9. Estilo de la imagen.
                    </div>

                    <!-- Se muestra el mensaje de éxito si existe -->

                    @include('components.mensaje', ['status' => 'profile-updated']) //? 10. Inclusión del componente mensaje.
                </h2>
                <p class="text-gray-500">Ahora puedes actualizar tu imagen.</p> //? 11. Texto de la vista.


                <!-- Creacion del formulario para subir imagenes -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg sm:overflow-hidden"> //? 12. Estilo del formulario.
                    <form method="POST" action="{{route('image.update', ['id' => $image->id])}}" enctype="multipart/form-data" //? 13. Formulario para actualizar la imagen.
                        class="mt-6 space-y-6"> //? 14. Espaciado del formulario.
                        @csrf //? 15. Directiva csrf.
                        @method('put') //? 16. Método put.

                        <div>
                            <x-input-label for="image_path" :value="__('Image')" /> //? 17. Etiqueta de la imagen.

                            <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full"/> //? 18. Entrada de texto para la imagen.
                            <x-input-error class="mt-2" :messages="$errors->get('image_path')" /> //? 19. Mensaje de error.
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" /> //? 20. Etiqueta de la descripción.
                            <textarea id="description" name="description" class="mt-1 block w-full">{{$image->description}}</textarea> //? 21. Área de texto para la descripción.
                            <x-input-error class="mt-2" :messages="$errors->get('description')" /> //? 22. Mensaje de error.
                        </div>

                        <!-- Se crea el boton de guardado de la imagen y se muestra un mensaje de guardado exitoso. -->
                        <div class="flex items-center gap-4"> //? 23. Estilo del botón.
                            <x-primary-button>{{ __('Actualizar') }}</x-primary-button> //? 24. Botón de actualización.

                            @if (session('status') === 'profile-updated') //? 25. Condición de actualización.
                                <p x-data="{ show: true }" x-show="show" x-transition //? 26. Transición de actualización.
                                    x-init="setTimeout(() => show = false, 2000)" //? 27. Inicialización de actualización.
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Actualizar imagen.') }}</p> //? 28. Mensaje de actualización.
                            @endif
                        </div>
                    </form>
                </div>
        </div>
        </x-slot>
    </section>
</x-app-layout>
