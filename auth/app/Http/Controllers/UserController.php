<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $data = $request;
        
        $data['password'] = Hash::make($request['password']);
        $user = User::create([
            "email" => $data['email'],
            "name" => $data['name'],
            "password" => $data["password"],
        ]);
        
        $token = auth()->tokenById($user->id);
        return response()->json(['token' => $token]);
    }

    public function index()
    {
        return response() -> json(User::get());
    }

    public function show($user_id)
    {
        $user = User::find($user_id);
        return $user;
    }

    public function update(UserRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user();

        $user->update([
            'fullName' => $request['fullName'],
            'phone' => $request['phone'],
        ]);

        return response() -> json($user);
    }
}
