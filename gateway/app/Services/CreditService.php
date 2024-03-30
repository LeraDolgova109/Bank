<?php

namespace App\Services;
use Illuminate\Http\Request;

class CreditService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = "https://bank-credit/api/";
    }

    function get_credits($token)
    {
        return $this->get('loan', $token);
    }

    function get_credit_info($token, $id)
    {
        return $this->get("loan/$id", $token);
    }
    
    function get_customer_credit($token, $id)
    {
        return $this->get("customer/$id/loan", $token);
    }
    function update_credit(Request $request, $id)
    {
        return $this->put("loan/$id", json_encode($request->all()), $request->bearerToken());
    }
}