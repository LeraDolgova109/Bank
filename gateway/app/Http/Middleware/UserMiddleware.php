<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;

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
        if (!$request->bearerToken()) {
            return response(['message' => 'Unauthorized'], 401);
        }

        $token = new Token($request->bearerToken());

        try {
            $payload = JWTAuth::decode($token);
            $user = [
                'id' => $payload->get('sub'),
            ];
            $request->merge(['user' => $user]);
        } catch (TokenExpiredException $e) {
            return response(['message' => 'Token expired'], 403);
        } catch (TokenInvalidException $e) {
            return response(['message' => 'Invalid token'], 403);
        } catch (JWTException $e) {
            return response(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
