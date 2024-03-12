<?php

namespace App\Http\Controllers;

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

    public function create(Request $request){

    }

    public function add_ban(Request $request, Customer $customer){

    }
}
