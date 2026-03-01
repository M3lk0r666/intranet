<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuideStep extends Model
{
    protected $fillable = [
        'guide_section_id', 
        'title', 
        'content', 
        'content_type', 
        'items', 
        'order'
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(GuideSection::class);
    }
}
