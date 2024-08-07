<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Comment;
use Illunianete\Support\Facades\Hash;


class CommentsTableSeeder extends Seeder
{

    public function run(): void
    {
        $comment = new Comment();
        $comment->user_id = 1;
        $comment->image_id = 4;
        $comment->content = 'Buena foto en familia';
        $comment->save();

        $comment = new Comment();
        $comment->user_id = 2;
        $comment->image_id = 1;
        $comment->content = 'Buena foto en familia';
        $comment->save();

        $comment = new Comment();
        $comment->user_id = 2;
        $comment->image_id = 4;
        $comment->content = 'Buena foto en familia';
        $comment->save();


    }
}
