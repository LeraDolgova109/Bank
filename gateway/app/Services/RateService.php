<?php

namespace App\Services;
use Illuminate\Http\Request;

class RateService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = "https://bank-credit/api/";
    }

    function get_rates($token)
    {
        return $this->get('rate', $token);
    }

    function create_rate(Request $request)
    {
        return $this->post('rate', json_encode($request->all()), $request->bearerToken());
    }

    function update_rate(Request $request, $id)
    {
        return $this->put("rate/$id", json_encode($request->all()), $request->bearerToken());
    }

    function delete_rate($token, $id)
    {
        return $this->delete("rate/$id", $token);
    }
}