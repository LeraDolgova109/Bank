<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\Passport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $user = User::create($data);
        $data1 = $data['passport'];
        $data1['user_id'] = $user->id;
        $passport = Passport::create($data1);

        $token = auth()->tokenById($user['id']);
        return response() -> json(['token' => $token]);
    }

    public function index()
    {
        return response() -> json(User::with(['passport'])->get());
    }

    public function show($user_id)
    {
        $user = User::with(['passport'])->find($user_id);
        return $user;
    }

    public function create(RegisterRequest $request)
    {
        $data = $request->validated();
        
        $data['password'] = Hash::make($request['password']);
        $user = User::create($data);
        
        return response()->json('OK');
    }
}
