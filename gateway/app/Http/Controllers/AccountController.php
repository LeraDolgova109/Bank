<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show($id)
    {
        $service = new AccountService();
        $account = $service->get_account_transaction($id);
        return response() -> json($account);
    }
}
