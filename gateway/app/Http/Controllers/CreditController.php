<?php

namespace App\Http\Controllers;

use App\Services\CreditService;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        $service = new CreditService();
        $credits = $service->get_credits();
        return response() -> json($credits);
    }

    public function show($id)
    {
        $service = new CreditService();
        $credits = $service->get_credit_info($id);
        return response() -> json($credits);
    }

    public function customer($id)
    {
        $service = new CreditService();
        $credits = $service->get_customer_credit($id);
        return response() -> json($credits);
    }
    public function update(Request $request, $id)
    {
        $service = new CreditService();
        $result = $service->update_credit($request, $id);
        return response() -> json($result);
    }
}
