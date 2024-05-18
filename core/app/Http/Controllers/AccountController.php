<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\CreateRequest;
use App\Http\Requests\Account\DebitRequest;
use App\Http\Requests\Account\ReplenishRequest;
use App\Http\Requests\Account\TransferRequest;
use App\Http\Resources\AccountResource;
use App\Http\Resources\AccountShortResource;
use App\Http\Resources\TransactionResource;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Transaction;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Nette\Utils\Type;

class AccountController extends Controller
{
    public function open(CreateRequest $request)
    {
        Account::create($request->all());
        return response(['message' => 'Success'], 200);
    }

    public function close(Account $account)
    {
        $account->close();
        return response(['message' => 'Success'], 200);
    }

    public function transaction_list(Account $account)
    {
        return response(AccountResource::make($account));
    }

    public function transaction(Transaction $transaction){
        return response(TransactionResource::make($transaction));
    }

    public function replenish(ReplenishRequest $request, Account $account)
    {
        $data = $request->all();
        $account->replenish($data['amount'], $data['add_info']);
        $service = new FirebaseService();
        $service->sendNotification($request, $account->id);
        return response(['message' => 'Success'], 200);
    }

    public function debit(DebitRequest $request, Account $account)
    {
        $data = $request->all();
        $account->debit($data['amount'], $data['add_info']);
        $service = new FirebaseService();
        $service->sendNotification($request, $account->id);
        return response(['message' => 'Success'], 200);
    }

    public function transfer(TransferRequest $request, Account $account)
    {
        $data = $request->all();
        try {
            $account->transfer($data['amount'], $data['recipient_account'], $data['add_info']);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
        return response(['message' => 'Success'], 200);
    }

    public function get_master()
    {
        $type = AccountType::query()->where('slug', 'master')->first();
        $accounts = $type->accounts;
        return response(AccountShortResource::collection($accounts), 200);
    }
}
