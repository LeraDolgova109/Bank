<?php

namespace App\Http\Middleware;

use App\Components\HttpClient;
use Closure;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $import = new HttpClient();
        $token = $request->bearerToken();
        try {
            $response = $import->client->request('GET', 'https://oauth/api/user' , [
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
        
        return $next($request);
    }
}
