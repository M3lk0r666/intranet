<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'module_id', 'title', 'type', 'content_id', 'order', 'duration'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * 🔥 Resolución dinámica del contenido
     */
    public function getContentResourceAttribute()
    {
        return match ($this->type) {
            'video' => \App\Models\Video::find($this->content_id),
            'pdf', 'guide' => \App\Models\Content::find($this->content_id),
            default => null,
        };
    }

    /**
     * 🔥 Curso directo (helper útil)
     */
    public function getCourseAttribute()
    {
        return $this->module->course;
    }
}
