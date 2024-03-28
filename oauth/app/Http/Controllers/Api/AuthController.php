<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function login(LoginRequest $request)
    {
        
        $data = $request->validated();
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $data['access_token'] = $user->createToken('access_token')->accessToken;
            $redirest = new RedirectController();
            return $redirest->redirect($request->client, $data['access_token']);
        }    
    }

    public function register(Request $request)
    {
        //$data = $request->validated();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        
        $data['password'] = Hash::make($request['password']);
        $user = User::create($data);
        
        return response()->json('OK');
    }

    public function logout()
    {
        return auth()->user()->token()->revoke();
    }

    public function show(string $id)
    {
        return User::find($id);
    }
}
