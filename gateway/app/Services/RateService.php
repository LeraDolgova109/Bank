<?php

namespace App\Services;
use Illuminate\Http\Request;

class RateService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = env('CREDIT_APP_URL');
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