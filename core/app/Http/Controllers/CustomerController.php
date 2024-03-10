<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return response(['customers' => CustomerResource::collection(Customer::all())]);
    }

    public function show(Customer $customer){

    }

    public function create(Request $request){

    }

    public function add_ban(Request $request, Customer $customer){

    }
}
