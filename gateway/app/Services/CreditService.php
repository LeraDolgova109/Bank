<?php

namespace App\Services;
use Illuminate\Http\Request;

class CreditService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = env('CREDIT_APP_URL');
    }

    function get_credits()
    {
        return $this->get('loan');
    }

    function get_credit_info($id)
    {
        return $this->get("loan/$id");
    }
    
    function get_customer_credit($id)
    {
        return $this->get("customer/$id/loan");
    }
    function update_credit(Request $request, $id)
    {
        return $this->put("loan/$id", json_encode($request->all()));
    }
}