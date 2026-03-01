<?php
// database/seeders/VideosTableSeeder.php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    public function run()
    {
        $categorias = Category::all();
        $user = User::all();
        
        if ($categorias->isEmpty()) {
            $categoria = Category::create([
                'nombre' => 'General',
                'slug' => 'general',
                'descripcion' => 'Videos generales',
                'activo' => true
            ]);
            $categorias = collect([$categoria]);
        }

        $videos = [
            [
                'titulo' => 'Introducción a la Empresa',
                'descripcion' => 'Video de presentación de nuestra empresa y valores',
                'video_url' => 'https://www.youtube.com/watch?v=ejemplo1',
                'thumbnail_url' => 'https://via.placeholder.com/640x360',
                'category_id' => $categorias->first()->id,
                'user_id' => $user->first()->id,
                'orden' => 1
                
                
            ],
            [
                'titulo' => 'Seguridad en el Trabajo',
                'descripcion' => 'Normas y procedimientos de seguridad',
                'video_url' => 'https://www.youtube.com/watch?v=ejemplo2',
                'thumbnail_url' => 'https://via.placeholder.com/640x360',
                'category_id' => $categorias->first()->id,
                'user_id' => $user->first()->id,
                'orden' => 2
                
                
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}