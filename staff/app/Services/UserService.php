<?php

namespace App\Services;
use app\Components\HttpClient;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class UserService 
{
    function get_user(Request $request)
    {
        // $import = new HttpClient();
        // $token = $request->bearerToken();
        // try {
        //     $response = $import->client->request('GET', env('COMPONENT_APP_URL') . '', [
        //         'headers' => [
        //             "Accept" => "application/json",
        //             'Authorization' => "Bearer " . $token
        //         ]
        //     ]);
        // } catch (RequestException $e) {
        //     if ($e->getCode() === 401) {
        //         return response()->json('Unauthorized', 401);
        //     }
        // }
        // $data = json_decode($response->getBody()->getContents());
        // if ($request->isMethod('get') || $request->isMethod('delete')) {
        //     $request->user = $data;
        // }
        // else {
        //     $request['user'] = $data;
        // }
    }
}