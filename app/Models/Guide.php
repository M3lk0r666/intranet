<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guide extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'is_active','views_count'];

    public function sections(): HasMany
    {
        return $this->hasMany(GuideSection::class)->orderBy('order');
    }

    public function files(): HasMany
    {
        return $this->hasMany(GuideFile::class);
    }

    // Esto permite que Laravel busque por slug en lugar de ID
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
