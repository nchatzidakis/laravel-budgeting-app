<?php

namespace App\Traits;

use App\Models\Site;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToSite
{
    /**
     * Get the object that owns the site.
     */
    function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}