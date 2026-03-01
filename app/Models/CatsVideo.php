<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatsVideo extends Model
{
    protected $fillable = [
        'name', 'slug', 'icon', 'color', 'position', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /* public function videos()
    {
        return $this->belongsToMany(Video::class);
    } */

    public function videos()
    {
        return $this->belongsToMany(
            Video::class,
            'cats_videos',
            'cats_video_id',
            'video_id'
        );
    }
}
