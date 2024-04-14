<?php

namespace App\Models;

use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use BroadcastsEvents, HasFactory;

    protected $fillable = [
        'account_id',
        'type',
        'status',
        'amount',
        'add_info',
        'success_datetime',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function broadcastOn(string $event): array
    {
        return [new Channel('account'.$this->account->id)];
    }
}
