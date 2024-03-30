<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\CreateRequest;
use App\Http\Requests\Account\DebitRequest;
use App\Http\Requests\Account\ReplenishRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function open(CreateRequest $request){
        Account::create($request->all());
        return response(['message' => 'Success'], 200);
    }

    public function close(Account $account){
        $account->close();
        return response(['message' => 'Success'], 200);
    }

    public function transactions(Account $account){
        return response(AccountResource::make($account));
    }

    public function replenish(ReplenishRequest $request, Account $account){
        $data = $request->all();
        $account->replenish($data['amount'], $data['add_info']);
        return response(['message' => 'Success'], 200);
    }

    public function debit(DebitRequest $request, Account $account){
        $data = $request->all();
        $account->debit($data['amount'], $data['add_info']);
        return response(['message' => 'Success'], 200);
    }
}
