<?php

namespace App\Models;

use App\Jobs\AccessTransaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'open_date',
        'end_date',
        'close_date',
        'status',
        'type_id',
        'balance',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(AccountType::class, 'type_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function close()
    {
        $this->status = 'closed';
        $this->close_date = Carbon::now();
        $this->save();
    }

    public function replenish(int $amount, string $add_info = '')
    {
        $transaction = $this->transactions()->create([
            'type' => 'replenishment',
            'status' => 'in_process',
            'amount' => $amount,
            'add_info' => $add_info,
        ]);
        AccessTransaction::dispatch($transaction)
            ->delay(now()->addSeconds(30));
    }

    public function debit(int $amount, string $add_info = '')
    {
        $transaction = $this->transactions()->create([
            'type' => 'debiting',
            'status' => 'in_process',
            'amount' => $amount,
            'add_info' => $add_info,
        ]);
        if ($this->balance - $transaction->amount < 0) {
            $transaction->status = 'reject';
            $transaction->save();
        }
        AccessTransaction::dispatch($transaction)
            ->delay(now()->addSeconds(5));
    }
}
