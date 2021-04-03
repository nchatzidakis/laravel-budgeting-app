<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CurrentUserScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     * @param  Builder  $builder
     * @param  Model  $model
     */
    public function apply(Builder $builder, Model $model)
    {
        $user = \Auth::user();
        if ($user !== null) {
            $builder->where('user_id', $user->id);
        }
    }
}