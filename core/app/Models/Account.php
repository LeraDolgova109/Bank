<?php

namespace App\Models;

use App\Jobs\AccessTransaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
        'currency_id',
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

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
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

    public function transfer(int $amount, string $recipient_id, string $add_info = '')
    {
        try {
            $recipient = Account::findOrFail($recipient_id);
            DB::transaction(function () use ($amount, $recipient, $add_info) {
                if ($this->balance - $amount < 0) {
                    throw new \Exception();
                }
                $this->balance = $this->balance - $amount;
                $this->save();
                $this->transactions()->create([
                    'type' => 'debiting',
                    'status' => 'success',
                    'amount' => $amount,
                    'add_info' => $add_info,
                ]);
                if ($this->currency->id != $recipient->currency->id){
                    $response = Http::get('https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/' . $this->currency->slug . '.json')->json();
                    $amount = (int)($amount * $response[$this->currency->slug][$recipient->currency->slug]);
                }
                $recipient->balance = $recipient->balance + $amount;
                $recipient->save();
                $recipient->transactions()->create([
                    'type' => 'replenishment',
                    'status' => 'success',
                    'amount' => $amount,
                    'add_info' => $add_info,
                ]);
            });
        } catch (\Exception) {
            throw new \Exception('Во время проведения перевода произошла ошибка! Попробуйте позже.');
        }

    }
}
