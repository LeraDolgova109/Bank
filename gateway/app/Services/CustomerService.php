<?php

namespace App\Services;
use Illuminate\Http\Request;

class CustomerService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = env('CORE_APP_URL');
    }

    function get_customers()
    {
        return $this->get('customer');
    }

    function get_customer($id)
    {
        return $this->get("customer/$id");
    }
}