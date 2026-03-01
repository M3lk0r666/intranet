<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoStats extends Model
{
    protected $fillable = [
        'video_id',
        'plays',
        'completed_views',
        'likes',
        'dislikes',
        'watch_time_data',
        'stat_date'
    ];

    protected $casts = [
        'watch_time_data' => 'array',
        'stat_date' => 'date'
    ];

    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
}