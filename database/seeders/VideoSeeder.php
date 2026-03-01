<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        // Crear categorías si no existen
        if (Category::count() === 0) {
            Category::factory()->count(5)->create();
        }

        // Crear tags si no existen
        if (Tag::count() === 0) {
            Tag::factory()->count(10)->create();
        }

        // Crear usuario admin si no existe
        if (User::where('email', 'admin@empresa.com')->doesntExist()) {
            User::factory()->create([
                'name' => 'Administrador',
                'email' => 'admin@empresa.com',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]);
        }

        // Crear videos
        $videos = Video::factory()->count(15)->create();

        // Asignar tags a cada video
        $tags = Tag::all();
        
        $videos->each(function ($video) use ($tags) {
            // Asignar entre 1 y 4 tags aleatorios a cada video
            $video->tags()->attach(
                $tags->random(rand(1, 4))->pluck('id')->toArray()
            );
        });

        $this->command->info('Seeder de videos ejecutado correctamente!');
        $this->command->info('Videos creados: ' . $videos->count());
    }
}
