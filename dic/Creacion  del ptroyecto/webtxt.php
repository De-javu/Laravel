<?php

use Illuminate\Support\Facades\Route;
use App\Models\Image;

Route::get('/', function () {
    $images = Image::all();
    foreach ($images as $image) {
        echo $image->image_path . '<br>';
        echo $image->description . '<br>';
        echo $image->user->first_name . '<br>';

        if (count($image->comments) >= 1) {
            echo '<h4>Comentarios</h4>';
            foreach ($image->comments as $comment) {
                echo $comment->user->name . ' ';
                echo $comment->content . '<br>';

            }
        }

        echo 'LIKES:'.count($image->likes);
        echo '<hr/>';



        echo "<hr/>";

    }


    return view('welcome');
});
