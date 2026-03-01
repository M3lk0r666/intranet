<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Video extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'video_url',
        'thumbnail_url',
        'duration',
        'views',
        'rating',
        'year',
        'is_trending',
        'is_free',
        'is_featured',
        'access_level',
        'metadata',
        'user_id'
    ];

    protected $casts = [
        'is_trending' => 'boolean',
        'is_free' => 'boolean',
        'is_featured' => 'boolean',
        'metadata' => 'array',
        'views' => 'integer',
        'rating' => 'decimal:1'
    ];

    public function catsvideo()
    {
        return $this->belongsToMany(CatsVideo::class,
            'category_video','video_id','cats_videos_id');
    }

    public function categories()
    {
        return $this->belongsToMany(CatsVideo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stats()
    {
        return $this->hasMany(VideoStat::class);
    }

    protected function image(): Attribute{
        return Attribute::make(
                get: fn () => $this->video_url ? Storage::url($this->video_url) : asset('storage/media/no-disponible.jpg')
        );
    }

    // Helper methods
    public function getFormattedDurationAttribute()
    {
        $parts = explode(':', $this->duration);
        if (count($parts) === 3) {
            $hours = (int)$parts[0];
            $minutes = (int)$parts[1];
            
            if ($hours > 0) {
                return sprintf('%dh %02dm', $hours, $minutes);
            }
            return sprintf('%dm', $minutes);
        }
        return $this->duration;
    }

    public function getFormattedViewsAttribute()
    {
        if ($this->views >= 1000000) {
            return round($this->views / 1000000, 1) . 'M';
        }
        if ($this->views >= 1000) {
            return round($this->views / 1000, 1) . 'K';
        }
        return $this->views;
    }

    public function incrementViews()
    {
        $this->increment('views');
        
        // Actualizar estadísticas diarias
        $today = now()->format('Y-m-d');
        $stat = $this->stats()->firstOrCreate(
            ['stat_date' => $today],
            ['plays' => 0, 'completed_views' => 0]
        );
        $stat->increment('plays');
        $stat->save();
    }
}