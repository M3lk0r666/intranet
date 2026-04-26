<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'thumbnail', 'status'
    ];

    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('order');
    }

    // Para evitar N+1
    public function scopeWithStructure($query)
    {
        return $query->with([
            'modules.lessons' => fn ($q) => $q->orderBy('order')
        ]);
    }

    public function lessons()
    {
        return $this->hasManyThrough(
            \App\Models\Lesson::class,
            \App\Models\Module::class
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
