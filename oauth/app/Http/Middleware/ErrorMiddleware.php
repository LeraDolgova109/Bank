<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ErrorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(date("i",time()) % 2 == 0 && rand(0,100) >= 10)
        {
            $logsService = new \App\Services\LogsService();
            $logsService->send('error', 'Internal Server Error ' . 'trace_id: ' . getallheaders()['trace-id'], 500);
            abort(500, 'Internal Server Error');
        }
        else if (rand(0,100) >= 50)
        {
            $logsService = new \App\Services\LogsService();
            $logsService->send('error', 'Internal Server Error ' . 'trace_id: ' . getallheaders()['trace-id'], 500);
            abort(500, 'Internal Server Error');
        }

        return $next($request);
    }
}
