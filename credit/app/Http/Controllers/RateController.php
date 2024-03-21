<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateRequest;
use App\Http\Resources\RateResource;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
        return response(['rates' => RateResource::collection(Rate::all()), 'meta' => ['count' => Rate::all()->count()]], 200);
    }

    public function create(RateRequest $request)
    {
        $data = $request->validated();
        Rate::create($data);
        return response(["message" => "Success"], 200);
    }

    public function update(Rate $rate, RateRequest $request)
    {
        $data = $request->validated();
        $rate->update($data);
        return response(["message" => "Success"], 200);
    }

    public function delete(Rate $rate)
    {
        $rate->delete();
        return response(["message" => "Success"], 200);
    }
}
