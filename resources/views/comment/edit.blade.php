<!-- Se encarga de mostrar si ahy errrores en el formulario de edicion de comentarios con el metodo validate del controlador CommentController -->
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul> 
</div>
@endif

<!-- Titulo del comentario a editar -->
<h1>hola bebe</h1>


<!-- Formulario de edicion de comentarios con la ruta de actualizacion de comentarios -->
<div class="bg-white-500 dark:bg-gray-800 shadow sm:rounded-lg p-2 ">
    <form action="{{route('comment.update', $comment->id)}}" method="POST" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
        <div>
            <textarea name="content"  id="content" class="mt--1.25 block w-full p-2 border border-gray-300 rounded-md text-gray-900 "
                required> {{$comment->content}}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('content')" />
        </div>
        <div>
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </for