<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToUser
{
    /**
     * Get the user that owns the object.
     */
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}