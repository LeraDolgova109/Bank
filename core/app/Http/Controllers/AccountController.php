<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function transactions(Account $account){
        return response(AccountResource::make($account));
    }

    public function replenish(Request $request, Account $account){

    }

    public function debit(Request $request, Account $account){

    }
}
