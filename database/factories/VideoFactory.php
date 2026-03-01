<?php

namespace Database\Factories;

use App\Models\Video;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition()
    {
        // IDs de videos de YouTube de ejemplo
        $videoIds = [
            'dQw4w9WgXcQ', '9bZkp7q19f0', 'kJQP7kiw5Fk', 'CduA0TULnow',
            'OPf0YbXqDm0', 'UceaB4D0jpo', 'JGwWNGJdvx8', 'AKiK5D44qs',
            'RgKAFK5djSk', 'fRh_vgS2dFE', 'k2qgadSvNyU', 'nfs8NYg7yQM'
        ];

        return [
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph(3),
            'video_url' => 'https://www.youtube.com/watch?v=' . $this->faker->randomElement($videoIds),
            'thumbnail_url' => 'https://picsum.photos/seed/' . $this->faker->word . '/640/360',
            'status' => $this->faker->randomElement(['draft', 'published', 'published', 'published']), // Más probabilidad de published
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}