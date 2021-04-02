<?php

namespace App\Traits;

use App\Scopes\CurrentUserScope;

trait HasCurrentUserScope
{
    protected static function booted(): void
    {
        static::addGlobalScope(new CurrentUserScope());
    }
}