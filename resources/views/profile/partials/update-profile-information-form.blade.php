<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Mostrar el mensaje de éxito si existe -->
     @include('components.mensaje', ['status' => 'profile-updated'])
     

 <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
    @csrf

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="surname" :value="__('Surname')" />
        <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', $user->surname)" required autofocus autocomplete="surname" />
        <x-input-error class="mt-2" :messages="$errors->get('surname')" />
    </div>

    <div>
        <x-input-label for="nick" :value="__('Nick')" />
        <x-text-input id="nick" name="nick" type="text" class="mt-1 block w-full" :value="old('nick', $user->nick)" required autofocus autocomplete="nick" />
        <x-input-error class="mt-2" :messages="$errors->get('nick')" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>

    <div>
        <x-input-label for="phone" :value="__('Phone')" />
        <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
    </div>

    <div>
        <x-input-label for="image_path" :value="__('Image')" />
        @include('components.avatar')
        <input id="image_path" name="image_path" type="file" class="mt-1 block w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
</section>