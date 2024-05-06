<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\KeysService;

class KeysMiddleware
{
    
    private KeysService $keysService;

    public function __construct(){
        $this->keysService = new KeysService();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $result = $this->keysService->check_key(getallheaders()['Idempotency-key']);
        if ($result != null)
        {
            $logsService = new \App\Services\LogsService();
            $logsService->send('info', 'trace_id: ' . getallheaders()['trace-id'], 200);
            abort(200, $result);
        }
        return $next($request);
    }
}
