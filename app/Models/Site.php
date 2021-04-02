<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use App\Traits\HasCurrentUserScope;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use HasFactory, SoftDeletes, BelongsToUser, HasUuid, HasCurrentUserScope;

    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = ['id'];

    /**
     * Get the accounts for the account.
     */
    function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    /**
     * Get the categories for the account.
     */
    function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Get the expenses for the account.
     */
    function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * Get the incomes for the account.
     */
    function incomes(): HasMany
    {
        return $this->hasMany(Income::class);
    }

    /**
     * Get the transfers for the account.
     */
    function transfers(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }
}
