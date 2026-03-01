<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use App\Models\CatsVideo;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Alberto',
            'email' => 'alberto.ramirez@lagueba.com',
            'password' => bcrypt('12345678')
        ]);

        Category::factory(5)->create();
        Post::factory(100)->create();
        Tag::factory(15)->create();

        Video::factory(10)->create();
        
    }
}
