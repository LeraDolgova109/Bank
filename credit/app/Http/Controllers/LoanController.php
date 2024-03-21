<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Http\Resources\LoanResource;
use App\Http\Resources\LoanShortResource;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index($customer_id = null){
        if($customer_id){
            $loans = Loan::query()->where('customer_id', $customer_id)->get();
        } else {
            $loans = Loan::all();
        }
        return response(['loans' => LoanShortResource::collection($loans), 'meta' => ['count' => $loans->count()]], 200);
    }

    public function get(Loan $loan){
        return response(LoanResource::make($loan), 200);
    }

    public function create(LoanRequest $request){
        $data = $request->validated();
        Loan::create($data);
        return response(["message" => "Success"], 200);
    }

    public function update(Loan $loan, LoanRequest $request){
        $data = $request->validated();
        $loan->update($data);
        return response(["message" => "Success"], 200);
    }
}
