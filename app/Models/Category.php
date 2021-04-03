<?php

namespace App\Models;

use App\Traits\BelongsToSite;
use App\Traits\BelongsToUser;
use App\Traits\HasCurrentUserScope;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, BelongsToSite, BelongsToUser, HasUuid, HasCurrentUserScope;

    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = ['id'];

    /**
     * Get the children categories for the category.
     */
    function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Get the expenses for the category.
     */
    function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * Get the incomes for the category.
     */
    function incomes(): HasMany
    {
        return $this->hasMany(Income::class);
    }

    /**
     * Get the parent category that owns the category.
     */
    function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
