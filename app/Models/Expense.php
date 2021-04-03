<?php

namespace App\Models;

use App\Traits\BelongsToSite;
use App\Traits\BelongsToUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory, SoftDeletes, BelongsToUser, BelongsToSite, HasUuid;

    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = ['id'];

    /**
     * Get the category that owns the expense.
     */
    function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the account that owns the expense.
     */
    function paidFrom(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'paid_from');
    }
}
