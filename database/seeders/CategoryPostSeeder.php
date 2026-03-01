<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class CategoryPostSeeder extends Seeder
{
    public function run()
    {
        // Obtener todos los posts y categorías
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();

        // Asignar categorías aleatorias a cada post
        foreach ($posts as $post) {
            // Asignar 1-3 categorías aleatorias
            $randomCategories = $categories->random(rand(1, 3));
            $post->categories()->attach($randomCategories);

            // Asignar 2-5 tags aleatorios
            $randomTags = $tags->random(rand(2, 5));
            $post->tags()->attach($randomTags);
        }
    }
}