<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\CreateRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomerShortResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return response(['customers' => CustomerShortResource::collection(Customer::all())]);
    }

    public function show(Customer $customer){
        return response(CustomerResource::make($customer));
    }

    public function create(CreateRequest $request){
        Customer::create($request->validated());
        return response(['message' => 'Success'], 200);
    }
}
