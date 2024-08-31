@if($user->image_path)

    <img src="{{ route('profile.avatar', ['filename' => $user->image_path]) }}" alt="Avatar"
        class="rounded-full h-9 w-19 object-cover">

@endif