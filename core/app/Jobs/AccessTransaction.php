<?php

namespace App\Jobs;

use App\Models\Account;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AccessTransaction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Transaction $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->transaction->status != 'in_process') {
            return;
        }

        $type = $this->transaction->type;
        $account = $this->transaction->account;

        if ($type == 'replenishment') {
            $account->balance = $account->balance + $this->transaction->amount;
            $account->save();

        }

        if ($type == 'debiting') {
            if ($account->balance - $this->transaction->amount < 0) {
                $this->transaction->status = 'reject';
                return;
            }
            $account->balance = $account->balance - $this->transaction->amount;
            $account->save();
        }

        $this->transaction->status = 'success';
        $this->transaction->success_datetime = Carbon::now();
        $this->transaction->save();
    }
}
