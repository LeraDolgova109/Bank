<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        $service = new CurrencyService();
        $account = $service->get_currency($request->bearerToken());
        return response() -> json($account);
    }
}
