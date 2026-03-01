<?php

namespace Database\Seeders;

use App\Models\CatsVideo;
use Illuminate\Database\Seeder;

class CatsVideosTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Capacitación', 'slug' => 'training', 'icon' => 'fas fa-graduation-cap', 'color' => '#3b82f6', 'position' => 1],
            ['name' => 'Procesos', 'slug' => 'process', 'icon' => 'fas fa-cogs', 'color' => '#10b981', 'position' => 2],
            ['name' => 'Técnicos', 'slug' => 'technical', 'icon' => 'fas fa-microchip', 'color' => '#8b5cf6', 'position' => 3],
            ['name' => 'Business', 'slug' => 'business', 'icon' => 'fas fa-chart-line', 'color' => '#f59e0b', 'position' => 4],
            ['name' => 'Recursos Humanos', 'slug' => 'hr', 'icon' => 'fas fa-users', 'color' => '#ef4444', 'position' => 5],
            ['name' => 'Desarrollo', 'slug' => 'development', 'icon' => 'fas fa-code', 'color' => '#06b6d4', 'position' => 6],
        ];

        foreach ($categories as $category) {
            CatsVideo::create($category);
        }
    }
}