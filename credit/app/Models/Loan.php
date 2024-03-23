<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'rate_id',
        'amount',
        'status',
        'issue_date',
        'close_date',
        'issuance_account',
        'repayment_account',
        'term',
        'min_payment',
    ];

    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }
}
