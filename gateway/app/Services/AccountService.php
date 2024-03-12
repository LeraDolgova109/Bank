<?php

namespace App\Services;
use GuzzleHttp\Exception\RequestException;

class AccountService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = env('CORE_APP_URL');
    }

    function get_account_transaction($id)
    {
        return $this->get("account/$id/transaction");
    }
}