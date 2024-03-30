<?php

namespace App\Http\Controllers;

use App\Services\RateService;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index(Request $request)
    {
        $service = new RateService();
        $rates = $service->get_rates($request->bearerToken());
        return response() -> json($rates);
    }

    public function create(Request $request)
    {
        $service = new RateService();
        $result = $service->create_rate($request);
        return response() -> json($result);
    }

    public function update(Request $request, $id)
    {
        $service = new RateService();
        $result = $service->update_rate($request, $id);
        return response() -> json($result);
    }
    public function delete(Request $request, $id)
    {
        $service = new RateService();
        $result = $service->delete_rate($request->bearerToken(), $id);
        return response() -> json($result);
    }
}
