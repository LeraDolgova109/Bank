<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $service = new UserService();
        $users = $service->get_users();
        return response() -> json($users);
    }

    public function create(Request $request)
    {
        $service = new UserService();
        $users = $service->create_user($request);
        return response() -> json($users);
    }
}
