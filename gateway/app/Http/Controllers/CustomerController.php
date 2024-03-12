<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $service = new CustomerService();
        $customers = $service->get_customers();
        return response() -> json($customers);
    }

    public function show($id)
    {
        $service = new CustomerService();
        $customer = $service->get_customer($id);
        return response() -> json($customer);
    }
}
