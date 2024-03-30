<?php

namespace App\Services;
use Illuminate\Http\Request;

class AccountService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = "https://core/api/";
    }

    function get_account_transaction($token, $id)
    {
        return $this->get("account/$id/transaction", $token);
    }

    function open_account(Request $request)
    {
        return $this->post('account', json_encode($request->all()), $request->bearerToken());
    }

    function close_account($token, $id)
    {
        return $this->delete("account/$id", $token);
    }

    function replenish(Request $request, $id)
    {
        return $this->post("account/$id/replenish", json_encode($request->all()),$request->bearerToken());
    }

    function debit(Request $request, $id)
    {
        return $this->post("account/$id/debit", json_encode($request->all()),$request->bearerToken());
    }
}