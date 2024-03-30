<?php

namespace App\Http\Controllers;

use App\Services\CreditService;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index(Request $request)
    {
        $service = new CreditService();
        $credits = $service->get_credits($request->bearerToken());
        return response() -> json($credits);
    }

    public function show(Request $request, $id)
    {
        $service = new CreditService();
        $credits = $service->get_credit_info($request->bearerToken(), $id);
        return response() -> json($credits);
    }

    public function customer(Request $request, $id)
    {
        $service = new CreditService();
        $credits = $service->get_customer_credit($request->bearerToken(), $id);
        return response() -> json($credits);
    }
    public function update(Request $request, $id)
    {
        $service = new CreditService();
        $result = $service->update_credit($request, $id);
        return response() -> json($result);
    }
}
