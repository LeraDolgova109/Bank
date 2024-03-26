<?php

namespace App\Services;
use Illuminate\Http\Request;

class RateService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = "https://bank-credit/api/";
    }

    function get_rates()
    {
        return $this->get('rate');
    }

    function create_rate(Request $request)
    {
        return $this->post('rate', json_encode($request->all()));
    }

    function update_rate(Request $request, $id)
    {
        return $this->put("rate/$id", json_encode($request->all()));
    }

    function delete_rate($id)
    {
        return $this->delete("rate/$id");
    }
}