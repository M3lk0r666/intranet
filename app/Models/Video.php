<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['thumbnail_source', 'video_source'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'video_url',
        'video_path',
        'original_filename',
        'file_size',
        'file_type',
        'video_type',
        'thumbnail_url',
        'thumbnail_path',
        'status',
        'category_id',
        'user_id'
    ];


    protected $casts = [
        'status' => 'string',
        'video_type' => 'string'
    ];

    /**
     * Relación con categoría
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relación con usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación muchos a muchos con tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Scope para videos publicados
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope para videos activos (no archivados)
     */
    public function scopeActive($query)
    {
        return $query->where('status', '!=', 'archived');
    }

    /**
     * Generar slug automáticamente
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($video) {
            if (empty($video->slug)) {
                $video->slug = \Str::slug($video->title);
            }
        });

        static::updating(function ($video) {
            if ($video->isDirty('title')) {
                $video->slug = \Str::slug($video->title);
            }
        });
    }

    /**
     * Obtener la URL del video (local o externo)
     */
    public function getVideoSourceAttribute()
    {
        /* if ($this->video_type === 'uploaded' && $this->video_path) {
            return asset('storage/' . $this->video_path);
        }
        return $this->video_url; */

        if ($this->video_type === 'uploaded' && !empty($this->video_path)) {
            return asset('storage/' . $this->video_path);
        }
    
        if (!empty($this->video_url)) {
            return $this->video_url;
        }
    
        return null;
    }

    /**
     * Obtener la URL del thumbnail (local o externo)
     */
    public function getThumbnailSourceAttribute()
    {
        //esto es lo bueno antes del cambio
        /* if ($this->thumbnail_url) {
            return $this->thumbnail_url;
        }
    
        if ($this->thumbnail_path && file_exists(storage_path('app/public/' . $this->thumbnail_path))) {
            return asset('storage/' . $this->thumbnail_path);
        }
    
        return asset('images/default-thumbnail.jpg'); */

        //esto lo ultimo q se agrego
        if (!empty($this->thumbnail_url)) {
            return $this->thumbnail_url;
        }
    
        if (!empty($this->thumbnail_path)) {
            return asset('storage/' . $this->thumbnail_path);
        }
    
        return asset('images/default-thumbnail.jpg');
    }

    /**
     * Determinar si el video es subido localmente
     */
    public function isUploadedVideo()
    {
        return $this->video_type === 'uploaded';
    }

    /**
     * Determinar si el video es URL externa
     */
    public function isExternalVideo()
    {
        return $this->video_type === 'url';
    }

    /**
     * Formatear tamaño del archivo
     */
    public function getFormattedFileSizeAttribute()
    {
        if (!$this->file_size) return null;
        
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = $this->file_size;
        $i = 0;
        
        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }
    
    // para el thumbnail
   /*  public function getThumbnailAttribute()
    {
        if ($this->thumbnail_url) {
            return $this->thumbnail_url;
        }

        if ($this->thumbnail_path) {
            return asset('storage/' . $this->thumbnail_path);
        }

        return asset('images/default-thumbnail.jpg');
    } */
}
