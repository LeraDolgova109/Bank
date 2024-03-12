<?php

namespace App\Services;
use app\Components\HttpClient;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class UserService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = env('CORE_APP_URL');
    }

    function get_user(Request $request)
    {
        $import = new HttpClient();
        $token = $request->bearerToken();
        try {
            $response = $import->client->request('GET', env('CORE_APP_URL') . '', [
                'headers' => [
                    "Accept" => "application/json",
                    'Authorization' => "Bearer " . $token
                ]
            ]);
        } catch (RequestException $e) {
            if ($e->getCode() === 401) {
                return response()->json('Unauthorized', 401);
            }
        }
        $data = json_decode($response->getBody()->getContents());
        if ($request->isMethod('get') || $request->isMethod('delete')) {
            $request = $data;
        }
        else {
            $request['user'] = $data;
        }
    }
}