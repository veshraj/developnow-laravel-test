<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Config\Models\Language;

trait Languable
{
    public function language()
    : BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
    
}