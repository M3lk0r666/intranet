<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GuideSection extends Model
{
    protected $fillable = ['guide_id', 'title', 'order', 'icon'];

    public function guide(): BelongsTo
    {
        return $this->belongsTo(Guide::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(GuideStep::class)->orderBy('order');
    }
}