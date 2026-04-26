<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use League\CommonMark\Environment\Environment;
use League\CommonMark\CommonMarkConverter;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['file_url', 'html_content'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'type',
        'file_path',
        'original_filename',
        'file_type',
        'file_size',
        'content',
        'thumbnail',
        'category_id',
        'user_id',
        'status',
    ];

    //relaciones

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //scopes

    public function scopePublished($query)
    {
        return $query->where('status', true);
    }

    //helper

    public function isPdf()
    {
        return $this->type === 'pdf';
    }

    public function isGuide()
    {
        return $this->type === 'guide';
    }

    public function getReadableSizeAttribute()
    {
        if (!$this->file_size) return null;
        $units = ['B', 'KB', 'MB', 'GB'];
        $size = $this->file_size;
        $i = 0;

        while ($size >= 1024) {
            $size /= 1024;
            $i++;
        }

        return round($size, 2) . ' ' . $units[$i];
    }

    public function getHtmlContentAttribute()
    {
        // Evitar error si no es guía
        if ($this->type !== 'guide' || empty($this->content)) {
            return null;
        }

        $environment = new Environment([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        $converter = new CommonMarkConverter([], $environment);
        $html = $converter->convert($this->content)->getContent();

        // Agregar IDs a headings
        $html = preg_replace_callback('/<(h[1-3])>(.*?)<\/\1>/', function ($matches) {
            $id = \Str::slug(strip_tags($matches[2]));
            return "<{$matches[1]} id=\"{$id}\">{$matches[2]}</{$matches[1]}>";
        }, $html);

        return $html;
    }

    public function getThumbnailSourceAttribute()
    {
        if (!empty($this->thumbnail)) {
            return asset('storage/' . $this->thumbnail);
        }

        return asset('images/default-thumbnail.jpg');
    }

    public function getFileUrlAttribute()
    {
        // Archivo local
        if (!empty($this->file_path)) {
            $fullPath = storage_path('app/public/' . $this->file_path);
    
            if (file_exists($fullPath)) {
                return asset('storage/' . $this->file_path);
            }
        }

        // URL externa (sin recursión)
        if (!empty($this->attributes['file_url'])) {
            return $this->attributes['file_url'];
        }
        return null;
    }
}
