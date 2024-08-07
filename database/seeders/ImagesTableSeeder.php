<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use Illuminate\Support\Facades\Hash;


class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $image = new Image();
        $image->user_id = 1;
        $image->image_path = 'test.jpg';
        $image->description = 'Imagen de prueba';
        $image-> save();
    
        $image = new Image();
        $image->user_id = 1;
        $image->image_path = 'playa.jpg';
        $image->description = 'Imagen de paseo';
        $image-> save();

    
        $image = new Image();
        $image->user_id = 1;
        $image->image_path = 'caroo.jpg';
        $image->description = 'Imagen de carro';
        $image-> save();

        $image = new Image();
        $image->user_id = 3;
        $image->image_path = 'familia.jpg';
        $image->description = 'Imagen de todos';
        $image-> save();

    }
}
