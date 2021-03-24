<?php

namespace App\Models;

use App\Traits\BelongsToSite;
use App\Traits\BelongsToUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory, SoftDeletes, BelongsToSite, BelongsToUser, HasUuid;

    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = ['id'];

    /**
     * Get the account that owns the income.
     */
    function paidTo(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'paid_from');
    }
}
