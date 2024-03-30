<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $service = new CustomerService();
        $customers = $service->get_customers($request->bearerToken());
        return response() -> json($customers);
    }

    public function show(Request $request, $id)
    {
        $service = new CustomerService();
        $customer = $service->get_customer($request->bearerToken(), $id);
        return response() -> json($customer);
    }

    public function create(Request $request)
    {
        $service = new CustomerService();
        $customer = $service->create_customer($request);
        return response() -> json($customer);
    }
}
