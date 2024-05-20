<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\CreateRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomerShortResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            $response = $idempotency_key && Cache::get($idempotency_key) ? Cache::get($idempotency_key) : ['customers' => CustomerShortResource::collection(Customer::all())];
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }
        $this->logsService->send('info', "path=" . $request->getRequestUri(), 200);
        return response($response, 200);
    }

    public function show(Customer $customer, Request $request)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            $response = $idempotency_key && Cache::get($idempotency_key) ? Cache::get($idempotency_key) : CustomerResource::make($customer);
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            // $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }
        $this->logsService->send('info', $request->getRequestUri(), 200);
        return response($response, 200);
    }

    public function create(CreateRequest $request)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            if ($idempotency_key && Cache::get($idempotency_key)) {
                $response = Cache::get($idempotency_key);
            } else {
                Customer::create($request->validated());
                $response = ['message' => 'Success'];
            }
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
