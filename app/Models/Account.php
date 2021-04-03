<?php

namespace App\Models;

use App\Traits\BelongsToSite;
use App\Traits\BelongsToUser;
use App\Traits\HasCurrentUserScope;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes, BelongsToUser, BelongsToSite, HasUuid, HasCurrentUserScope;

    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = ['id'];

    /*
     * The account types available in app
     */
    static $types = [
        'credit_card' => 'Credit Card',
        'prepaid_cart' => 'PrePaid Card',
        'paypal' => 'PayPal',
        'savings' => 'Savings',
        'current' => 'Current',
    ];

    /*
     * The account types available in app
     */
    static $currencies = [
        'EUR' => '(&euro;)',
        'USD' => '($)',
        'BTC' => 'BTC',
    ];

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
     * Get the transfers made from the account.
     */
    function transferredFrom(): HasMany
    {
        return $this->hasMany(Transfer::class, 'paid_from');
    }

    /**
     * Get the transfers made to the account.
     */
    function transferredTo(): HasMany
    {
        return $this->hasMany(Transfer::class, 'paid_to');
    }
}
