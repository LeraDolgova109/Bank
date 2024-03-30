<?php

namespace App\Services;
use Illuminate\Http\Request;

class CustomerService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = "https://core/api/";
    }

    function get_customers($token)
    {
        return $this->get('customer', $token);
    }

    function get_customer($token, $id)
    {
        return $this->get("customer/$id", $token);
    }

    function create_customer(Request $request)
    {
        return $this->post('customer', json_encode($request->all()), $request->bearerToken());
    }
}