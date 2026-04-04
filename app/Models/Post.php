<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

#[ObservedBy(PostObserver::class)]

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'is_published',
        'image_path',
        'content',
        'user_id',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected function image(): Attribute{
        return Attribute::make(
                get: fn () => $this->image_path ? Storage::url($this->image_path) : asset('storage/media/no-disponible.jpg')
        );
    }

    //Relaciones

    // Definir la relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación muchos a muchos con categorías
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Relación muchos a muchos con tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->distinct();
    }

    // Si también quieres mantener una relación singular con una categoría principal
    /* public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    } */
    // Si mantienes también la relación singular con category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Tiempo de lectura
    public function getReadingTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = ceil($words / 200); // 200 palabras por minuto
        return $minutes . ' min lectura';
    }

    // Número de vistas formateado
    public function getFormattedViewsAttribute()
    {
        $views = $this->views ?? 0;

        if ($views >= 1000) {
            return number_format($views / 1000, 1) . 'k vistas';
        }

        return $views . ' vistas';
    }

    // Tags como array de nombres
    public function getTagNamesAttribute()
    {
        return $this->tags->pluck('name')->toArray();
    }

    // Resumen completo
    public function getSummaryAttribute()
    {
        return [
            'category' => optional($this->category)->name ?? 'Sin categoría',
            'reading_time' => $this->reading_time,
            'views' => $this->formatted_views,
            'tags' => $this->tag_names,
        ];
    }

   /*  public function getReadingTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = ceil($words / 200); // 200 palabras por minuto
        return $minutes . ' min lectura';
    } */

    //Route Model Binding
   /*  public function getRouteKeyName(){
        return 'slug';
    }
 */
    
}
