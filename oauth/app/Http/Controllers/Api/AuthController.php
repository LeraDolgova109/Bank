<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Http\Requests\LoginRequest;
use App\Models\Passport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return User::with(['passport'])->get();
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
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $user = User::create($data);
        $data1 = $data['passport'];
        $data1['user_id'] = $user->id;
        $passport = Passport::create($data1);

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        $data['access_token'] = $user->createToken($request->client)->accessToken;
        $redirest = new RedirectController();
        return $redirest->redirect($request->client, $data['access_token']);
    }

    public function logout()
    {
        return auth()->user()->token()->revoke();
    }

    public function show($id)
    {
        return User::find($id);
    }
}
