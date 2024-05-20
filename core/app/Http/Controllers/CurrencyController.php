<?php

namespace App\Http\Controllers;

use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            $response = $idempotency_key && Cache::get($idempotency_key) ? Cache::get($idempotency_key) : CurrencyResource::collection(Currency::all());
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }
        $this->logsService->send('info', $request->getRequestUri(), 200);
        return response($response, 200);
    }
}
