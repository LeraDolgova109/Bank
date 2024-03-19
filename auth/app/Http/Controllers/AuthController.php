<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $userController;
    public function __construct(UserController $userController)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->userController = $userController;
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password']
        ];

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Incorrect email or password'], 401);
        }
        if (auth()->user()->is_banned)
        {
            return response() -> json(['error' => 'User is banned'], 403);
        }
        return $this->respondWithToken($token);
    }

    public function user()
    {
        $user_id = auth()->user()['id'];
        return $this->userController->show($user_id);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
