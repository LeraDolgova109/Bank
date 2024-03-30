<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show(Request $request, $id)
    {
        $service = new AccountService();
        $account = $service->get_account_transaction($request->bearerToken(), $id);
        return response() -> json($account);
    }

    public function open(Request $request)
    {
        $service = new AccountService();
        $account = $service->open_account($request);
        return response() -> json($account);
    }

    public function close(Request $request, $id)
    {
        $service = new AccountService();
        $account = $service->close_account($request->bearerToken(), $id);
        return response() -> json($account);
    }

    public function replenish(Request $request, $id)
    {
        $service = new AccountService();
        $account = $service->replenish($request, $id);
        return response() -> json($account);
    }

    public function debit(Request $request, $id)
    {
        $service = new AccountService();
        $account = $service->debit($request, $id);
        return response() -> json($account);
    }
}
