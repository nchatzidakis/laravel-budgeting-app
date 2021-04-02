<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    protected static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            $model->uuid = Str::uuid();
        });
    }

    public function getRouteKeyName() {
        return 'uuid';
    }
}