<x-app-layout>

    <section>
        <div>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Carga tus Imagenes
                </h2>
                <p class="text-gray-500">Sube tus imagenes para que todos puedan verlas.</p>



                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg sm:overflow-hidden">
                    <form method="POST" action="" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')


                        <div>
                            <x-input-label for="image_path" :value="__('Image')" />

                            <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="mt-1 block w-full" required></textarea>
                            <class="mt-2" :messages="$errors->get('description')" />
                        </div>


                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>

                </div>

        </div>
        </x-slot>
    </section>


</x-app-layout>